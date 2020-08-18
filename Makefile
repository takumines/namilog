#-----------------------------------------------------------
# PHP Code Sniffer
#-----------------------------------------------------------

# PHP Code Sniffer
sniffer:
	docker-compose exec php ./vendor/bin/phpcs --standard=phpcs.xml ./

# PHP Code Sniffer Rewrite
sniffer-rewrite:
	docker-compose exec php ./vendor/bin/phpcbf --standard=phpcs.xml ./