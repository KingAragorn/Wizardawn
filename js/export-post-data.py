"""Export descriptive text cells only. Selection and rules are hand-written JS."""
from pathlib import Path
import ast
import json
import re
from shutil import copyfile
ROOT = Path(__file__).resolve().parent.parent
scope = {'ROOT': ROOT, 're': re, 'json': json}
for file, names in [('extract-tables.py', ['arrays']), ('export-adventure-data.py', ['read', 'functions', 'template', 'write'])]:
    tree = ast.parse((ROOT / 'js' / file).read_text())
    exec(compile(ast.Module(body=[n for n in tree.body if isinstance(n, ast.FunctionDef) and n.name in names], type_ignores=[]), '<literal descriptions>', 'exec'), scope)
fun = scope['functions']; template = scope['template']
calls = {
    **{'conditionType('+key+')': 'condition_'+key for key in ['iron','wood','cloth','jar','item','water','paper']},
    **{name+'()': key for name,key in {'steelMaker':'metal','woodenType':'wood','PAfurnitureMake':'furniture','AlienfurnitureMake':'alienFurniture','PAheadMount':'animal','PApreciousChooser':'precious','dungeonWall':'wall','sizeMake':'size','PAbottlePicker':'bottle','bottlePicker':'bottle','eggMaker':'eggs','carpetMaker':'carpet','cageMaker':'cage','footprintMaker':'tracks'}.items()},
    'carpetMaker(1)': 'carpet', 'PAclosetFiller(10,1)': 'clothes', 'PAbagCreator($map)': 'bag',
    'PAGemMaker($cut,$cash)': 'jewel', '($level * 20)': 'vineHits', '($level*2)': 'acidDamage',
    '($level+1)': 'blindDays', '($level+2)': 'blindTurns',
}
body = fun('item_post_apocalyptic')['PAstuffMakerRoom']
clutter = []
for pattern in [r'switch \(mt_rand\(0,\$xg\)\)', r'switch \(mt_rand\(0,143\)\)']:
    block = re.split(pattern, body)[1]
    rows = list(re.finditer(r'(?m)^\s*case (\d+):', block))[:144]
    group = {}
    for i, row in enumerate(rows):
        text = block[row.end(): rows[i+1].start() if i+1<len(rows) else len(block)]
        expr = re.search(r'\$stuff = ([^;]+);',text)
        parts = template(expr[1], calls) if expr else None
        place = re.search(r'\$loot_place\s*=\s*"([^"]+)"',text)
        size = re.search(r'\$loot_size\s*=\s*(\d+)',text)
        group[row[1]] = {'parts': parts, 'place': place[1] if place else '', 'size': int(size[1]) if size else 0, 'trapped': bool(re.search(r'\$loot_trap\s*=\s*1',text))}
    clutter.append(group)
traps = {}
body = fun('traps_post_apocalyptic')['PAtrapMaker']
for row in re.finditer(r'(?m)^\s*case (\d+):\s*\$trap = ([^;]+);',body):
    parts = template(row[2], calls)
    if parts is not None: traps[row[1]] = parts
# Preserve all complete artifact descriptions, including rulebook references.
artifacts = {}
for name, body in fun('items_post_apocalyptic').items():
    if name not in ['makePAItem','makeBUItem','makeMAItem','makeGWItem']: continue
    groups = list(re.finditer(r'(?m)^([ \t]*)(?:else )?if \(\$the_item == "([^"]+)"\)', body))
    blocks = []
    for i, group in enumerate(groups):
        block = body[group.end():groups[i+1].start() if i+1<len(groups) else len(body)]
        final_else = re.search(r'(?m)^'+re.escape(group[1])+r'else\s*\n'+re.escape(group[1])+r'\{',block) if i+1==len(groups) else None
        if final_else:
            blocks.append((group[2],block[:final_else.start()]))
            blocks.append(('drug' if name in ['makePAItem','makeBUItem'] else 'device',block[final_else.end():]))
        else: blocks.append((group[2],block))
    out = {}
    for category, block in blocks:
        rows = []
        for row in re.finditer(r'case\s+(\d+):\s*\$artifact = ([^;]+);',block):
            # HTML entities contain semicolons; match the whole assignment.
            end = re.match(r'((?:"(?:[^"\\]|\\.)*"|[^;])*)\s*;', block[row.start():].split('$artifact = ',1)[1])
            parts = template(end[1], calls) if end else None
            if parts is not None: rows.append({'index':int(row[1]),'parts':parts})
        if rows: out[category] = rows
    artifacts[name] = out
# Literal helper vocabularies remain data too.
helpers = {name: list(scope['arrays'](body)) for name,body in fun('item_post_apocalyptic').items() if name in ['PAheadMount','PAfurnitureMake','AlienfurnitureMake','PAbottlePicker','PApreciousChooser','PAclosetFiller','PAcorpseMaker']}
helpers.update({name: list(scope['arrays'](body)) for name,body in fun('names').items() if name in ['speciesName', 'mutantName']})
helpers['postFeatureForms'] = list(scope['arrays'](fun('item_post_apocalyptic')['PAspecialMakerRoom']))
scope['write']('postTables', {'clutter':clutter, 'traps':traps, 'artifacts':artifacts, 'helpers':helpers})
for path in (ROOT/'src/pics_tools').glob('apoc_*.jpg'): copyfile(path, ROOT/'js/pics_tools'/path.name)
print('Clutter templates:', [sum(row['parts'] is not None for row in group.values()) for group in clutter])
print('Trap templates:',len(traps))
print('Artifact descriptions:', {name:sum(len(rows) for rows in group.values()) for name,group in artifacts.items()})
# The Apocalypse rules are editorial HTML, with three display placeholders.
rules = (ROOT/'src/functions/rules.php').read_text(encoding='cp1252').split('else if ($y_rulez == 4)')[1].split('else if ($y_rulez == 5)')[0]
rules = rules.split('?>',1)[1].rsplit('<?php',1)[0]
rules = rules.replace('<?php echo $rule_genre; ?>','{{genre}}').replace('<?php echo $x_money; ?>','{{money}}').replace('<?php echo mt_rand(1,24); ?>','{{start}}')
rules = re.sub(r'<\?php if \(\$x_game == "Fantasy"\)\{echo "[^"]+";\} else \{echo "([^"]+)";\} \?>',r'\1',rules)
assert '<?' not in rules
scope['write']('postRules', rules)
for path in (ROOT/'src/pics_tools').glob('dg_start_*.jpg'): copyfile(path, ROOT/'js/pics_tools'/path.name)
