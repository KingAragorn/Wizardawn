#!/usr/bin/env bash
# Deploys dist/ (the static Wizardawn site) to a web directory.
# Usage: ops/deploy.sh [target] [--dirty] [-n|--dry-run]
# Default target: $WIZARDAWN_DEPLOY_DIR or /Volumes/web/truculent.org/wizardawn
# Run `npm run build` first. .php files are never deployed: the PHP sources
# travel inside php-bundle.bin and run in the browser, and a PHP-enabled web
# server must not execute them.
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

die() {
    printf 'Deploy refused: %s\n' "$*" >&2
    exit 1
}

target=${WIZARDAWN_DEPLOY_DIR-/Volumes/web/truculent.org/wizardawn}
target_set=0
dirty=0
dry_run=0
while [ "$#" -gt 0 ]; do
    case "$1" in
        --dirty) dirty=1 ;;
        -n|--dry-run) dry_run=1 ;;
        -*) die "Unknown option: $1 (usage: ops/deploy.sh [target] [--dirty] [-n|--dry-run])" ;;
        *)
            [ "$target_set" -eq 0 ] || die 'Only one target directory is allowed.'
            target=$1
            target_set=1
            ;;
    esac
    shift
done

[ -n "$target" ] || die 'The target directory is empty.'
while [ "${target%/}" != "$target" ]; do
    target=${target%/}
done
[ -n "$target" ] || die 'The target directory cannot be /.'
target_name=$(basename "$target")
case "$target_name" in
    .|..) die 'The target must name a directory, not . or .. .' ;;
esac
if [ "$target_name" != wizardawn ] && [ "${WIZARDAWN_ALLOW_ANY_TARGET-}" != 1 ]; then
    die 'The target basename must be wizardawn (override with WIZARDAWN_ALLOW_ANY_TARGET=1).'
fi
parent=$(dirname "$target")
[ -d "$parent" ] || die "Target parent does not exist: $parent (is the share mounted?)"
target="$(cd "$parent" && pwd -P)/$target_name"
[ ! -L "$target" ] || die 'The target directory cannot be a symbolic link.'
if [ -e "$target" ] && [ ! -d "$target" ]; then
    die "The target is not a directory: $target"
fi

[ -f dist/index.html ] && [ -f dist/sw.js ] && [ -f dist/php-bundle.bin ] || die 'dist/ is missing or incomplete; run npm run build first.'
if [ "$dirty" -eq 0 ]; then
    changes=$(git status --porcelain --untracked-files=all -- src web build data/json)
    if [ -n "$changes" ]; then
        printf '%s\n' "$changes" >&2
        die 'Source files have uncommitted changes; pass --dirty to deploy them.'
    fi
fi

commit=$(git rev-parse --short HEAD)
count=$(find dist -type f ! -name '*.php' ! -name .DS_Store | wc -l | tr -d ' ')
printf 'Deploying commit %s (%s files) to %s\n' "$commit" "$count" "$target"
rsync_options=(-rt --delete --exclude .DS_Store --exclude '*.php')
if [ "$dry_run" -eq 1 ]; then
    rsync_options+=(-n -i)
fi
rsync "${rsync_options[@]}" dist/ "$target/"

if [ "$dry_run" -eq 1 ]; then
    printf 'Dry run complete for commit %s; nothing copied.\n' "$commit"
    exit 0
fi

# Verify the files that make the site run, plus a size check of everything.
mismatches=0
for file in index.html sw.js php-bundle.bin wizardawn.sqlite 7_4_33/php_7_4.wasm; do
    a=$(shasum -a 256 "dist/$file"); b=$(shasum -a 256 "$target/$file" 2>/dev/null || true)
    if [ "${a%% *}" != "${b%% *}" ]; then printf 'SHA-256 mismatch: %s\n' "$file" >&2; mismatches=$((mismatches + 1)); fi
done
if [ -n "$(find "$target" -name '*.php' -print -quit)" ]; then
    printf 'A .php file exists in the target; remove it.\n' >&2; mismatches=$((mismatches + 1))
fi
leftover=$(rsync -rtn --delete --exclude .DS_Store --exclude '*.php' -i dist/ "$target/" | wc -l | tr -d ' ')
[ "$leftover" -eq 0 ] || { printf '%s file(s) still differ after the copy.\n' "$leftover" >&2; mismatches=$((mismatches + 1)); }
[ "$mismatches" -eq 0 ] || die "verification failed ($mismatches problem(s))."
printf 'Deployed commit %s; verified.\n' "$commit"
