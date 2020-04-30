#
# A makefile
#

# ------------------------------------------------------------------------
#
# General stuff, reusable for all Makefiles.
#

# Detect OS
OS = $(shell uname -s)

# Defaults
ECHO = echo

# Make adjustments based on OS
ifneq (, $(findstring CYGWIN, $(OS)))
	OS_CYGWIN = "true"
	ECHO = /bin/echo -e
else ifneq (, $(findstring Linux, $(OS)))
	OS_LINUX = "true"
else ifneq (, $(findstring Darwin, $(OS)))
	OS_MAC = "true"
endif

# Colors and helptext
NO_COLOR	= \033[0m
ACTION		= \033[32;01m
OK_COLOR	= \033[32;01m
ERROR_COLOR	= \033[31;01m
WARN_COLOR	= \033[33;01m

# Print out colored action message
ACTION_MESSAGE = $(ECHO) "$(ACTION)---> $(1)$(NO_COLOR)"

# Which makefile am I in?
WHERE-AM-I = "$(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))"
THIS_MAKEFILE := $(call WHERE-AM-I)

# Echo some nice helptext based on the target comment
HELPTEXT = $(call ACTION_MESSAGE, $(shell egrep "^\# target: $(1) " $(THIS_MAKEFILE) | sed "s/\# target: $(1)[ ]*-[ ]* / /g"))

# Check version  and path to command and display on one line
CHECK_VERSION = printf "%-10s %-20s %s\n" "`basename $(1)`" "`which $(1)`" "`$(1) --version $(2)`"

# Get current working directory, it may not exist as environment variable.
PWD = $(shell pwd)

# target: help                    - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
	@sed '/^$$/q' $(THIS_MAKEFILE) | tail +3 | sed 's/#\s*//g'
	@$(ECHO) "Usage:"
	@$(ECHO) " make [target] ..."
	@$(ECHO) "target:"
	@egrep "^# target:" $(THIS_MAKEFILE) | sed 's/# target: / /g'



# ---------------------------------------------------------------
#
# Specific setup for this project
#

# target: clean              - Removes generated files and directories.
.PHONY: clean
clean:
	@$(call HELPTEXT,$@)
	rm -rf build



# target: clean-all          - Removes generated files and directories.
.PHONY:  clean-all
clean-all: clean
	@$(call HELPTEXT,$@)
	rm -rf vendor composer.lock



# target: check              - Check version of installed tools.
.PHONY:  check
check:
	@$(call HELPTEXT,$@)
	php --version && $(ECHO)
	phpunit --version
	composer show


# target: test               - Run all tests.
.PHONY:  test
test: phpunit
	@$(call HELPTEXT,$@)
	composer validate



# target: install            - Install all tools
.PHONY:  install
install:
	@$(call HELPTEXT,$@)
	composer install



# target: phpunit            - Run unit tests for PHP.
.PHONY: phpunit
phpunit:
	@$(call HELPTEXT,$@)
	#[ ! -d "test" ] || vendor/bin/phpunit --configuration .phpunit.xml
	[ ! -d "test" ] || phpunit --configuration .phpunit.xml
