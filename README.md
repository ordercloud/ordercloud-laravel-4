# ordercloud-laravel
Laravel 4 extensions for ordercloud client

## Installation
Add the following to your require block in composer.json config
``` "ordercloud/laravel": "dev-master" ```

## Configuration
To install into a Laravel project, first do the composer install then add the ServiceProvider to your config/app.php service providers list.
```php 
Ordercloud\Laravel\Providers\OrdercloudServiceProvider::class 
```

Publish the config fie
- Version 5: 
```
php artisan config:publish ordercloud/laravel-4
```
