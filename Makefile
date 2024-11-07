DEPLOYMENT_DIR=./deployment

start:
	cd $(DEPLOYMENT_DIR) && docker compose up -d --build

stop:
	cd $(DEPLOYMENT_DIR) && docker compose down

rebuild:
	cd $(DEPLOYMENT_DIR) && docker compose up -d --build --force-recreate

logs:
	cd $(DEPLOYMENT_DIR) && docker compose logs -f

clear:
	cd $(DEPLOYMENT_DIR) && docker compose down -v --remove-orphans
	cd $(DEPLOYMENT_DIR) && docker compose rm -vsf

include deployment/.env
export $(shell sed 's/=.*//' deployment/.env)
dump:
	docker exec -i $(DB_CONTAINER_NAME) mysqldump --no-tablespaces -u $(WORDPRESS_DB_USER) -p$(WORDPRESS_DB_PASSWORD) $(WORDPRESS_DB_NAME) > $(DEPLOYMENT_DIR)/docker-entrypoint-initdb.d/wordpress-dump.sql