FROM wordpress:latest

RUN apt-get update && \
    apt-get install -y curl less && \
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

COPY cinar /var/www/html/wp-content/themes/cinar

RUN chown -R www-data:www-data /var/www/html/wp-content/themes/cinar

RUN wp plugin install contact-form-7 --activate --allow-root && \
    wp plugin install advanced-custom-fields --activate --allow-root

EXPOSE 80