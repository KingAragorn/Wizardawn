#!/usr/bin/env python3
"""Build the SQLite database the in-browser PHP reads, from data/json/*.json."""
import json, os, sqlite3, sys, glob
root = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
out = sys.argv[1]
if os.path.exists(out): os.remove(out)
db = sqlite3.connect(out)
INT = {'int', 'tinyint', 'smallint', 'mediumint', 'bigint'}; REAL = {'float', 'double', 'decimal'}
for f in sorted(glob.glob(os.path.join(root, 'data/json/*.json'))):
    d = json.load(open(f, encoding='utf-8'))
    defs = []
    for c in d['columns']:
        ty = 'INTEGER' if c['type'] in INT else 'REAL' if c['type'] in REAL else 'TEXT COLLATE NOCASE'
        if c['key'] == 'PRI': ty = 'INTEGER PRIMARY KEY' if c['type'] in INT else ty + ' PRIMARY KEY'
        defs.append(f'"{c["name"]}" {ty}')
    db.execute(f'CREATE TABLE "{d["table"]}" ({", ".join(defs)})')
    db.executemany(f'INSERT INTO "{d["table"]}" VALUES ({",".join("?"*len(d["columns"]))})', d['rows'])
db.commit(); db.execute('VACUUM'); db.close()
