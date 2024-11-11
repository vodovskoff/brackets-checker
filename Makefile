.PHONY: test fix-cs create start trace

test:
	docker exec -it app-brackets-checker php /var/www/html/vendor/bin/phpunit

fix-cs:
	docker exec -it app-brackets-checker vendor/bin/php-cs-fixer fix

create:
	docker compose build
	docker compose up -d --force-recreate
	docker exec -it app-brackets-checker composer install

start:
	docker compose up -d