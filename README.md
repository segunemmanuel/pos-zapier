# Setting Up
- Download and install Laragon
- Download and install composer
- Clone the repo into C:/Laragon/www folder
- cd to the newly cloned folder i.e. c:/laragon/www/folder_name
- Open laragon cli and run `composer install` to install all dependencies
- rename .env-example file to .env
- run `php artisan serve`

# Setting up Database
- click "database" and open a new instance
- create new database, let it match the DB_DATABASE variable in .env
- run `php artisan migrate`
- run `php artisan db:seed`
