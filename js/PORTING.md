# Wizardawn JavaScript port

Open `js/index.html` directly from disk. No build or server is needed. All browser
code and data use classic scripts. Source PHP is read only for development and
comparison; it is never shipped to or evaluated by this client.

## Batches

Earlier run notes below are historical. The status table and the latest
Run 4 progress entries record the current resume state.

1. Core/portal: seeded dice, HTML helpers, hash router, original portal, menus,
   original editorial help/game pages, notices and licences. Complete.
2. Table generators: first group implemented and verified; details below.
3. Six geomorph map tools implemented; world/hex-crawl previews implemented.
   Detailed settlements, delves and multi-part adventure content remain.

`node --test tests/js.test.mjs` verifies the client.
`node tests/js-browser.mjs` runs the direct-file Chrome smoke test when the host
allows Chrome to launch. No test starts an HTTP server. `node js/export-data.mjs`
refreshes static editorial data from the original PHP using the development-only
PHP comparison runtime. The PHP helper uses an offline runtime with no sockets.
Generator algorithms must be hand-written JavaScript; PHP tables may be exported.
`python3 js/extract-tables.py` refreshes the literal PHP/JSON tables and map artwork.
The exporter files are development tools and are not loaded by `index.html`.

Statuses refer to generator behavior, not just the presence of a menu link.
Known remaining routes show an explicit porting notice; unknown routes show home.
External rulebook links remain in editorial pages; only files present in `src/`
are bundled. No deployment has been made.

## Original pages

| Original page | Status | Hash route |
| --- | --- | --- |
| `index.php` | ported | `#/` |
| `data_help.php` | ported | `#/data_help` |
| `data_magestykc.php` | ported | `#/data_magestykc` |
| `data_magestykc_run.php` | partial | `#/data_magestykc_run?id=lang` / `id=kin` / `id=mon` |
| `game_mm.php` | ported | `#/rules/mm` |
| `game_necro.php` | ported | `#/rules/necro` |
| `game_ruins.php` | ported | `#/rules/ruins` |
| `game_ryft.php` | ported | `#/rules/ryft` |
| `game_swga.php` | ported | `#/rules/swga` |
| `game_urthe.php` | ported | `#/rules/urthe` |
| `game_ww.php` | ported | `#/rules/ww` |
| `help_about.php` | ported | `#/help/about` |
| `help_navigate.php` | ported | `#/help/navigate` |
| `help_print.php` | ported | `#/help/print` |
| `map_window.php` | remaining | `#/map_window` |
| `rpg_add.php` | ported | `#/game/add` |
| `rpg_apoc.php` | ported | `#/game/apoc` |
| `rpg_bdd.php` | ported | `#/game/bdd` |
| `rpg_bfrpg.php` | ported | `#/game/bfrpg` |
| `rpg_data.php` | ported | `#/game/data` |
| `rpg_fantasy.php` | ported | `#/game/fantasy` |
| `rpg_gamma.php` | ported | `#/game/gamma` |
| `rpg_horror.php` | ported | `#/game/horror` |
| `rpg_lablord.php` | ported | `#/game/lablord` |
| `rpg_meta.php` | ported | `#/game/meta` |
| `rpg_millen.php` | ported | `#/game/millen` |
| `rpg_mutfut.php` | ported | `#/game/mutfut` |
| `rpg_necro.php` | ported | `#/game/necro` |
| `rpg_osric.php` | ported | `#/game/osric` |
| `rpg_ryft.php` | ported | `#/game/ryft` |
| `rpg_sandw.php` | ported | `#/game/sandw` |
| `rpg_scifi.php` | ported | `#/game/scifi` |
| `rpg_ssxs.php` | ported | `#/game/ssxs` |
| `rpg_tt5e.php` | ported | `#/game/tt5e` |
| `rpg_tt7e.php` | ported | `#/game/tt7e` |
| `rpg_ttde.php` | ported | `#/game/ttde` |
| `rpg_urthe.php` | ported | `#/game/urthe` |
| `rpg_ww.php` | ported | `#/game/ww` |
| `tool_acity.php` | ported | `#/ruined-city-map` |
| `tool_alchemist.php` | partial | `#/alchemist` |
| `tool_area.php` | ported | `#/area` |
| `tool_bmbs.php` | partial | `#/items` |
| `tool_books.php` | partial | `#/books` |
| `tool_brew.php` | ported | `#/brews` |
| `tool_bxadvg.php` | partial | `#/bxadvg` |
| `tool_coins.php` | ported | `#/coins` |
| `tool_data.php` | partial | `#/data` |
| `tool_delve.php` | partial | `#/delve` |
| `tool_dice.php` | ported | `#/dice` |
| `tool_dmap.php` | ported | `#/dungeon-map` |
| `tool_door.php` | partial | `#/doors` |
| `tool_encounter.php` | partial | `#/encounters` |
| `tool_ftown.php` | partial | `#/town` |
| `tool_hexcrawl.php` | partial | `#/hex-crawl` |
| `tool_ladvg.php` | partial | `#/ladvg` |
| `tool_lists.php` | partial | `#/lists` |
| `tool_llb_spells.php` | ported | `#/basic-spells` |
| `tool_locale.php` | partial | `#/locale` |
| `tool_loot.php` | partial | `#/loot` |
| `tool_mtown.php` | partial | `#/mtown` |
| `tool_names.php` | ported | `#/names` |
| `tool_oadvg.php` | partial | `#/oadvg` |
| `tool_osric_spells.php` | ported | `#/spells` |
| `tool_packs.php` | ported | `#/packs` |
| `tool_potions.php` | ported | `#/potions` |
| `tool_scavenge.php` | partial | `#/scavenge` |
| `tool_scifim.php` | remaining | `#/scifim` |
| `tool_smap.php` | ported | `#/sci-fi-map` |
| `tool_suburb.php` | ported | `#/suburb-map` |
| `tool_swmp.php` | ported | `#/sewer-map` |
| `tool_tmap.php` | partial | `#/tmap` |
| `tool_ttown.php` | partial | `#/ttown` |
| `tool_uexfl.php` | partial | `#/uexfl` |
| `tool_ultimate.php` | partial | `#/ultimate` |
| `tool_uruins.php` | partial | `#/uruins` |
| `tool_villg.php` | ported | `#/settlement-map` |
| `tool_wander.php` | partial | `#/wander` |
| `tool_world.php` | partial | `#/world` |
| `tool_wtown.php` | partial | `#/wtown` |
| `tool_zombies.php` | ported | `#/zombies` |
| `lic/lic_ll.pdf` | ported | `#/licence/ll` (original local PDF) |
| `lic/lic_mf.pdf` | ported | `#/licence/mf` (original local PDF) |
| `lic/lic_ogl.html` | ported | `#/licence/ogl` |
| `lic/lic_osric.html` | ported | `#/licence/osric` |
| `lic/lic_sw.html` | ported | `#/licence/sw` |

Shared include-only files (`body.php`, `css.php`, `css_reports.php`, `db.php`,
`vars.php`, `top.php`, `notices.php`, `game_defaults.php`, `game_options.php`)
are represented by the client core/layout/data. `save_image.php` is a server
endpoint; a browser export replacement is remaining. Menus under `src/menus/`
are represented by `data/menus.js` and the layout; no menu destination is omitted.

Batch 1 validation: 5 Node tests pass. A direct file:// headless Chrome launch
was attempted, but macOS sandbox restrictions abort Chrome at startup (SIGABRT / 
EPERM); browser verification has not yet run. No server was started.

## Batch 2 implementation notes

- Complete: names (34 categories), coins, combat dice sheets, Labyrinth Lord
  basic spell books and OSRIC spell books (class/level/sort/individual/reference options).
- Books: ordinary titles ported; unusual magic books remain.
- Potion appearances/recipes: original seven fantasy game tables, AEC and UA
  variants ported. Tunnels & Trolls full potion effects remain.
- Alchemy shelf: reagent bottles/prices and potions from those seven lists work;
  full magic-item bottle decoration and T&T variants remain.
- Names use the original literal tables and combinations, including the indexed
  Holmesian epithet table, gendered titles and Hyborian syllable limits.
- Coins fix another original defect: PHP reported gold **plus** the same unreduced
  copper balance. JS reports the selected value once. Optional mixed denominations
  conserve value exactly; seeded results are reproducible, not PHP RNG sequences.
- Encounter Creation: source filtering, selection by original monster ID/name,
  stat blocks and individual hit points work. Game-specific T&T/Broken Urthe
  combat scaling, mutations and treasure remain.
- Wandering Enemies/Monster Listing: original monster database, source/terrain/
  difficulty filtering and weighted selection work. Extended custom data, original
  report sorting variants and game-specific stat transformations remain. Wandering
  results are saved to localStorage when available, with no SQL or network writes.
- Apocalypse: mundane table works for Mutant Future and missing game. It uses the
  complete original 300-row PickJunk table, condition/value rules and 3–13 finds
  per row. Full room-clutter mixing and other Apocalypse sections remain.

Batch 2 validation: Node/PHP comparison tests cover category/result counts,
potion lists/expansions, recipe/reagent sections, spell names and class/level
selection; regression tests cover local wandering storage and safe mundane items.
Browser-host fallback is unavailable as well as the sandboxed Chrome launch.

Commit checkpoints (required message format):
- `JS rewrite: core and portal (refs #3)` — blocked: `.git/index.lock` creation
  denied by the environment's read-only `.git` permission.
- `JS rewrite: table generators (refs #3)` — same permission restriction.
No commits or pushes have been made. Changes are in the working tree.

## Batch 3 implementation notes

- Six geomorph map tools: dungeon/cavern/side view, settlement (city/keep/village),
  sci-fi (building/spaceship/Exodus; classic blue or black & white), sewers,
  suburbs and ruined cities. Original artwork, border tiles, room coordinates,
  artist filters, dimensions, numbering and local map storage are implemented.
- World Maps is partial: original 80-cell land templates, template weights,
  classic grid/icons, several climates, water borders and legend render. Exact
  latitude transitions/inheritance, icon probabilities, color overlays, mountain
  borders, hull and full original information controls remain.
- World Adventure / hex crawl is partial: fixed 2×2 world blocks, bounded map
  generation, numbered/keyed sites and terrain-filtered enemy blocks. Missing or
  invalid game safely defaults to Labyrinth Lord; an empty pool shows a message.
  Full site interiors, dungeon levels, inhabitants, treasure and adventure
  options remain. Do not mistake this preview for the full original adventure.
- Saved maps/worlds/wandering tables always remain in memory; localStorage adds
  persistence where the browser permits it for file origins.
- Original game fonts/backgrounds have local CSS themes. Original portal menus,
  game/genre descriptions, help, licence texts/PDFs and credits are preserved.
  Original query-bearing PHP links are rewritten as hash links too.

Validation: 42 Node tests, including original-PHP structural comparisons,
seed stability, form submission/hash round trips, local art/fonts, source filters,
map variants and all three reported bug paths. `tests/js-browser.mjs` is supplied
for real file:// checks; Chrome launch remains blocked by macOS sandbox policy.
`src/`, `web/`, `dist/` and `/Volumes/web` were not modified. No deployment,
push or long-lived server was started.

Batch 3 checkpoint: `JS rewrite: geomorph maps and world previews (refs #3)` —
blocked by the same read-only `.git` restriction.

## Run 2 (resume after 1919e68)

The user committed batch 1 as `1919e68` on `js-rewrite`. No commit or Chrome
launch was attempted during run 2, as requested. All work remains under `js/`
and `tests/js.test.mjs`; no deployment or server was started.

Completed in this run:

- `#/packs`: the original 74 gear categories, unique choices per pack, ordinary
  or simple food/drink, clothing, bedding, lighting, bags and coin pouches.
- `#/area`: original custom-data format, every chance/min/max/reduction control,
  named/main encounters, terrain/level filters, decorations, containers, trapped
  loot, encounter-level loot adjustment, and weighted nested treasure lists.
  Cyclic sublists stop safely. All 19 original data files are selectable from
  classic-script data, with no fetch or file API required.
- `#/zombies`: modern names, sex/age, hair/facial hair, clothing, injuries, skin,
  inventory, plus the Necropalyx stamina/protection/hit/attack/damage/move block.
- `#/potions`: all 69 T&T reference effects (including 11 poisons), durations,
  attribute changes, curses, and edition-specific INT/DEX terminology.
- `#/brews`: all 58 T&T brewable recipes with the original saving-roll levels,
  effects, appearance, preparation steps and deduplicated reagent price list.
  These extend the seven fantasy game lists already ported in run 1.

Expanded partial implementations (do not treat these as full parity):

- `#/books`: unusual chance, named magical tomes, all 16 T&T / 17 other-game
  effect branches, curses, golem instructions, hidden contents and treasure-map
  clues now work. Exact game-specific random spell selection and full language
  tables for treasure clues still need work.
- `#/alchemist`: T&T potion effects and original bottle categories added. Exact
  weighted potion selection from makeRPGmagic (including its nested control
  subtypes) remains; current selection uses the complete game name lists.
- `#/scavenge`: all 21 original modern scavenging tables, including quantity
  ranges and nested books/toys/magazines, building types, building/corpse set
  counts and condition option. Survival-horror mode works. Post-apocalyptic
  mutant corpse descriptions and the 10% game-specific exceptional finds remain.
- `#/encounters`: amount now correctly means encounters, with group sizes and
  individual hit points derived from the original m_app/m_hp fields. T&T group
  MR/dice and difficulty conversion, special low-HP cases, Gamma/MA conversions,
  mutations, weapons and game-specific fields added. Optional treasure remains.
- `#/wander` / `#/lists`: custom files, edition-specific T&T attributes/abilities,
  original weapons (classic/simple), Gamma/MA text adaptations, mutant names,
  name/level sorting, columns/stat-block and grouped terrain reports added.
  Some special robot/creature transformations and report details remain.
- `#/world`: all latitude schedules (heights 1–10), northward terrain inheritance,
  terrain-specific icon rules, genre-specific inland/coastal/underwater landmarks,
  lunar/Exodus modes, water/mountain/cavern borders, outer hull, color overlays,
  landmark highlights, compass, information and legend controls now work.
  Exact rare landmark/subtype probabilities and full legend equivalence still
  need a further comparison pass. The same map engine improves `#/hex-crawl`;
  full crawl interiors, inhabitants, treasure and adventure options still remain.
- `#/items`: still the run-1 mundane-item implementation. The full Apocalypse
  reference report and room-clutter mixing remain.

Validation added: exhaustive rendering of every modern scavenging table cell;
PHP comparisons of T&T potion/recipe counts, unusual-book counts, packs, custom
areas, zombie/Necropalyx counts, scavenging sets and conditions; T&T monster MR
checks at four difficulties in all three editions; all creature stat blocks in
14 game modes; report layouts/custom wandering; every world climate/genre,
colors, borders, hull, inheritance and local asset existence.

Two PHP-oracle-only corrections are made in memory in the tests: TTSaves gets a
default for its unused game argument (the original potion page crashes at
Truthfulness), and stat_blocks resolves its nested monsters_tt include relative
to __DIR__ (the Node runtime's working directory differs from Apache). Neither
correction edits `src/` or ships PHP to the JavaScript client.

Next work: finish the partial limitations above, then doors, loot, scifim, locale,
data; towns (ftown, mtown, ttown, wtown); delve; bxadvg, ladvg, oadvg, ultimate,
uexfl, uruins; tmap and full hex-crawl. Keep the existing PHP comparison tests
and classic-script/file:// restrictions. Do not commit, launch Chrome or deploy
in this sandbox; the user handles commits and browser testing.

Run 2 verification: `node --test tests/js.test.mjs` — 57 tests passed. Git status
shows changes only in `js/` and `tests/js.test.mjs`. Chrome was not launched.

## Run 3 audit (run 4 starting point, 5d0289b)

The run 3 commit added 23 passing tests (80 total) and four generator files,
but did not update this checklist. The table above now reflects those files.
None of the new generators has full PHP parity yet; they are **partial**.

- `towns.js`: all four settlement routes generate maps, numbered homes,
  families, rulers, shops, institutions and local records. Remaining: exact
  shop assignment/economy, inventory pricing/quantities/special services,
  citizen equipment and rule-specific leaders, post-apocalyptic details.
- `characters.js`: bxadvg/ladvg/oadvg produce class counts, attributes, levels,
  XP, saves, attacks, equipment, skills and spell lists. Remaining: precise
  OSRIC combat/thief/race rules, original sheets, option semantics and gear.
- `adventures.js`: delve/ultimate/uexfl/uruins produce keys, encounters, traps,
  treasure and wandering tables; complex/progressive delves have subfloors.
  Remaining: custom encounter data integration, original floor progression,
  complete room furnishing/features, post-apocalyptic contents and options.
- `treasure.js`: doors, loot, tmap and data are working approximations, now
  listed as partial. Weighted magic/technology selection, original treasure-map
  rules, exact reference tables and custom-data behavior need further work.
- `items` is still the mundane-only report. `hex-crawl` is still a preview.
  locale, scifim, Magestykc data pages and the map viewer/export remain absent.

Earlier batch notes describe their historical state and are not completion
claims. The status table and latest run notes take precedence. No commit,
Chrome launch, push, deployment or server will be attempted in run 4.

## Run 4 progress

- Audit completed first: every run 3 implementation is now recorded as partial
  in the status table, with specific missing behavior above. Baseline: 80 tests.
- Settlements expanded: original OSRIC shop IDs and all five guilds, section
  allocation order across economy tiers, correct T&T Simple/Complex/Deluxe
  inventory filters, PA low/hi/both technology and game filters, boat quantity
  flags, stock-zero semantics, monthly stock, banks with chest contents/guards,
  church/guild services, clothing/possessions tables, leader equipment, original
  royal guard counts, OSRIC character officials, and age-based PA HD/HP/resists.
  Robot households no longer generate spouses/children; official fallback uses
  two existing residents. Original ruler/guards and PHP game option aliases work.
  Still partial: exact T&T complex armor generation, full robot/mutant body
  descriptions, full character parity (also affects OSRIC officials), hidden
  furnishing/loot interactions and presentation differences. 83 tests pass.
- Delve/adventures expanded: original 0×0 corner-only small floors, 1×1 medium
  and 2×1/1×2 large floors, correct interior water/exit filters, floor omission,
  original progressive level schedule, tomb/undead selection, custom room data
  integration, encounter/treasure records, loot adjustment and hoarding flags.
  Progressive wandering table sizes now match the original. Still partial:
  complete furnishing/hidden loot and unusual-room branches, magic generation,
  exact wandering ordering/roll labels and report layouts.
- Apocalypse now has all eight reference sections (100 mundane, 20 room traps,
  20 paired containers, 20 container traps, 100 money, 100 exceptional items,
  20 hoards, 100 encounters), optional original solitaire rules and local art.
  Mundane generation mixes the original 144 room-clutter cells with junk;
  spaceship variants, container types, PA currency, 55 trap branches and original
  technological artifact descriptions are shared with sci-fi/ruins adventures.
  The missing-game/Mutant Future path stays safe. Still partial: several nested
  clutter helpers and exceptional-item size/condition details are approximated;
  not yet a full-equivalence claim. Exhaustive cell/branch tests added.
- Treasure maps now generate level+2..10 individual finds, one coin allocation,
  original coin/gem/jewelry thresholds, custom nested treasure on each find,
  optional trapped containers and game-specific clue languages. Shared magic
  generation still limits parity, so tmap remains partial.
- Hex crawl now generates site inhabitants, underwater depth/air seals, interior
  maps and keyed rooms across floors, camp/lair/wreck contents, wandering/freshwater
  and item tables. Terrain, party, room-content and treasure controls feed those
  interiors; no-game and empty candidate pools remain bounded. Locale now uses
  the same site engine for every original fantasy and PA location selection.
  Both remain partial: site-specific narratives, exact inhabitant and map rules,
  stranded vehicles/robots, rare landmark branches and individual furnishing
  behavior still differ. The map/site work must not be labelled full parity.
- Character rules expanded: all 36 original OSRIC race/class combinations now
  use their original attribute ranges, age and attribute-dependent level caps;
  thief skills use original level rows plus racial/DEX modifiers, exceptional
  strength and THAC0 progression. Basic characters use the original class-legal
  weapon tables, armor/shield rules, racial languages and age ranges. Independent
  PHP function comparison now verifies every valid B/X and LL attack/save row.
  Character routes remain partial: original character-sheet artwork overlays,
  detailed XP/attribute reports, AEC variants, full magic gear and some OSRIC
  class/racial abilities still need work. 95 tests currently pass.
- Further settlement checks cover the original new-city/ruined-city/new-village
  artwork choices, inherited mutant anatomy, physical mutation descriptions and
  robot forms. Scavenging now uses original mutant surnames/corpse descriptions
  and the 10% game-specific artifact branch. These remain partial where their
  shared equipment/artifact helpers differ from PHP.
- Dungeon furnishings now cover every wall, ceiling, floor and near-wall
  selection, with shelf/food/clothing/rack contents and hiding-place metadata.
  All 192 floor-item cells and 174 shelf-item cells render; each item's numeric
  descriptions come from literal template data. Adventures place treasure in
  those hiding spots and respect the room's original one-coin-allocation rule.
  Remaining: full nested painting, cage, cauldron, torture, egg and exceptional
  item helpers, exact repeated hiding-place reuse and report presentation.
- Custom loot now repeats nested treasure finds for the requested min/max count
  (including PHP's min>max clamp), and PA hoards use original currency amounts.
  Data listing covers every original category, including Deluxe treasure.
  Technology-chance controls are exposed on both post-apocalyptic adventures.
  Latest verification: 101 Node tests pass; no browser launch was attempted.
- Character detail pass added original B/X and LL two-page sheet artwork and
  positioned fields (including age/AEC variants), full basic attribute modifier
  rows checked against PHP, XP adjustments, pocket money and cleric turning
  tables. Corrected the LL thief table's delimiter, AEC thief modifiers, basic
  spell-book count/cap rules, OSRIC divine Wisdom bonuses and ranger dual spell
  classes. BD&D magic now uses all eight original weighted percentile tables,
  including charges, quantities, scroll spells and treasure-map outcomes.
  Full parity still needs OSRIC sheet/report details, all games' magic rules,
  intelligent swords and some class/racial/equipment details. Sheet placement
  needs the user's browser review; Chrome remains unlaunched. 104 tests passed
  before the additional magic/feature/encounter checks below.
- Post-apocalyptic unusual rooms now use the original six technology branches
  (vending machine, teleporter, fruit, cloning, escape pod, computer) rather than
  fantasy unusual rooms. Encounter Creation now supports optional hoards with
  original level-based find counts, container choices and coin allocation.
- Added the Magestykc supplement page, complete language/learning-SR listing
  and kindred narratives/modifier table from the original monster data. Monster
  supplements support all three editions and six difficulties but retain the
  shared monster-report limitations, so data_magestykc_run remains partial.
  Menu links now preserve original query options while mapping PHP filenames to
  clean hash routes. Latest full verification before these supplements: 108 tests.
- OSRIC officials/adventurers now use the original ability effects (exceptional
  strength, minor/major tests, DEX AC/surprise/ranged modifiers, Constitution
  survival/shock, mental saves, racial saves and Charisma henchmen/reactions).
  Independent PHP checks cover every score 3–19 across classes/races and all
  exceptional-strength bands. Class/racial languages and notes, normal class-
  legal gear, armor AC, shields, ranged equipment and camp packs are expanded.
  Original enchantment/loose-magic equipment logic still remains. 113 tests pass.
- Random spells now use the original seven games' literal class/level tables,
  weighted arcane/divine class choice, caster-level conversion and AEC/UA pools.
  Six-Siders' duplicate case 38 / missing 39 is repaired so Wall of Fire and
  Wall of Ice are both reachable. This improves scrolls and unusual books.

## Run 5 (Grok Bot, no Codex)

- Towns: merchant headers now follow `fantasy_stores_gn/tt/osric.php`: original
  owner titles (Bartender, Inn Keeper, Fletcher/Bowyer, … OSRIC Banker), stored
  gold formatted `[1,234gp]`, and guilds/guards/churches shown as Caretaker with
  `[type]`. Fantasy/T&T church members are CHURCH PRIEST; church services follow
  the leader entry with the original wording. Towns remain partial (economy,
  special services, post-apocalyptic details). 115 tests pass.
- Towns: business names now follow the original builders: churches
  "[The ]Holy Temple of the Gods", guardhouses "[The ]Watchful <monster>
  Barracks", guilds "[The ]<members> <adjective> <lodge>" (original word lists,
  incl. OSRIC Thieves/Rangers/Assassins), inn price inside the name line.
- mtown: owner titles per tool_mtown.php (Banker, Bartender, Doctor, Pawn
  Broker, "Owner (Army Surplus)" …), stored money always shown; vaults numbered
  across the settlement with conditioned junk values and a money bag. 116 tests.
- ttown: T&T wizard/rogue guild services now follow the guild leader with the original fantasy_stores_tt.php wording.
- mtown: officials intro line, Governor/Mayor/Constable title, and law officers carry a PAgetWeapon duty weapon chosen by tech level (tool_mtown.php).
- delve: cavern areas use all eight original descriptions plus the 1-in-6 dripping-water line; furniture contents only appear on the original 40% roll and use the "is..." wording (tool_delve.php).
- bxadvg/ladvg: character listings open with the original per-ruleset preamble (alignment/age clauses follow the options); basic AC is capped at 9 like the PHP.
- oadvg: listing preamble from tool_oadvg.php, with the Labyrinth Lord vs OSRIC saving-throw legend.
- ultimate/delve: atmosphere sound lines use the original soundWhereRoom qualifier list (a faint, an eerie, ...) instead of a fixed "a".
- uruins: stranded vehicles use VehicleRobotMaker (vehicle_and_robots.php): 2d6 condition bands, 1-in-3 drained fuel, candle/military colors, Metamorphosis Alpha list, ucwords casing, and the "STRANDED VEHICLE NEXT TO THE BUILDING..." heading. Broken Urthe vehicles and robot text remain partial.
- uexfl/uruins: uexfl prints "SOMETHING UNUSUAL IN THE ROOM..."; uruins robots use "STRANDED ROBOT INSIDE/NEXT TO THE BUILDING..." (other post maps: "DERELICT ROBOT IN THE ROOM...").
