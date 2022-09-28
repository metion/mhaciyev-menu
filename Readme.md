## Installing

1.``` composer require mhaciyev/menu ```

2.add except livewire for csrf in `App\Http\Middleware\VerifyCsrfToken`

```php
protected $except = [
   'livewire*'
];
```

3.```php artisan vendor:publish --tag=init-mhaciyev-menu```

4.```php artisan migrate```

you can access menu from ```/menu``` and ```/menu-group``` url

---
If you need to customize package run command

```php artisan vendor:publish --tag=customize-mhaciyev-menu ```
