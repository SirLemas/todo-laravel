# Usar a imagem oficial do PHP 8.2 com FPM Alpine
FROM php:8.2-fpm-alpine

# Instalar as dependências necessárias
RUN apk add --no-cache \
    git \
    unzip \
    mariadb-client \
    && docker-php-ext-install pdo_mysql

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o conteúdo do diretório src para o contêiner
COPY ./src /var/www/html

# Ajustar permissões durante a construção
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar as dependências do Laravel
RUN composer install --no-interaction --no-plugins --no-scripts

RUN php artisan key:generate --no-interaction

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000

# Definir o comando de inicialização padrão
CMD ["php-fpm"]
