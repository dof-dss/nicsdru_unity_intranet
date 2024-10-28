#!/usr/bin/env bash
#
# nicsdru-logging/scripts/example.cronjob.sh
#
# Calls shiplog.sh to ship latest log entries from various logs
# to logz.io.

# /bin/bash /app/nicsdru-logging/scripts/shiplog.sh "[LOG_NAME]" "[LOG_PATH]" "[LOG_DATE_PATTERN]" "[LOG_TYPE]"

# Ship /var/log/access.log generated by nginx.
/bin/bash /app/nicsdru-logging/scripts/shiplog.sh "access" "/var/log/access.log" "$(date +%d/%b/%Y:)" "nginx_access"

# Uncomment following line to ship drupal.log generated by D9 filelog module.
/bin/bash /app/nicsdru-logging/scripts/shiplog.sh "drupal-afbi" "/app/log/afbi/drupal.log" "$(date +'%a, %d/%m/%Y -')" "drupal"
/bin/bash /app/nicsdru-logging/scripts/shiplog.sh "drupal-niaomi" "/app/log/niaomi/drupal.log" "$(date +'%a, %d/%m/%Y -')" "drupal"
/bin/bash /app/nicsdru-logging/scripts/shiplog.sh "drupal-pps" "/app/log/pps/drupal.log" "$(date +'%a, %d/%m/%Y -')" "drupal"

