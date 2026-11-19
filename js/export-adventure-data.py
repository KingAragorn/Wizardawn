"""Export original literal settlement/rule tables. No PHP algorithms are translated."""
from pathlib import Path
import ast
import json
import re
from shutil import copyfile
ROOT = Path(__file__).resolve().parent.parent
# Reuse the reviewed literal-array reader without running the other exporters.
source = ast.parse((ROOT / 'js/extract-tables.py').read_text())
namespace = {'re': re}
exec(compile(ast.Module(body=[n for n in source.body if isinstance(n, ast.FunctionDef) and n.name == 'arrays'], type_ignores=[]), '<literal reader>', 'exec'), namespace)
arrays = namespace['arrays']
def write(name, data):
    (ROOT / 'js/data' / (name + '.js')).write_text('// Original Wizardawn literal tables; see export-adventure-data.py.\nwindow.WZ_DATA = window.WZ_DATA || {};\nwindow.WZ_DATA.' + name + ' = ' + json.dumps(data, ensure_ascii=False) + ';\n')
def read(name):
    return (ROOT / 'src/functions' / (name + '.php')).read_text(encoding='cp1252')
def functions(name):
    return {m[1]: m[2] for m in re.finditer(r'(?m)^function\s+(\w+)([\s\S]*?)(?=^function\s+|\Z)', read(name))}
def tables(body):
    out = {}
    for key, values in arrays(body):
        out.setdefault(key, []).append(values)
    return out

town = {}
for file in ['city_gn', 'city_tt', 'city_fantasy', 'city_post_apocalyptic']:
    town[file] = {name: tables(body) for name, body in functions(file).items()}
# Racial multipliers are literal columns, not executable expressions.
for file, function in [('city_tt', 'TTStats'), ('city_gn', 'GFTStats')]:
    body = functions(file)[function]
    town[file]['multipliers'] = {m[1]: {key: float(value) for key, value in re.findall(r'\$(\w+) = ([\d.]+);', m[2])} for m in re.finditer(r'\$race == "([^"]+)"\)\{([^}]+)\}', body)}
# Business alternatives remain grouped by the original numeric shop type.
for file, function in [('city_gn', 'GFTBusiness'), ('city_tt', 'TTBusiness'), ('city_fantasy', 'wizardBusiness'), ('city_post_apocalyptic', 'PABusiness')]:
    body = functions(file)[function]
    branches = list(re.finditer(r'(?:else )?if \(\$type == (\d+)\) //', body))
    town[file]['shops'] = {m[1]: tables(body[m.end():branches[i+1].start() if i+1 < len(branches) else body.find('/////////////////////////// FILL') if '/////////////////////////// FILL' in body else len(body)]) for i, m in enumerate(branches)}
write('townTables', town)
source = json.loads((ROOT / 'data/json/store_items.json').read_text())
write('storeItems', [dict(zip([c['name'] for c in source['columns']], row)) for row in source['rows']])
# Progression/XP, spell slots, thief skills and saving-throw rows.
rules = {}
for file, prefix in [('bx_rules', 'bx'), ('ll_rules', 'll')]:
    fun = functions(file)
    progression = {}
    for m in re.finditer(r'\$class == "([^"]+)" && \$level == (\d+)\)\{([^}]+)\}', fun[prefix + '_basic_level']):
        row = {}
        for key, value in re.findall(r'\$(xp1|xp2|spells|steal) = "([^"]*)"', m[3]):
            row[key] = ([int(n) for n in value.split('|')] if key == 'spells' else re.split(r'[|_]', value)) if key in ['spells', 'steal'] else int(value.replace(',', ''))
        progression.setdefault(m[1], {})[m[2]] = row
    saves = {}
    for m in re.finditer(r'\$save = "([^"$]+)"', fun[prefix + '_basic_saves']):
        saves[m[1]] = [int(n) for n in m[1].split('_')]
    save_rules = []
    for m in re.finditer(r'\$class=="([^"]+)"([^{}]*)\{([^}]+)\}', fun[prefix + '_basic_saves']):
        lower = re.search(r'\$level>(\d+)', m[2])
        upper = re.search(r'\$level<(\d+)', m[2])
        save_rules.append({'class': m[1], 'min': int(lower[1])+1 if lower else 0, 'max': int(upper[1])-1 if upper else 100, 'values': [int(n) for n in re.findall(r'\$sv\d=\s*(\d+)', m[3])]})
    rules[prefix] = {'progression': progression, 'tables': {name: tables(body) for name, body in fun.items()}, 'saves': save_rules}
write('characterRules', rules)
# Descriptive table groups used by the dungeon content helpers.
write('roomTables', {file: {name: tables(body) for name, body in functions(file).items()} for file in ['rooms_fantasy', 'furnish', 'containers', 'atmosphere', 'descriptions', 'traps_fantasy', 'traps_post_apocalyptic']})
(ROOT / 'js/pics_tools').mkdir(exist_ok=True)
for path in (ROOT / 'src/pics_tools').glob('*'):
    if path.name.startswith(('wtown_', 'bx_char_', 'll_char_', 'osric_char_')):
        copyfile(path, ROOT / 'js/pics_tools' / path.name)
# Class combat and advancement records are numeric/reference tables.
for file, prefix in [('bx_rules', 'bx'), ('ll_rules', 'll')]:
    fun = functions(file)
    rules[prefix]['attacks'] = {m[1]: [int(n) for n in m[2].split('_')] for m in re.finditer(r'case (\d+): \$attacks = "([\d_]+)"', fun[prefix + '_basic_attacks'])}
    rules[prefix]['magicSpells'] = {m[1]: re.findall(r'\$magic_spell = "([^"]+)"', m[2]) for m in re.finditer(r'\$splvl == (\d+)\)([\s\S]*?)(?=else if \(\$splvl|\Z)', fun[prefix + '_basic_magic_spells'])}
char = functions('characters_osric')
body = char['makeAdventurer'].split('///// DO THE HIT POINTS')[0].split('///// DO THE CLASS')[ -1 ]
# Restrict to the final class combat blocks (after stats/race selection).
body = body[body.find('\n\tif ($p_class == "Assassin")\n'):]
branches = list(re.finditer(r'(?:else )?if \(\$p_class == "([^"]+)"\)\s*\{', body))
osric = {}
for i,m in enumerate(branches):
    block = body[m.end():branches[i+1].start() if i+1 < len(branches) else len(body)]
    die = re.search(r'\$hit_dice = (\d+)',block)
    if not die: continue
    saves = []
    for row in re.finditer(r'(?:if \(\$p_level > (\d+)\)|else)\s*\{([^}]+)\}', block):
        values = [int(v) for v in re.findall(r'\$p_xsv\d =\s*(\d+)', row[2])]
        if len(values) == 5: saves.append({'min': int(row[1])+1 if row[1] else 0, 'values': values})
    slots = {row[1]: [int(n) for n in re.findall(r'\d+', row[2])] for row in re.finditer(r'\$p_level == (\d+)\)\{\$p_skills = \$p_skills \. "[^"]*spells&nbsp;\(([^)]+)',block)}
    xpbody = char['givemeXP']
    xpbranch = re.search(r'\$class == "' + re.escape(m[1]) + r'"\)([\s\S]*?)(?=else if \(\$class|\Z)',xpbody)
    xp = {row[1]: int(row[2]) for row in re.finditer(r'\$level == (\d+)\)\{\$xp = (\d+)',xpbranch[1])} if xpbranch else {}
    osric[m[1]] = {'hitDie': int(die[1]), 'saves': saves, 'slots': slots, 'xp': xp}
rules['osric'] = osric
write('characterRules', rules)
# Description templates: text cells with named slots. No expressions/code ship.
def template(expr, extra_calls=None):
    calls = {
        '(ceil($level/2)+1)': 'damageScale', '(floor($level/2)+1)': 'damageScale',
        'TTSaves($level,$game)': 'savingRoll', 'ucfirst(fogColor())': 'fogColor',
        'fogColor()': 'fogColor', 'slimeColor()': 'color', 'candleColor(1)': 'color', 'candleColor(0)': 'color',
        'statueMake()': 'stone', 'dungeonWall()': 'wall', 'languageType($game)': 'language',
        'abilityTranslate($game,LCK)': 'luck', 'abilityTranslate($game,SPD)': 'speed',
        'abilityTranslate($game,INT)': 'intelligence', 'abilityTranslate($game,STR)': 'strength', 'abilityTranslate($game,CON)': 'constitution',
    }
    calls.update(extra_calls or {})
    result = []
    while expr.strip(' .\t'):
        expr = expr.lstrip(' .\t')
        if expr.startswith(('"', "'")):
            m = re.match(r'''"(?:[^"\\]|\\.)*"|'(?:[^'\\]|\\.)*' ''', expr, re.X)
            if not m: return None
            token = m[0]; result.append(token[1:-1].replace('\\' + token[0], token[0])); expr = expr[m.end():]; continue
        found = False
        for call, slot in calls.items():
            if expr.startswith(call):
                result.append({'slot':slot}); expr = expr[len(call):]; found = True; break
        if found: continue
        m = re.match(r'mt_rand\((\d+),(\d+)\)', expr)
        if m: result.append({'roll':[int(m[1]),int(m[2])]}); expr=expr[m.end():]; continue
        m = re.match(r'\$(\w+)',expr)
        if m: result.append({'slot':m[1]}); expr=expr[m.end():]; continue
        return None
    return result
text_cells = {}
selected = {'atmosphere': {'smellMakerRoom':'smell', 'airMakerRoom':'air', 'fogMakerRoom':'fog', 'soundMakerRoom':'sound', 'soundWhereRoom':'sound'}, 'furnish': {'furnishRoom':'furnishings', 'decorateRoomWall':'stuff', 'decorateRoomNearWall':'stuff', 'decorateRoomFloor':'stuff', 'decorateRoomCeiling':'stuff', 'fantasyRoomItem':'item', 'fantasyShelfItem':'item'}, 'rooms_fantasy': {'statueMake':'statue', 'steelMaker':'make', 'drawingTypes':'make', 'timesMaker':'time', 'cageMaker':'make'}, 'containers': {'bagCreator':'make', 'boxMakerRoom':'make', 'lootHider':'hide'}}
for file, names in selected.items():
    for name, variable in names.items():
        text_cells[name] = [m[1] for m in re.finditer(r'case\s+\d+\s*:\s*\$'+variable+r'\s*=\s*"([^"$]*)";',functions(file)[name])]
trap_text = []
for body in read('traps_fantasy').split('switch (mt_rand(0,$trap_max))')[1:]:
    rows = {}
    for m in re.finditer(r'(?m)^\t\t\tcase (\d+):\s*\$trap = (.*?);',body):
        row = template(m[2])
        if row is not None: rows[m[1]] = row
    trap_text.append(rows)
write('dungeonText', {'cells':text_cells, 'traps':trap_text})
magic_body = functions('magic_items_rpgs')['makeRPGmagic']
game_branches = list(re.finditer(r'(?m)^\t(?:else )?if \(\$game == "([^"]+)"\)',magic_body))
magic = {}; potion_choices = {}
slugs = {'OSRIC':'osric','AD&D':'add','BFRPG':'bfrpg','Labyrinth Lord':'lablord','Swords & Wizardry':'sandw','Swords & Six-Siders':'ssxs','BD&D':'bdd'}
for i,m in enumerate(game_branches):
    body = magic_body[m.end():game_branches[i+1].start() if i+1<len(game_branches) else len(magic_body)]
    # Preserve literal reference item names (selection logic is in JavaScript).
    magic[slugs[m[1]]] = list(dict.fromkeys(re.findall(r'\$item\s*=\s*"([^"$]+)"\s*;',body)))
    ranges = list(re.finditer(r'case \$mi >= (\d+) and \$mi <= (\d+):',body))
    choices = []
    for j,r in enumerate(ranges):
        block = body[r.end():ranges[j+1].start() if j+1<len(ranges) else len(body)]
        names = re.findall(r'\$item\s*=\s*"((?:Potion|Philter|Oil|Elixir)[^"$]+)"\s*;',block)
        if not names: continue
        die = re.search(r'\$dice = mt_rand\((\d+),(\d+)\)',block)
        nested = []
        for n in re.finditer(r'(?:if \(\$dice >= (\d+)\)|else)\s*\{\s*\$item\s*=\s*"((?:Potion|Philter|Oil|Elixir)[^"$]+)"',block):
            nested.append({'min':int(n[1]) if n[1] else 0,'name':n[2]})
        choices.append({'min':int(r[1]),'max':int(r[2]),'names':list(dict.fromkeys(names)), **({'die':[int(die[1]),int(die[2])], 'nested':nested} if die and nested else {})})
    potion_choices[slugs[m[1]]] = choices
write('magicItems', {'names':magic,'potions':potion_choices})
