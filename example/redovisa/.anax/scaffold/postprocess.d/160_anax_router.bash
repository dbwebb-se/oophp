#!/usr/bin/env bash
#
# anax/router
# 

# Include functions.bash
source .anax/scaffold/functions.bash

# Copy default config for router
rsync -a vendor/anax/router/config/ config/
#rsync -a vendor/anax/router/route/ route/

# Use SampleController as test/controller.
sedi 's/\\Route\\MockHandlerControllerCatchAll/\\Controller\\SampleController/' config/router/800_test.php
