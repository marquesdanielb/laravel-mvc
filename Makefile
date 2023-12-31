run-app-with-setup:
	cp ./src/.env.example ./src/.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate"

run-app-with-setup-db:
	cp ./src/.env.example ./src/.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan migrate:fresh --seed"

restart-app:
	docker compose down && docker compose up -d

run-app:
	docker compose up -d

kill-app:
	docker compose down

nginx-console:
	docker exec -it nginx /bin/sh

php-console:
	docker exec -it php /bin/sh

mysql-console:
	docker exec -it mysql /bin/sh

flush-db:
	docker exec php /bin/sh -c "php artisan migrate:fresh"

flush-db-with-seeding:
	docker exec php /bin/sh -c "php artisan migrate:fresh --seed"