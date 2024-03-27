FROM php:7.4-apache

# Instalação dos módulos PHP necessários
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Habilita o mod_rewrite
RUN a2enmod rewrite

# Copia o código-fonte do sistema mercado para o diretório do servidor web Apache
COPY ./ /var/www/html