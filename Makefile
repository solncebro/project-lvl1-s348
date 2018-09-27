install:
	composer install

make:
	composer run-script phpcs -- --standard=PSR2 src bin