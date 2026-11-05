"""Export numeric/class/reference tables, never PHP control flow."""
from pathlib import Path
import ast
import json
import re
ROOT = Path(__file__).resolve().parent.parent
scope = {'ROOT': ROOT, 're': re, 'json': json}
for file,names in [('extract-tables.py',['arrays']),('export-adventure-data.py',['read','functions','write','template'])]:
    tree=ast.parse((ROOT/'js'/file).read_text())
    exec(compile(ast.Module(body=[n for n in tree.body if isinstance(n,ast.FunctionDef) and n.name in names],type_ignores=[]),'<reference tables>','exec'),scope)
fun=scope['functions']; body=fun('characters_osric')['makeAdventurer']
races={}; matches=list(re.finditer(r'(?:else )?if \(\$p_race == "([^"]+)"\)',body.split('///// EXCEPTIONAL STRENGTH')[0]))
for i,m in enumerate(matches):
    block=body[m.end():matches[i+1].start() if i+1<len(matches) else body.index('///// EXCEPTIONAL STRENGTH')]
    header=block.split('switch ($jme)')[0]
    ranges={k.upper():[int(a),int(b)] for k,a,b in re.findall(r'\$p_ab_(str|dex|con|int|wis|cha) = mt_rand\((\d+),(\d+)\)',header)}
    modifiers=[int(v) for v in re.findall(r'\$th_sk\d = (-?\d+);',header)]
    classes={}
    for row in re.finditer(r'case \d+:\s*\$p_class = "([^"]+)";([\s\S]*?)break;',block):
        stats={k.upper():[int(a),int(b)] for k,a,b in re.findall(r'\$p_ab_(str|dex|con|int|wis|cha) = mt_rand\((\d+),(\d+)\)',row[2])}
        caps=[int(n) for n in re.findall(r'\$p_lvl_limit = (\d+)',row[2])]
        age=re.search(r'\$p_age = (\d+)\+mt_rand\((\d+),(\d+)\)',row[2])
        classes[row[1]]={'ranges':stats,'caps':caps,'age':[int(n) for n in age.groups()] if age else [18,1,6]}
    races[m[1]]={'ranges':ranges,'thief':modifiers,'classes':classes}
thieves={}
for m in re.finditer(r'\$a_level == (\d+)\)\{([^}]+)\}',body):
    values=[int(v) for v in re.findall(r'\$th_sk\d=\$th_sk\d\+(\d+)',m[2])]
    if len(values)==8: thieves[m[1]]=values
thieves['24']=[99,99,79,99,99,99,99,99]
gear={}; languages={}; attributes={}; turning={}
for rules in ['bx','ll']:
    funcs=fun(rules+'_rules'); text=funcs[rules+'_basic_gear']; rows=[]
    for m in re.finditer(r'case (\d+):\s*\$(weapon2?|armor) = ([^;]+);\s*\$(hands|ac)=(-?\d+);\s*\$classes = array\(([^)]+)\)',text):
        rows.append({'kind':m[2],'index':int(m[1]),'parts':scope['template'](m[3]),'hands':int(m[5]),'classes':re.findall(r"'([^']+)'",m[6])})
    gear[rules]=rows
    languages[rules]=list(dict.fromkeys(re.findall(r'\$talk = "([^"]+)"',funcs[rules+'_languages'])))
    attributes[rules] = {row[1]: dict(re.findall(r'\$(aecmod\d+|mod\d+)="([^"]+)"', row[2])) for row in re.finditer(r'case (\d+):([^\n]+)break;', funcs[rules+'_basic_stat'])}
    turning[rules] = {row[1] or 'last': re.split(r'[|_]',row[2]) for row in re.finditer(r'(?:\$level == (\d+)\)|else )\{\$turning = "([^"]+)"', funcs[rules+'_basic_level'])}
# Spell slots are numeric reference rows. Wisdom bonuses are applied in JS.
spell_slots = {}
combat = body.split('///// DO THE CLASS')[-1].split('///// DO THE HIT POINTS')[0]
branches = list(re.finditer(r'(?m)^\t(?:else )?if \(\$p_class == "([^"]+)"\)\s*\n\t\{', combat))
for i, branch in enumerate(branches):
    block = combat[branch.end():branches[i+1].start() if i+1 < len(branches) else len(combat)]
    levels = {}
    for row in re.finditer(r'(?:\$p_level == (\d+)\)|else )\{\$p_skills = \$p_skills \. "([^"]+)&nbsp;spells&nbsp;\(([^\n]+)', block):
        text = row[3].split(') / ')[0].rstrip('"')
        slots = []
        for slot in text.split('&nbsp;'):
            bonus = re.search(r'\$sp_c_\d\+(\d+)', slot)
            number = re.fullmatch(r'\d+', slot.strip(' ".'))
            if bonus: slots.append(int(bonus[1]))
            elif number: slots.append(int(number[0]))
        if slots: levels.setdefault(row[1] or '24', []).append({'className':row[2], 'slots':slots, 'wisdom': '$sp_c_' in text})
    spell_slots[branch[1]] = levels
scope['write']('characterDetails',{'races':races,'thieves':thieves,'gear':gear,'languages':languages,'attributes':attributes,'spellSlots':spell_slots,'turning':turning})
print('Race/class records:',sum(len(r['classes']) for r in races.values()),'weapon rows:',{k:len(v) for k,v in gear.items()})
