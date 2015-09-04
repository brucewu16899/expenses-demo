## Expenses

Demo of using Laravel Collective form binding along with related models

Install with:

```
composer install
cp .env.example .env
php artisan key:generate
touch storage/database.sqlite
php artisan migrate
```

Optionally you can use the following to boot up a development webserver:
```
php artisan serve
```

Now hit http://localhost:8000 (or a different port if you're using something other
than the php development webserver and you should be on your way.

WARNING: use this code with extreme caution. 
It is meant as a demo as a reaction to a question on the Laracasts.com forum and has 
absolutely NO validation or security concerns in place, so you are warned. I take no
responsibility for what you do with this code.