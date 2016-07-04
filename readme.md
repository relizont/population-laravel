# Laravel: Population Information Search
Based on Intermediate - Task List With Authentication

[http://laravel.com/docs/quickstart-intermediate](http://laravel.com/docs/quickstart-intermediate)

## Generate migration commands
```
  php artisan make:migration:schema create_types_table --schema="name:string"
  php artisan make:migration:schema create_gender_table --schema="name:string"
  php artisan make:migration:schema create_countries_table --schema="name:string"
  php artisan make:migration:schema create_cities_table --schema="country_id:integer,name:string"
  php artisan make:migration:schema create_population_table --schema="country_id:integer,city_id:integer,type_id:integer,male:integer,female:integer"
```

# Running Migrations
`php artisan migrate`

# Rolling Back Migrations
```
php artisan migrate:rollback
php artisan migrate:reset
```

# Generate controller
```
  php artisan make:controller CityController --resource
  php artisan make:controller CountryController --resource
  php artisan make:controller PopulationController --resource
```

# Register routes
```
  Route::resource('types', 'TypesController');
  Route::resource('city', 'CityController');
  Route::resource('country', 'CountryController');
  Route::resource('population', 'PopulationController');
```

# Writing Seeders
```
php artisan make:seeder GenderTableSeeder
php artisan make:seeder TypesTableSeeder
```

# Running Seeders
```
php artisan db:seed
php artisan db:seed --class=GenderTableSeeder
php artisan db:seed --class=TypesTableSeeder
```

# Rollback / Migrate In Single Command
```
php artisan migrate:refresh
php artisan migrate:refresh --seed
```
