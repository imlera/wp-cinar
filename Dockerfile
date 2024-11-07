# Dockerfile

# Базируемся на официальном образе WordPress
FROM wordpress:latest

# Установка WP-CLI
RUN apt-get update && \
    apt-get install -y less curl && \
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# Копируем кастомный entrypoint и делаем его исполняемым
COPY deployment/docker-entrypoint.sh /usr/local/bin/custom-entrypoint.sh
RUN chmod +x /usr/local/bin/custom-entrypoint.sh

# Используем кастомный entrypoint
ENTRYPOINT ["/usr/local/bin/custom-entrypoint.sh"]

# Установка рабочей директории
WORKDIR /var/www/html