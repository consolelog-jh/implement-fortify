# Implement fortify  

- install fortify  
> you see doc of laravel for install  

- install package for install maker-service  
> you see [doc for install](https://github.com/ludoguenet/laravel-service-maker)  
> and execute this  
```shell
$ php artisan vendor:publish --tag="service-maker-config"
```  
> for create file service  
```shell
$ php artisan make:service {name} {--N|noContract}
```

- check your database in `.env`  
- check mailer in `.env`  

- create file  
```shell
$ php artisan make:model Role -mf
$ php artisan make:service UserRegister
$ php artisan make:service UserDelete
$ php artisan make:service RoleCollect
$ php artisan make:service UserFill
$ php artisan make:service UserUpdateRole
$ php artisan make:request UserRegisterRequest
$ php artisan make:request UserUpdateRequest
```  

- copy / paste code in `database/migrations/create_users`
- copy / paste code in `database/migrations/create_role`
- copy / paste code in `database/factories/RoleFactory`  
- copy / paste code in `app/Providers/FortifyServiceProvider.php`  
- copy / paste code in `app/Models/Role.php`  
- copy / paste code in `app/Models/User.php`  
- copy / paste code in `app/Http/Requests/UserRegisterRequest.php`  
- copy / paste code in `app/Http/Requests/UserUpdateRequest.php`  
- copy / paste all code of all folders and files in `app/Services`  
- copy / paste code in `app/Actions/Fortify/CreateNewUser.php`  
- copy / paste code in `app/Actions/Fortify/UpdateUserProfileInformation.php`  

- update variable `HOME` in `app/Providers/RouteServiceProvider.php`  

- copy / paste code in `config/fortify`   
- add this in `config/app.php`  
```php
'provider' => [
    /*
    * Package Service Providers...
    */
    App\Providers\FortifyServiceProvider::class,
]
```

- execute this for create table in database  
```shell
# migrate in database
$ php artisan migrate
# or update migrate  
$ php artisan migrate:refresh
# or delete and create
$ php artisan migrate:fresh
```  

- execute this for create role of 'root' for your first user  
and create role 'auth' for other users   
```shell
$ php artisan tinker
>>> Role::factory()->count(1)->create();
>>> Role::factory()->create(['libelle' => 'auth']);
>>> exit
# check your database for see is good
```  

> for files of views  
> check a repo github `components-lau`  
> and copy folder `resources/views/auth`  
> and compose your design