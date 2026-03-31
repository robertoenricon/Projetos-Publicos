========================= LARAVEL =======================

# 1 
- Dockerfile & docker-compose.yml
# 2 
- docker-compose up -d --build
# ENTRAR NO APP DO VITE 
- docker exec -it laravel_vite bash
# 4 - Instalar o Laravel:
- composer create-project laravel/laravel temp_app
- cp -a temp_app/. .
- rm -rf temp_app
# 5 
- rm -rf vendor && composer install
# 6 
- php artisan key:generate (caso de erro de permissao, rodar: chown -R www-data:www-data /var/www)
# 7 
- chmod -R 777 storage && chmod -R 777 bootstrap/cache
# 8
- php artisan storage:link
# 9 (opcional, pois isso já esta no YML)
- rm -rf node_modules && npm install && npm run dev

# Obs: manipular o container:
- docker exec -it apis_publicas_app bash
Atalho: 
- alias exec="docker exec -it apis_publicas_app bash"