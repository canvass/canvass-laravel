# Canvass Laravel
A Laravel package to build forms and validate form submissions.

## Installation
You can install this package with composer:
```bash
composer require canvass/canvass-laravel
```
The package should automatically register itself.

### Migrations
You can publish the database migrations using the following command:
```bash
php artisan vendor:publish --provider="CanvassLaravel\CanvassServiceProvider" --tag="migrations"
```

After the migration has been published you can create the form and field tables by running the migrations:
```bash
php artisan migrate
```

### Config
You can publish the config file with:
```bash
php artisan vendor:publish --provider="CanvassLaravel\CanvassServiceProvider" --tag="config"
```

## Next Steps
Go to `/form` to see the Canvass interface to create forms and form fields.

## Documentation
You can find more information at the [Canvass Core project](https://github.com/canvass/canvass-core).

## Extending Canvass
You can add new Field types to extend Canvass.

### Adding a new Field
- Add a folder that will have FieldData, FieldType and Validate files
- Add the parent path to Forge:
```php
\Canvass\Forge::addFieldPath('/the/file/path', '\The\Namespace\Path');
```
- Add a view file for the type in:
 ```
 laravel-dir/resources/views/vendor/canvass/form_field/partials/types
```
