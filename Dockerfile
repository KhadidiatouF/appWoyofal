FROM php:8.2-cli-alpine

# Installer dépendances nécessaires
RUN apk add --no-cache \
    curl \
    zip \
    unzip \
    git \
    postgresql-dev \
    libpq

# Installer les extensions PHP
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l’application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Exposer le port HTTP (8000 par convention)
EXPOSE 80

# Commande de démarrage avec le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
