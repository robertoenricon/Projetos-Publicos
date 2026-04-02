# 📘 Guia Laravel com Docker

Este README documenta os passos para configurar, rodar e preparar um projeto Laravel utilizando Docker e Vite, além de instruções para produção e deploy via FTP.

# 🐳 Ambiente de Desenvolvimento

**1. Arquivos iniciais**
- Dockerfile & docker-compose.yml

**2. Subir containers**
- docker-compose up -d --build

**4. Entrar no container do Vite**
- docker exec -it laravel_vite bash ou docker-compose exec vite bash
Obs: Atalho sugerido -> alias vite="docker exec -it laravel_vite bash"

**5. Instalar Laravel**
- composer create-project laravel/laravel temp_app
- cp -a temp_app/..
- rm -rf temp_app

# ⚙️ Configuração inicial
- cp .env.example .env
- rm -rf vendor && composer install
- php artisan key:generate
- chmod -R 777 storage
- chmod -R 777 bootstrap/cache
- php artisan storage:link
- **Frontend (opcional, já configurado no YML)**
- rm -rf node_modules
- npm install
- npm run dev

## 🚀 Preparar para Produção

- **1. Configuração .env**
- APP_URL=http://apispublicas.robertoenrico.com.br/
- APP_ENV=prod
- APP_DEBUG=false
- **2. Acessar container**
- docker exec -it laravel_app bash
**3. Instalar dependências otimizadas**
- composer install --optimize-autoloader --no-dev
**4. Gerar chave**
- php artisan key:generate
**5. Build do Vite**
- docker-compose exec vite bash
- npm install
- npm run build
**6. Otimizar Laravel**
- docker-compose exec app bash
- php artisan view:clear
- php artisan config:clear
- php artisan cache:clear
- php artisan route:clear


## 📂 Estrutura para FTP
```
apispublicas_laravel/        # Todo o Laravel (fora da web)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/              # Compactar em .zip e descompactar no FTP
│   ├── .env
│   ├── composer.json
│   ├── composer.lock
│   └── artisan

public_html/                 # Apenas o que o usuário acessa
│   ├── index.php
│   ├── .htaccess
│   ├── favicon.ico
│   ├── robots.txt
│   ├── build/
│   ├── manifest
│   ├── assets/
│   ├── app-DZ4nVVRQ.js
│   └── app-DZ4nVVRQ.css
```

## ✅ Observações
- Sempre verificar permissões de pasta (storage e bootstrap/cache).
- Em produção, não usar pacotes de desenvolvimento.
- O public_html deve conter apenas os arquivos acessíveis pelo usuário final.
