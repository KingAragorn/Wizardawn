"""Export the original spell-name probability tables, including expansions."""
from pathlib import Path
import re
import json

ROOT = Path(__file__).resolve().parent.parent
source = (ROOT/'src/functions/spells.php').read_text(encoding='cp1252')
source = source[source.index('function gameSpellChooser'):]
branches = list(re.finditer(r'(?m)^(?:else )?if \(\$game == "([^"]+)"\)', source))
default = re.search(r'(?m)^else\s*\n\{\s*\n\tif \(\(\$magic', source).start()
blocks = [(row[1], source[row.end():branches[i+1].start() if i+1<len(branches) else default]) for i,row in enumerate(branches)] + [('OSRIC', source[default:])]
slugs = {'OSRIC':'osric','AD&D':'add','BFRPG':'bfrpg','Labyrinth Lord':'lablord','Swords & Wizardry':'sandw','Swords & Six-Siders':'ssxs','BD&D':'bdd'}
out = {}
for name, body in blocks:
    tables = {}
    def cells(text):
        result = {}
        for row in re.finditer(r'case\s+(\d+)\s*:\s*\$spell = "([^"]+)"', text):
            result.setdefault(int(row[1]), row[2])
        return result
    if name == 'Swords & Six-Siders':
        table = cells(body)
        # The source repeats case 38 and omits 39; retain both wall spells.
        table[39] = 'Wall of Ice'
        tables['wizard'] = {str(level): {'base':[table[i] for i in range(1, maximum+1)]} for level,maximum in [(1,13),(2,26),(3,41)]}
    elif name in ['Labyrinth Lord','AD&D','BD&D']:
        choices = cells(body)
        header = body.split('switch ($item)')[0]
        for row in re.finditer(r'\$magic == "(\w+)"\) && \(\$level == (\d+)\)\)([^\n]+)',header):
            ranges = [(int(a),int(b)) for a,b in re.findall(r'\$item = mt_rand\((\d+),\s*(\d+)\)',row[3])]
            def names(bounds): return [choices[i] for i in range(bounds[0],bounds[1]+1)]
            tables.setdefault(row[1],{})[row[2]] = {'base':names(ranges[-1]),'expanded':names(ranges[0])}
        fallback = re.search(r'(?m)^\s*else \{([^\n]+)',header)
        ranges = [(int(a),int(b)) for a,b in re.findall(r'\$item = mt_rand\((\d+),\s*(\d+)\)',fallback[1])]
        level = '6' if name == 'BD&D' else '9'
        tables.setdefault('mage',{})[level] = {'base':[choices[i] for i in range(ranges[-1][0],ranges[-1][1]+1)],'expanded':[choices[i] for i in range(ranges[0][0],ranges[0][1]+1)]}
    else:
        rows = list(re.finditer(r'\$magic == "(\w+)"\) && \(\$level == (\d+)\)\)\{ switch',body))
        for i,row in enumerate(rows):
            block = body[row.end():rows[i+1].start() if i+1<len(rows) else len(body)]
            tables.setdefault(row[1],{})[row[2]] = {'base':list(cells(block).values())}
    out[slugs[name]] = tables
(ROOT/'js/data/spellChoices.js').write_text('window.WZ_DATA = window.WZ_DATA || {};\nwindow.WZ_DATA.spellChoices = '+json.dumps(out, ensure_ascii=False)+';\n')
print({game: sum(len(levels) for levels in classes.values()) for game,classes in out.items()})
