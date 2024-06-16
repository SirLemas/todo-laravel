# todo-laravel
projeto para avaliação da matéria de DevOps com intuito da criação de uma pipeline

# Comandos essenciais

## Acesse o contêiner como root
1. docker-compose exec php sh

## Dentro do contêiner, ajuste as permissões, caso tenha problema de permissão negada
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache