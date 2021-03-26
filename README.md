# starwars-backend
Simple backend to search for starwars movie characters written in PHP and Symfony

> composer install

Configure .ENV for mysql database access

Setup the database (create tables):

> ./bin/console doctrine:schema:update --dump-sql

Start the server:

> symfony server:start
