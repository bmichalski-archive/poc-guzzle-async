This is simple POC to test Guzzle ability to execute multiple asynchronous requests.

In multiple terminals:

```
composer install
```

Term 1:
```
php -S localhost:8080
```

Term 2:
```
php -S localhost:8081
```

Term 3:
```
php main.php
```
