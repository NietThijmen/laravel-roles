# Laravel roles
This package provides a simple and easy way to manage roles in your laravel package.

## Installation
1. Install the package via composer:
```bash
composer require nietthijmen/laravel-roles
```

2. Run the install command to publish the configuration file:
```bash
php artisan roles:install
```

3. Grab a cup of coffee and wait for the package to be installed.
4. Add the `HasRoles` trait to your User model:
```php
use Nietthijmen\LaravelRoles\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```
5. Alias your middleware (if you want to use this)

```php
// bootstrap/app.php
withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \NietThijmen\LaravelRoles\Http\Middleware\RoleMiddleware::class
        ]);
})
```
6. You're good to go 🎉

## Usage
### Blade directive
```php
@role('admin')
    <p>You are an admin!</p>
@endrole
```

### Middleware
You can use the middleware to protect your routes:
```php
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'You are an admin!';
    });
});
```

### Manual usage
```php
auth()->user()->hasRole('admin'); // returns true if the user has the admin role
```
