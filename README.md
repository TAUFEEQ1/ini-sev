# Example App for Inisev
This is a demo application for ini-sev.

## Run Migrations
```php artisan migrate```

## Install Dependencies
```composer install```

## Deploy For Test
```php artisan serve```

## Run Jobs off queue
```php artisan queue:work```

## Environment Variables
Of note is queue connection is to database.
```QUEUE_CONNECTION=database```