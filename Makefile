init: docker-down docker-pull docker-build docker-up app-composer-install echo-open-browser
up: docker-up
down: docker-down
restart: down up echo-open-browser
rebuild: down docker-build-no-pull docker-up echo-open-browser

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-pull:
	docker-compose pull

docker-build-no-pull:
	docker-compose build

docker-build:
	docker-compose build --pull

app-php-cli-bash:
	docker-compose run --rm php-cli bash

app-composer-install:
	sudo docker-compose run --rm php-cli composer install

echo-open-browser:
	xdg-open http://localhost:8077/
