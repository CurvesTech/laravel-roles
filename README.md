# Laravel Roles Package

A simple package to add roles and permissions support to your Laravel application.

## Features

- Artisan command to install migrations for roles and permissions.
- Migration stubs for `roles`, `permissions`, and pivot tables.

## Installation

1. Require the package via Composer:

   ```
   composer require curvestech/laravel-roles
   ```

2. Register the service provider (if not using auto-discovery):

   ```php
   // config/app.php
   'providers' => [
       Curvestech\LaravelRoles\RolesServiceProvider::class,
   ],
   ```

## Usage

1. Run the install command to publish migrations:

   ```
   php artisan roles:install
   ```

2. Run migrations:

   ```
   php artisan migrate
   ```

## Customization

- Edit the migration stubs in `src/stubs/` if you need to customize the tables.

## License

MIT