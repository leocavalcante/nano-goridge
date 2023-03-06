.PHONY: image
image:
	docker-compose build nano-goridge

.PHONY: up
up:
	docker-compose up -d nano-goridge

.PHONY: sh
sh:
	docker-compose exec nano-goridge sh

.PHONY: down
down:
	docker-compose down --remove-orphans
