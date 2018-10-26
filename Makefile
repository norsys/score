MKDIR := mkdir -p
RM := rm -rf

.SILENT:

.SUFFIXES:

.DELETE_ON_ERROR:

.PRECIOUS: %/.
%/.:
	$(MKDIR) $@

.PHONY: install
install: vendor/autoload.php git/setup ## Install all depedencies

.PHONY: vendor/update
vendor/update: composer.lock

.PHONY: unit-tests
unit-tests: install ## Run unit tests
	php tests/units/runner.php -ulr

.PHONY: unit-tests/loop
unit-tests/loop: install ## Run unit tests in an infinite loop
	php tests/units/runner.php -ulr --loop

.PHONY: tests
tests: unit-tests

.PHONY: git/setup
git/setup: .git/hooks/pre-commit ## Install pre-commit hook for git.

.PHONY: export
export: | .git ## Generate a `./score.zip` archive from local git repository
	git archive -o score.zip HEAD

vendor/autoload.php: composer.lock | bin/composer
	bin/composer install

composer.lock: composer.json
	bin/composer update

bin/composer: bin/. ## Install composer
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	if [ $$(wget -q -O - https://composer.github.io/installer.sig) != $$(php -r "echo hash_file('SHA384', 'composer-setup.php');") ]; then >&2 echo 'ERROR: Invalid installer signature'; exit 1; fi
	php composer-setup.php --quiet
	$(RM) composer-setup.php
	mv ./composer.phar $@

.git/hooks/pre-commit: ./resources/pre-commit | .git
	cp $^ $@
	chmod u+x $@

.git:
	git init

.PHONY: clean
clean: ## Remove empty directories and untracked files, use it CAREFULY!
	find src tests/units/src -type d -empty -delete
	git clean -f

.PHONY: help
help: ## Display this help.
	@printf "$$(cat $(MAKEFILE_LIST) | egrep -h '^[^:]+:[^#]+## .+$$' | sed -e 's/:[^#]*##/:/' -e 's/\(.*\):/\\033[92m\1\\033[0m:/' | sort -d | column -c2 -t -s :)\n"
