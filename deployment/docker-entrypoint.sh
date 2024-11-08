#!/bin/bash
set -e

# Запускаем стандартный entrypoint WordPress в фоновом режиме
docker-entrypoint.sh apache2-foreground &

# Ожидаем, пока WordPress будет установлен
until wp core is-installed --allow-root; do
  sleep 5
done

# Устанавливаем права для папки uploads
mkdir -p wp-content/uploads
chown -R www-data:www-data wp-content/uploads
chmod -R 755 wp-content/uploads

# Пример команды активации темы
wp theme activate cinar --allow-root

# Удаление всех тем, кроме cinar
wp theme list --field=name --allow-root | grep -v cinar | xargs -I {} wp theme delete {} --allow-root

# Удаляем неактивные плагины
wp plugin list --field=name --allow-root | xargs -I {} wp plugin delete {} --allow-root

# Устанавливаем плагин Contact
wp plugin install contact-form-7 --activate --allow-root
# Устанавливаем плагин ACF PRO из ZIP-файла
curl -o /tmp/acf.zip -L https://download1073.mediafire.com/tgog93dee8wgtfNfTEx4yi-dOusjrLydTGRa5pBvkysT1kxlNG750vx6ZXBLNyGm7XvykDqYabpFr5Hm1EBUCkrtW8LBVDG4a698ffa20Jr64hrdHKdiEXg0_dx5KYY2GGYhebML4nyjNVP0HJxQRcKMiScxCH7b2kRSA-oDLX6L/nqhnqxc1wzugzam/advanced-custom-fields-pro.6.3.7.zip
if [ -f /tmp/acf.zip ]; then
  wp plugin install /tmp/acf.zip --activate --allow-root
else
  echo "Ошибка: не удалось загрузить ACF"
fi

# Держим процесс Apache активным
wait