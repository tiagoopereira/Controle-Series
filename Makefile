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
	docker exec -it php php artisan migrate:fresh --seed
encryption_key:
	docker exec -it php php artisan key:generate
run: up composer env sqlite migrations encryption_key