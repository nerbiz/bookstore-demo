# Bookstore demo database

A demo database of a fictional bookstore, to practise queries with.

## Installation
Install Composer dependencies:
```
composer install
```

Create the .env file (copy of .env.example) and fill it in as usual. Don't forget to set `FAKER_LOCALE` ('en_GB' format).
```
cp .env.example .env
```

Run migrations and seeders:
```
php artisan migrate:fresh --seed
```
