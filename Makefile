env:
	cp .env.example .env
up:
	docker-compose up -d
down:
	docker-compose down
composer:
	composer install --ignore-platform-reqs
sqlite:
	rm -rf database/database.sqlite
	touch database/database.sqlite
migrations:
	docker exec -it controle_series php artisan migrate:fresh --seed
encryption_key:
	docker exec -it controle_series php artisan key:generate
test:
	docker exec -it controle_series php vendor/bin/phpunit
run: up composer env sqlite migrations encryption_key test