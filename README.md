

     composer create-project laravel/laravel ecommerce


==========git Hub project Run local ============
composer install
npm install
cp .env.example .env
php artisan key:generate

php artisan optimize  
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

php artisan make:migration courses_table
php artisan make:Model CoursesModel
php artisan make:Controller CoursesController



         ========image intervention=========
=======http://image.intervention.io/getting_started/installation=========== ||

$ php composer.phar require intervention/image ||

===========In the $providers array add the service providers for this package.=============== ||
Intervention\Image\ImageServiceProvider::class ||


===========Add the facade of this package to the $aliases array.=========== ||
'Image' => Intervention\Image\Facades\Image::class ||

$ php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent" ||
$ php artisan config:publish intervention/image ||





========https://github.com/laravel/ui============ ||
composer require laravel/ui ||

=====Generate basic scaffolding...=========== ||
php artisan ui bootstrap ||
php artisan ui vue ||
php artisan ui react ||


=========Generate login / registration scaffolding...========= ||
php artisan ui bootstrap --auth ||
php artisan ui vue --auth ||
php artisan ui react --auth ||



==========https://yajrabox.com/docs/laravel-datatables/master/installation============ ||

composer require yajra/laravel-datatables-oracle:"~9.0" ||
composer require yajra/laravel-datatables:^1.5 ||
=======Open the file #config/app.php and then add following service provider.============= ||
'providers' => [
    // ...
    Yajra\DataTables\DataTablesServiceProvider::class,
], ||

php artisan vendor:publish --tag=datatables  ||

