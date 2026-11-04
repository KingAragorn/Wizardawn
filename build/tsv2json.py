#!/usr/bin/env python3
"""One-time export: mysql -B dumps (data/tsv) -> data/json/<table>.json.
Each JSON file is {"columns":[{"name","type","key"}...], "rows":[[...],...]}."""
import json, os, collections
here = os.path.dirname(os.path.abspath(__file__)); root = os.path.dirname(here)
cols = collections.OrderedDict()
for line in open(os.path.join(root, 'data/tsv/_cols.tsv'), encoding='utf-8'):
    t, c, ty, key = (line.rstrip('\n').split('\t') + [''])[:4]
    cols.setdefault(t, []).append({'name': c, 'type': ty, 'key': key})
def unesc(s):
    if s == 'NULL': return None
    out = []; i = 0
    while i < len(s):
        ch = s[i]
        if ch == '\\' and i + 1 < len(s):
            n = s[i+1]; out.append({'n': '\n', 't': '\t', '0': '\0', '\\': '\\', 'r': '\r'}.get(n, n)); i += 2
        else: out.append(ch); i += 1
    return ''.join(out)
INT = {'int', 'tinyint', 'smallint', 'mediumint', 'bigint'}; REAL = {'float', 'double', 'decimal'}
for t, cs in cols.items():
    rows = []
    for line in open(os.path.join(root, f'data/tsv/{t}.tsv'), encoding='utf-8', newline='\n'):
        vals = [unesc(v) for v in line.rstrip('\n').split('\t')]
        assert len(vals) == len(cs), (t, len(vals), len(cs))
        for i, c in enumerate(cs):
            if vals[i] is not None and c['type'] in INT: vals[i] = int(vals[i])
            elif vals[i] is not None and c['type'] in REAL: vals[i] = float(vals[i])
        rows.append(vals)
    json.dump({'table': t, 'columns': cs, 'rows': rows}, open(os.path.join(root, f'data/json/{t}.json'), 'w', encoding='utf-8'), ensure_ascii=False, separators=(',', ':'))
    print(t, len(rows))
