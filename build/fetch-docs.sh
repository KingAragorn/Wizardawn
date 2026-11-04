#!/usr/bin/env bash
# Copies the PDF/ZIP documents (rulebooks, modules, sheets) that are not kept in
# git from the original Wizardawn server into src/. Read-only on the server.
# Usage: build/fetch-docs.sh [ssh-host]   (default: root@192.168.1.226 via the Proxmox host)
set -euo pipefail
cd "$(dirname "${BASH_SOURCE[0]}")/.."
src_host=${1:-root@192.168.1.200}
ssh "$src_host" "pct exec 105 -- sh -c 'cd /var/www/html && find files games non -iname \\*.pdf -o -iname \\*.zip | tar -cf - -T -'" | tar -C src -xvf -
