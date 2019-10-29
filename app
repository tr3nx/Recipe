#!/bin/bash

if [ "$#" -lt 1 ] ; then
	echo "$0: exactly 1 arguments expected"
	exit 2
fi

if [ "$1" == "up" ] ; then
	docker-compose up -d
fi

if [ "$1" == "down" ] ; then
	docker-compose down
fi

if [ "$1" == "build" ] ; then
	docker-compose rm -vsf
	docker-compose down -v --remove-orphans
	docker-compose build
	docker-compose up -d
fi

if [ "$1" == "sh" ] ; then
	docker-compose exec php sh
fi

# if [ "$1" == "test" ] ; then
# 	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/EmailTest
# fi
