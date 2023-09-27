s=edmundo
u=root

.PHONY: init
init: copy-env rm up install db ## recreate containers and install dependencies
.PHONY: copy-env
copy-env: ## copy .env to .env.local
	cp --no-clobber frontend/.env frontend/.env.local
	cp --no-clobber api/.env api/.env.local
rm: ## stop and delete containers, clean volumes.
	docker-compose stop
	docker-compose rm -v -f
	docker-compose build
.PHONY: stop
stop: ## stop environment
	docker-compose stop
.PHONY: up
up: ## spin up environment
	docker-compose up -d
.PHONY: install
install: ## install project dependencies
#	docker-compose run --user=${u} --rm ${s} sh -lc 'composer install'
	docker-compose run --user=${u} --rm ${s} sh -lc 'cd api && composer install'
	docker-compose run --user=${u} --rm ${s} sh -lc 'yarn install'
	docker-compose run --user=${u} --rm ${s} sh -lc 'yarn build:frontend'
db: ## create database, migrations and fixtures
	docker-compose run --user=${u} --rm ${s} sh -lc 'cd api && bin/console doctrine:database:drop --force --if-exists'
	docker-compose run --user=${u} --rm ${s} sh -lc 'cd api && bin/console doctrine:database:create --if-not-exists'
	docker-compose run --user=${u} --rm ${s} sh -lc 'cd api && bin/console doctrine:migration:migrate --no-interaction'
.PHONY: frontend
frontend: ## spin up frontend in port 8000
	docker-compose exec --user=${u} ${s} sh -lc 'yarn start:frontend'
.PHONY: bash
bash: ## Connect to the development container
	docker-compose exec --user=${u} ${s} /bin/bash