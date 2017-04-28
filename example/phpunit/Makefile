#
# A makefile
#

# ---------------------------------------------------------------
#
# Generic setup for compatible makefile with help enabled
#
# Detect OS
OS = $(shell uname -s)

# Defaults
ECHO = echo

# Make adjustments based on OS
# http://stackoverflow.com/questions/3466166/how-to-check-if-running-in-cygwin-mac-or-linux/27776822#27776822
ifneq (, $(findstring CYGWIN, $(OS)))
	ECHO = /bin/echo -e
endif

# Colors and helptext
NO_COLOR	= \033[0m
ACTION		= \033[32;01m
OK_COLOR	= \033[32;01m
ERROR_COLOR	= \033[31;01m
WARN_COLOR	= \033[33;01m

# Which makefile am I in?
WHERE-AM-I = $(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))
THIS_MAKEFILE := $(call WHERE-AM-I)

# Echo some nice helptext based on the target comment
HELPTEXT = $(ECHO) "$(ACTION)--->" `egrep "^\# target: $(1) " $(THIS_MAKEFILE) | sed "s/\# target: $(1)[ ]*-[ ]* / /g"` "$(NO_COLOR)"

# Add local bin path for test tools
#PATH := "./.bin:./vendor/bin:./node_modules/.bin:$(PATH)"
#SHELL := env PATH=$(PATH) $(SHELL)
PHPUNIT := .bin/phpunit
PHPLOC 	:= .bin/phploc
PHPCS   := .bin/phpcs
PHPCBF  := .bin/phpcbf
PHPMD   := .bin/phpmd
PHPDOC  := .bin/phpdoc
BEHAT   := .bin/behat



# target: help               - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
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


# target: test               - Run all tests.
.PHONY:  test
test: phpunit
	@$(call HELPTEXT,$@)
	composer validate



# target: install            - Install all tools
.PHONY:  install
install:
	@$(call HELPTEXT,$@)
	composer dump-autoload



# target: phpunit            - Run unit tests for PHP.
.PHONY: phpunit
phpunit:
	@$(call HELPTEXT,$@)
	[ ! -d "test" ] || phpunit --configuration .phpunit.xml
