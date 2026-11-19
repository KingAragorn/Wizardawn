"""Export literal descriptions and vocabulary; selection rules live in JS."""
from pathlib import Path
import ast
import re
import json

ROOT = Path(__file__).resolve().parent.parent
scope = {'ROOT': ROOT, 're': re, 'json': json}
for file, names in [('extract-tables.py', ['arrays']), ('export-adventure-data.py', ['read', 'functions', 'template', 'write'])]:
    tree = ast.parse((ROOT / 'js' / file).read_text())
    exec(compile(ast.Module(body=[n for n in tree.body if isinstance(n, ast.FunctionDef) and n.name in names], type_ignores=[]), '<descriptions>', 'exec'), scope)
fun = scope['functions']
calls = {
    **{'conditionType('+key+')': 'condition_'+key for key in ['iron','wood','cloth','jar','item','water','paper']},
    **{key+'()': slot for key, slot in {'steelMaker':'metal','woodenType':'wood','bagCreator':'bag','bottlePicker':'bottle','leatherColor':'leather','plainColor':'plainColor','goodmetalChooser':'goodMetal','figureMaker':'figure','footprintMaker':'tracks','eggMaker':'eggs','coinMaker':'coin'}.items()},
    'coinMaker($game)': 'coin', 'itemValues($game,$mquality)': 'value',
    'gemCreator($cut)': 'gem', 'jewelCreator($cut)': 'jewel', 'musicChooser(1)': 'music',
    'headoffMaker(0)': 'head', 'headoffMaker(1)': 'skull', 'designType(0)': 'design',
    'contentsChooser(0,$game,1)': 'contents', 'closetFiller(3,1,1,$game,1)': 'clothing',
    'normalWeapons(1,3,$game)': 'weapon', 'normalArmor(1,$game)': 'armor',
    'libraryFiller(mt_rand(2,7),$game,$cut)': 'books', 'materialType(whistle)': 'material',
    'kegFiller(cask,$game,$extra,$cut)': 'cask', 'kegFiller(keg,$game,$extra,$cut)': 'keg',
    'ashMaker($game)': 'ashes',
}
items = {}
for name in ['fantasyRoomItem', 'fantasyShelfItem']:
    body = fun('furnish')[name]
    # Shelf preamble contains another switch; restrict to the item index switch.
    body = body.split('switch (mt_rand(0,' + ('191' if name == 'fantasyRoomItem' else '173') + '))')[1]
    rows = list(re.finditer(r'case\s+(\d+)\s*:', body))
    out = {}
    for i, row in enumerate(rows):
        block = body[row.end():rows[i+1].start() if i+1 < len(rows) else len(body)]
        variants = []
        for cell in re.finditer(r'\$item\s*=\s*((?:"(?:[^"\\]|\\.)*"|[^;])*);', block):
            parts = scope['template'](cell[1], calls)
            if parts is not None: variants.append(parts)
        out[row[1]] = variants
    items[name] = out
# fantasyGroundItem (item_fantasy.php): hex crawl "items found on the ground".
# Cases 82, 144, 176 and 184 depend on the game or unported helpers and are
# built in JS; their cells may be empty here.
ground_calls = {**calls, 'candleColor(0)': 'color', 'cageMaker()': 'cage', 'dungeonWall()': 'wall', 'corpseMaker()': 'corpse', 'scrollContents($game)': 'scroll'}
body = fun('item_fantasy')['fantasyGroundItem'].split('switch (mt_rand(0,205))')[1]
rows = list(re.finditer(r'case\s+(\d+)\s*:', body))
ground = {}
for i, row in enumerate(rows):
    block = body[row.end():rows[i+1].start() if i+1 < len(rows) else len(body)]
    cells = [scope['template'](cell[1], ground_calls) for cell in re.finditer(r'\$item\s*=\s*((?:"(?:[^"\\]|\\.)*"|[^;])*);', block)]
    ground[row[1]] = [c for c in cells if c is not None] if row[1] not in ('82', '144', '176', '184') else []
items['fantasyGroundItem'] = ground
vocab = {}
for file, names in {
    'rooms_fantasy': ['corpseMaker','headMount','headoffMaker','footprintMaker','furnitureMake','drawWith','drawingTypes','eggMaker','figureMaker'],
    'descriptions': ['sizeMake','sizeMakeWall','designType'],
    'item_fantasy': ['foodFiller','closetFiller','musicChooser'],
    'item_fantasy_gems_jewels': ['goodmetalChooser'],
}.items():
    for name in names:
        body = fun(file)[name]
        vocab[name] = {'arrays': list(scope['arrays'](body)), 'cells': {key: re.findall(r'\$'+key+r'\s*=\s*"([^"$]*)"\s*;', body) for key in ['race','look','make','value','food','cloth','item']}}
bdd = fun('magic_items_rpgs')['makeRPGmagic'].split('else if ($game == "BD&D")')[1]
magic = {}
branches = list(re.finditer(r'\$magic_item == "(\w+)"\) /+', bdd))
misc = bdd.index('else ///// MISC')
blocks = [(branch[1], bdd[branch.end():branches[i+1].start() if i+1<len(branches) else misc]) for i,branch in enumerate(branches)] + [('misc', bdd[misc:])]
for category, block in blocks:
    cells = []
    for row in re.finditer(r'case\s*\(([^:]+)\):\s*(?:\$scroll_picker = (\d+);\s*)?\$magic_relic = ((?:"(?:[^"\\]|\\.)*"|[^;])*);', block):
        bounds = [int(n) for n in re.findall(r'\d+',row[1])]
        # Numeric case bounds are literal probability table data.
        if '==' in row[1]: low = high = bounds[0]
        elif len(bounds)>1: low, high = bounds
        elif '>' in row[1] and '>=' not in row[1]: low,high = bounds[0]+1,100
        else: low,high = bounds[0],100
        parts = scope['template'](row[3], {'curseType(mt_rand(1,10),reader,item,$game)': 'curse', 'mapMaker(997,$game)': 'map'})
        assert parts is not None, row[3]
        cells.append({'min':low,'max':high,'parts':parts,'spells':int(row[2] or 0)})
    magic[category] = cells
scope['write']('fantasyTables', {'items':items, 'vocab':vocab, 'basicMagic':magic})
print({name: (len(rows), sum(bool(row) for row in rows.values())) for name, rows in items.items()})
