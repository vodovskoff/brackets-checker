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

enable-xdebug:
	@docker-compose exec app-brackets-checker sed -i 's/xdebug.mode=off/xdebug.mode=debug/' /usr/local/etc/php/conf.d/xdebug.ini
	@docker-compose restart app-brackets-checker

disable-xdebug:
	@docker-compose exec app-brackets-checker sed -i 's/xdebug.mode=debug/xdebug.mode=off/' /usr/local/etc/php/conf.d/xdebug.ini
	@docker-compose restart app-brackets-checker