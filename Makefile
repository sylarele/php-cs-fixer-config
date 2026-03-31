
SOURCE_DIR = `pwd`
BIN_DIR = ${SOURCE_DIR}/vendor/bin
APP_DIR = ${SOURCE_DIR}/src

define printSection
	@printf "\033[36m\n==================================================\n\033[0m"
	@printf "\033[36m $1 \033[0m"
	@printf "\033[36m\n==================================================\n\033[0m"
endef

.PHONY: all ## Run all checks
all: fix dependencies

#  _   _      _
# | | | |    | |
# | |_| | ___| |_ __
# |  _  |/ _ \ | '_ \
# | | | |  __/ | |_) |
# \_| |_/\___|_| .__/
#              | |
#              |_|

.PHONY: help
help: ## List available commands
	$(call printSection,HELP)
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) \
	| sort \
	| awk 'BEGIN {FS = ":.*?## "}; {printf "${_GREEN}%-20s${_END} %s\n", $$1, $$2}' \
	| sed -e 's/##//'

#  _____            _
# /  __ \          | |
# | /  \/ __ _  ___| |__   ___
# | |    / _` |/ __| '_ \ / _ \
# | \__/\ (_| | (__| | | |  __/
# \____/\__,_|\___|_| |_|\___|

.PHONY: clear-cache
clear-cache: ## Clear caches
	$(call printSection,CLEAR CACHE)
	rm -R ${SOURCE_DIR}/storage/tmp

#  _____             _ _ _
# |  _  |           | (_) |
# | | | |_   _  __ _| |_| |_ _   _
# | | | | | | |/ _` | | | __| | | |
# \ \/' / |_| | (_| | | | |_| |_| |
#  \_/\_\\__,_|\__,_|_|_|\__|\__, |
#                             __/ |
#                            |___/

.PHONY: fix
fix: ## Run the code formatting analysis
	$(call printSection,PHP-CS-FIXER)
	${BIN_DIR}/php-cs-fixer fix --dry-run

.PHONY: fix-process
fix-process: ## Run code formatting
	$(call printSection,PHP-CS-FIXER DRY RUN)
	${BIN_DIR}/php-cs-fixer fix

.PHONY: dependencies
dependencies: ## Check if the dependency are compliant
	$(call printSection,COMPOSER DEPENDENCY)
	${BIN_DIR}/composer-dependency-analyser
