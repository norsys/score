MKDIR := mkdir -p
RM := rm -rf

.SUFFIXES:

.DELETE_ON_ERROR:

.PRECIOUS: %/.
%/.:
	$(MKDIR) $@

.PHONY: install
install: vendor/autoload.php .git/hooks/pre-commit ## Install all depedencies

.PHONY: vendor/update
vendor/update: composer.lock

.PHONY: unit-tests
unit-tests: install ## Run unit tests
	php tests/units/runner.php -ulr

vendor/autoload.php: bin/composer
	bin/composer install

composer.lock: composer.json
	bin/composer update

bin/composer: bin/. ## Install composer
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	if [ $$(wget -q -O - https://composer.github.io/installer.sig) != $$(php -r "echo hash_file('SHA384', 'composer-setup.php');") ]; then >&2 echo 'ERROR: Invalid installer signature'; exit 1; fi
	php composer-setup.php --quiet
	$(RM) composer-setup.php
	mv ./composer.phar $@

.git/hooks/pre-commit: ./resources/pre-commit | .git ## Install pre-commit hook for git.
	cp $^ $@
	chmod u+x $@

.git:
	git init

clean:
	$(RM) bin

.PHONY: help
help: ## Display this help.
	@printf "$$(cat $(MAKEFILE_LIST) | egrep -h '^[^:]+:[^#]+## .+$$' | sed -e 's/:[^#]*##/:/' -e 's/\(.*\):/\\033[92m\1\\033[0m:/' | sort -d | column -c2 -t -s :)\n"

