### Setting up the environment

1.  clone the git
2.  composer update --no-scripts
3.  cp .env.example .env
4.  php artisan key:generate
5.  Create db and change the credential inside the env file[DB name, Username, password]
6.  Before doing the migrate check if the AppServiceProvider is config for the 191 string length add the following line in the top of the AppServiceProvider.php file

      use Illuminate\Support\Facades\Schema;

Then add the following schema inside the **boot** function

      schema::defaultStringLength(191);

This will prevent from database error when migrated as the length will be 1024 and the mysql db gives default length 1000      
7.  php artisan migrate
8.  php artisan migrate:refresh --seed (It will create a new user dummy one in the system automatically, admin, admin@gmail.com, secret plus all the needed seed for the catagory)
