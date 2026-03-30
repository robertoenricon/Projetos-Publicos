========================= LARAVEL 12 =======================

1 - Dockerfile
2 - docker-compose.yml

3 - docker-compose up -d --build

4 - docker-compose exec app composer create-project laravel/laravel temp_app
4.1 - docker-compose exec app cp -a temp_app/. .
4.2 - docker-compose exec app rm -rf temp_app

5 - docker-compose run --rm app composer install

6 - docker-compose up --build

7 - docker-compose exec app php artisan key:generate

8 - docker-compose exec app php artisan migrate


*Obs: manipular o container:
- docker exec -it apis_publicas_app bash
Atalho: 
- alias exec="docker exec -it apis_publicas_app bash"