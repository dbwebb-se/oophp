#!/usr/bin/env bash
#
# anax/anax-oophp-me
#

# Include functions.bash
source .anax/scaffold/functions.bash

# Get items from config/.
rsync -a vendor/anax/anax-oophp-me/config ./

# Get items from content/.
rsync -a vendor/anax/anax-oophp-me/content ./

# Remove items from content/.
rm -f content/about.md

# Get items from htdocs/.
rsync -a vendor/anax/anax-oophp-me/htdocs ./

# Copy the source for Controllers.
rsync -a vendor/anax/controller/src/Controller/{Development,ErrorHandler,FlatFileContent,Sample}Controller.php ./src/Controller/

# Copy the source for Page.
rsync -a vendor/anax/page/src/Page/Page.php ./src/Page/

# Get items from router/.
rsync -a vendor/anax/anax-oophp-me/router ./

# Get own copy of view files.
rsync -a vendor/anax/view/view/anax/v2 ./view/anax/

# Change baseTitle
sedi "s/ | Anax/ | oophp/g" config/page.php

# Remove htdocs/cimage/index.html to ease debugging
rm -f htdocs/cimage/index.html

# Fix what htaccess to use
cp htdocs/.htaccess_wwwstudent htdocs/.htdocs
#rm -f htdocs/.htaccess_*
