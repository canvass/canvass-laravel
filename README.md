# canvass-laravel
A Laravel package wrapped around Canvass Core

## Installation

### Composer
```bash
composer require canvass/canvass-laravel
```

### Migrations
```bash
php artisan vendor:publish --provider="CanvassLaravel\CanvassServiceProvider" --tag="migrations"
```

### Config
Copy over config values to overwrite defaults.


## Extending Canvass
You can add new Fields to extend Canvass.

### Adding a new Field
- Add a folder that will have FieldData, FieldType and Validation files
- Add the parent path to Forge:
```php
\Canvass\Forge::addFieldPath('/the/file/path', '\The\Namespace\Path');
```
- Add a view file for the type in:
 ```
 views/vendor/canvass/form_field/partials/types
```
