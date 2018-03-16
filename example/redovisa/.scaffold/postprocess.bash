#!/usr/bin/env bash
#
# Postprocess scaffold
#
#
# Compatible sed -i.
# https://stackoverflow.com/a/4247319/341137
# arg1: Expression.
# arg2: Filename.
#
sedi()
{
    sed -i.bak "$1" "$2"
    rm -f "$2.bak"
}

# Install using composer
composer update

# Get and set config for di
install -d config
rsync -a vendor/anax/di/config/di_anax-site-develop.php config/di.php

# Get and set config for error reporting
rsync -a vendor/anax/common/config/error_reporting.php config
rsync -a vendor/anax/common/extra/Makefile .
rsync -a vendor/anax/common/extra/htdocs .
rsync -a vendor/anax/common/{.gitignore,.php*.xml} .

# Copy default config for router
rsync -a vendor/anax/router/config/route2/ config/route/
rsync -a vendor/anax/router/config/route2.php config/route.php
sedi "s/route2/route/g" config/route.php

# Copy sample content/ from page module
rsync -a vendor/anax/page/content .

# Copy default config for session
rsync -a vendor/anax/session/config/session.php config

# Copy default config for url
rsync -a vendor/anax/url/config/url_clean.php config/url.php

# Copy default config for view
rsync -a vendor/anax/view/config/view.php config

# Setup cimage
make cimage-update

# Make a default dir for src
install -d src

# Make a default dir for view
install -d view

# Add default files to make it look oophp-me
make cimage-config-create
rsync -a .scaffold/default/ ./
