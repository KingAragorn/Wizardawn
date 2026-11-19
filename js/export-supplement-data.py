"""Bundle original supplement editorial text and literal language levels."""
from pathlib import Path
from shutil import copyfile
import re
import json

ROOT = Path(__file__).resolve().parent.parent
text = (ROOT/'src/data_magestykc_run.php').read_text(encoding='cp1252')
editorial = (ROOT/'src/data_magestykc.php').read_text(encoding='cp1252')
intro = editorial.split('?>',1)[1].split('</p>',1)[0].strip()
language_intro = re.search(r'(This is a complete listing[\s\S]+?)<hr>', text)[1].strip()
language_rules = re.search(r'(There is also an SR[\s\S]+?)</td>', text)[1].strip()
kindred_intro = re.search(r'(This is a listing of the different types of kindred[\s\S]+?)</font>', text)[1].strip()
levels = {name: int(level) for name,level in re.findall(r'\$speak == "([^"]+)"\)\{\$value = (\d+);', text)}
data = {'intro': intro, 'languageIntro': language_intro, 'languageRules': language_rules, 'kindredIntro': kindred_intro, 'languageLevels': levels}
(ROOT/'js/data/supplements.js').write_text('window.WZ_DATA = window.WZ_DATA || {};\nwindow.WZ_DATA.supplements = '+json.dumps(data, ensure_ascii=False)+';\n')
for name in ['tt_bw_logo.jpg','tt_mg_magestykc.jpg','tt_mg_languages.jpg','tt_mg_kindred.jpg','tt_mg_monsters.jpg']:
    copyfile(ROOT/'src/pics_tools'/name, ROOT/'js/pics_tools'/name)
