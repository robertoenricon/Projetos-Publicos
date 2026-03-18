# Usa a imagem oficial do PHP 7.3 com Apache embutido
FROM php:7.3-apache

# Habilita o mod_rewrite do Apache para as rotas amigáveis
RUN a2enmod rewrite

# Atualiza pacotes e instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip

# Ajusta a configuração do Apache para permitir que o .htaccess funcione
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Define a pasta de trabalho
WORKDIR /var/www/html

# IMPORTANTE: Ajusta as permissões para o PHP conseguir criar e editar o clientes.json
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 padrão do container
EXPOSE 80