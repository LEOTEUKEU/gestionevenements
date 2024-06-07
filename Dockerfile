# Utiliser l'image de base PHP
FROM php:7.4-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copier le code source de l'application dans le conteneur
COPY . /var/www/html/

# Définir le point d'entrée de l'application
ENTRYPOINT ["apache2-foreground"]