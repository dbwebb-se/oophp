#!/usr/bin/env bash
#
# anax/anax-lite
#

# Get routes defined.
rsync -a vendor/anax/anax-lite/config/router config/

# Fix what htaccess to use
cp htdocs/.htaccess_anax htdocs/.htdocs
#rm -f htdocs/.htaccess_*
