# Wizardawn JS vs original PHP — audit (refs #6)

Living checklist so work can continue in any session. Evidence paths are relative to the repo root (`src/` = original PHP).
Regenerate the option table with: `python3` form scan of `src/tool_*.php` (see "How to regenerate") and compare with `W.routes[route].fields`.

## Done
- coins, packs, alchemist: verified name drift only — JS already reads x_pile/x_value1/x_value2, x_packs/x_eat, x_amount/x_potion/x_value1/x_value2 as aliases (no missing logic).
- loot (tool_loot.php): added x_cond, x_oldway, ua, aec, x_whichmagic (game-table vs Wizardawn magic split via makeRPGmagic names), x_type renamed to PHP name with original labels; `type`/`min`/`max` kept as aliases.
- [x] Per-game option filtering (refs #5): `js/export-field-games.py` → `js/data/fieldGames.js`; `W.formFields` hides options the PHP wraps in `$x_game` conditions. Fields may also carry `games: [...]` for routes the PHP map does not cover.
- [x] Hex crawl / delve / locale / ultimate: added Unearthed Arcana (`ua`, AD&D, `tool_hexcrawl.php` 250-253 → `gameSpellChooser` in `functions/spells.php` 611+), S&W Hit Dice (`x_hit_dice`, 269-274, used by `calculateLife`), T&T Dice + Adds / Vary Amount / Difficulty (`tt_dice`, `tt_adds`, `tt_vary`, `x_ttlvl`, 184-199) and Weapons/Armor (`x_oldway`, 325-330). T&T Vary Amount now follows `functions/encounters.php` 88 (was always random).

- [x] `$pagame` (post-apocalyptic) gating exported too: hex-crawl/locale money, low-tech, robots, vehicles only for MF/Broken Urthe/Gamma World; furnish, weird, rich, low-magic only for the others.

## Consolidation plan
- Already shared: one `W.adventureFields` list drives hex-crawl, locale, delve, ultimate, uexfl, uruins; one route per generator with a game select (the PHP per-game menu entries `rpg_*.php` → `tool_*.php?...` all alias to the same route via `W.routeFor`). Keep that; do not add per-game routes.
- To do: the PHP-name ↔ JS-name drift (e.g. `map_wide`/`width`, `amount`/`n`) — prefer accepting the PHP names as aliases in the generators rather than renaming, so old bookmarks/POST names keep working.

## Form options: PHP inputs with no same-named JS field
Many are renames (map_wide/map_high → width/height, amount/x_amount → n). Each row needs checking: rename (just alias) or truly missing (port option + logic).
Columns: PHP file | JS route | PHP names missing in JS | default differences.

| tool_acity.php | ruined-city-map | map_wide, map_high, map_numbers |  |
| tool_alchemist.php | alchemist | x_amount, x_potion, x_value1, x_value2 |  |
| tool_area.php | area | x_areas, x_data |  |
| tool_bmbs.php | items |  |  |
| tool_books.php | books | amount |  |
| tool_brew.php | brews | x_value1, x_value2 |  |
| tool_bxadvg.php | bxadvg | x_img | x_var_dmg php=1 js=0 |
| tool_coins.php | coins | x_value1, x_value2, x_pile |  |
| tool_data.php | data |  |  |
| tool_delve.php | delve | map_wide, map_high, x_mm |  |
| tool_dice.php | dice | dice_min, dice_max, dice_num |  |
| tool_dmap.php | dungeon-map | use_cave, map_wide, map_high, map_numbers |  |
| tool_door.php | doors | x_show_ru, x_extra, dd_ff, dd_mm2, ua, aec, x_ttlvl, x_oldway, x_whichmagic |  |
| tool_encounter.php | encounters | x_level, tt_ads, x_ttlvl, x_characters, x_enemy, x_hit_dice, x_amount, x_mutants | x_might2 php=<?php echo $hdc; ? js=8 |
| tool_ftown.php | town | map_wide, map_high |  |
| tool_hexcrawl.php | hex-crawl | x_terrain, x_tu_c | x_might2 php=<?php echo $hdc; ? js=8 |
| tool_ladvg.php | ladvg | x_book_sp, x_img | x_show_age php=1 js=0 |
| tool_lists.php | lists | mom, wwlvl, mmttlvl, mmtt_vs, x_mutants, xls, x_describe |  |
| tool_llb_spells.php | basic-spells |  |  |
| tool_locale.php | locale | x_enemy_1, x_main_chance_1, x_enemy_2, x_main_chance_2, x_tu_c | x_might2 php=<?php echo $hdc; ? js=8 |
| tool_loot.php | loot | x_amount, x_cond, x_type, x_min, x_max, x_oldway, ua, aec, x_whichmagic, x_data |  |
| tool_mtown.php | mtown | map_wide, map_high |  |
| tool_names.php | names | amount |  |
| tool_oadvg.php | oadvg | x_img |  |
| tool_osric_spells.php | spells |  |  |
| tool_packs.php | packs | x_packs, x_eat |  |
| tool_potions.php | potions | amount |  |
| tool_scavenge.php | scavenge |  |  |
| tool_scifim.php | scifim |  |  |
| tool_smap.php | sci-fi-map | map_wide, map_high, map_numbers |  |
| tool_suburb.php | suburb-map | map_wide, map_high |  |
| tool_swmp.php | sewer-map | map_wide, map_high, map_numbers |  |
| tool_tmap.php | tmap | amount, x_data |  |
| tool_ttown.php | ttown | map_wide, map_high |  |
| tool_uexfl.php | uexfl | use_cave, geomorph_colored, map_wide, map_high, x_enemy_1, x_main_chance_1, x_enemy_2, x_main_chance_2, x_mixup | x_money php=gold js= |
| tool_ultimate.php | ultimate | use_cave, cave_dyson, cave_risus, cave_rorsch, cave_stone, cave_glenn, cave_stuart, cave_zero, map_wide, map_high, map_numbers, x_mm |  |
| tool_uruins.php | uruins | use_cave, geomorph_colored, map_wide, map_high, x_enemy_1, x_main_chance_1, x_enemy_2, x_main_chance_2 | x_might2 php=<?php echo $hdc; ? js=8 |
| tool_villg.php | settlement-map | map_wide, map_high, map_numbers |  |
| tool_wander.php | wander | x_level, x_amount, x_mutate, x_ttlvl, x_terrain, x_describe, x_code, x_data |  |
| tool_world.php | world | map_genre, map_climate, map_wide, map_high |  |
| tool_wtown.php | wtown | map_wide, map_high, ruler, columns |  |
| tool_zombies.php | zombies | amount |  |
JS generators with no tool_*.php form: ftown, data_magestykc_run

Priority truly-missing items (from reading the forms):
- [ ] loot (`tool_loot.php`): `x_cond` (post-apoc item condition), `x_type`, `x_min`/`x_max` value range, `x_oldway`, `ua`/`aec`, `x_whichmagic`, `x_data`.
- [ ] doors (`tool_door.php`): monster supplements `x_extra`/`dd_ff`/`dd_mm2`/`ua`/`aec`, T&T `x_ttlvl`/`x_oldway`, `x_whichmagic`, `x_show_ru`.
- [ ] encounters (`tool_encounter.php`): `x_level`, `x_characters`, `x_ttlvl`, `x_hit_dice`, `x_mutants`, `x_enemy`, `x_amount` (check names first — JS uses `level`/`characters`/`enemy`).
- [ ] wander: `x_mutate`, `x_ttlvl`, `x_terrain`, `x_describe`, `x_code`.
- [ ] lists: `mom`, `wwlvl`, `mmttlvl`, `mmtt_vs`, `x_mutants`, `x_describe`, `xls`.
- [ ] ultimate / uruins / uexfl / dmap: cave map sets (`use_cave`, `cave_*`), `geomorph_colored`, `map_numbers`.
- [ ] locale / uruins / uexfl: second enemy group (`x_enemy_1`, `x_main_chance_1`, `x_enemy_2`, `x_main_chance_2`), `x_mixup`.
- [ ] hex-crawl / locale: `x_tu_c` (third encounter row?) ; delve/ultimate: `x_mm`.
- [ ] world: `map_genre`, `map_climate`. wtown: `ruler`, `columns`. bxadvg/oadvg/ladvg: `x_img` (character portrait), `x_book_sp`.
- [x] Defaults: bxadvg `x_var_dmg` and ladvg `x_show_age` now checked like the PHP.
- [ ] Default: uexfl `x_money` (PHP "gold"; JS blank = game default, check output matches).
- [ ] oadvg shows Alignment / Choose languages checkboxes the OSRIC form doesn't have (kept: extra feature, not a loss).

## Not yet audited
- [ ] Output structure/wording per generator (compare with `phpResult()` in tests where PHP fixtures exist).
- [ ] Navigation/menus vs `menus` table order and labels; help/about pages; images (portal, geomorph art, game logos).
- [ ] Visual/layout per game theme.

## How to regenerate
The scan used: for each `src/tool_*.php`, the form part before `SubmitButton`, first `<input|select|textarea name=...>` per name, default from `checked`/`value`. Compare names with `W.routes[W.routeFor(file)].fields`.
