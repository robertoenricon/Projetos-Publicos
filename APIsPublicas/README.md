# ========================= LARAVEL =======================

# 1 
- Dockerfile & docker-compose.yml
# 2 
- docker-compose up -d --build (derrubar: docker-compose down)
# ENTRAR NO APP DO VITE 
- docker exec -it laravel_vite bash
# 4 - Instalar o Laravel:
- composer create-project laravel/laravel temp_app
- cp -a temp_app/. .
- rm -rf temp_app
# 5 
- cp .env.example .env
# 6 
- rm -rf vendor && composer install
# 7 
- php artisan key:generate (caso de erro de permissao, rodar: chown -R www-data:www-data /var/www)
# 8 
- chmod -R 777 storage && chmod -R 777 bootstrap/cache
# 9
- php artisan storage:link
# 10 (opcional, pois isso já esta no YML)
- rm -rf node_modules && npm install && npm run dev

# Obs: manipular o container:
- docker exec -it laravel_app bash ou docker-compose exec app bash
Atalho: 
- alias exec="docker exec -it laravel_app bash"


# ========================= PREPARAR PARA PRODUÇÃO ======================

# 1 (.env)
- APP_URL=http://apispublicas.robertoenrico.com.br/
- APP_ENV=prod
- APP_DEBUG=false

# 2
- docker exec -it laravel_app bash

# 3
# --no-dev (remove pacotes de desenvolvimento)
# --optimize-autoloader (melhora a performance)
composer install --optimize-autoloader --no-dev

# 4
- php artisan key:generate

# 5 (vite)
- docker-compose exec vite bash
- npm install
- npm run build

# 6 (voltar para o APP) (Otimizar Laravel para produção)
- docker-compose exec app bash
- php artisan view:clear
- php artisan config:clear
- php artisan cache:clear
- php artisan route:clear

# ========================= FTP ================================

# 1 - 

# 2 - 
├── apispublicas_laravel/          <- todo o Laravel (fora da web)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/ (compacta em arquivo .zip e dps descompacta direto no ftp)
│   └── .env
│   └── composer.json
│   └── composer.lock
│   └── artisan
└── public_html/              <- apenas o que o usuário vê
│   ├── index.php
│   ├── .htaccess
│   ├── favicon.ico
│   ├── robots.txt
│   ├── build
|   ├── manifest
│       ├── assets/
│           ├── app-DZ4nVVRQ.js
│           ├── app-DZ4nVVRQ.css