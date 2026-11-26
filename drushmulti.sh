#!/usr/bin/env bash

# Run a Drush command across all Unity sites, for example ./drushmulti.sh cr.
set -euo pipefail

if [ "$#" -eq 0 ]; then
  echo "Supply a Drush command, e.g. './drushmulti.sh cr'"
  exit 1
fi

cd "$(dirname "$0")"

# Use DDEV on the host and the installed Drush inside application containers.
if [ -n "${PLATFORM_ENVIRONMENT:-}" ] || [ -n "${IS_DDEV_PROJECT:-}" ]; then
  command_prefix=(vendor/bin/drush)
else
  command_prefix=(ddev drush)
fi

for site_directory in project/sites/*/; do
  site=$(basename "$site_directory")
  [ "$site" = default ] && continue
  echo "** $site **"
  "${command_prefix[@]}" --uri="$site" "$@"
done
