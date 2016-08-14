# Laravel: Population Information Search

Based on Intermediate - Task List With Authentication
[http://laravel.com/docs/quickstart-intermediate](http://laravel.com/docs/quickstart-intermediate)

## Clone the project
```
git clone git@gitlab.websearchpro.net:dharmaraj/population-prototype-laravel.git population
```

## Install Dependencies with composer package manager
```
cd population
composer install
```

## Create .env file and update database configuration
```
cp .env.example .env
nano .env
```

## Generate Application Key to a random string
`php artisan key:generate`

## Migrate tables and seed database tables with test data
```
php artisan migrate
php artisan db:seed
```

## Provide permission to storage and cache directories
`chmod -R 777 storage/ bootstrap/cache/`

## Serve project with artisan command
`php artisan serve `

## Setup Laravel Elixir
```
sudo npm install
bower init
bower install
gulp
gulp --production
gulp watch
```

