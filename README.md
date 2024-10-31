# Installation

Run ``composer install``

Run ``cp .env.example .env``

Run ``php artisan key:generate``

Set your database credentials in ``.env`` file

Run ``php artisan migrate --seed``

# Endpoints

|Endpoint|Description|
|--------|-----------|
|/api/products|List of all products (with cursor pagination)|
|/api/products/{id}|Get specific product|
