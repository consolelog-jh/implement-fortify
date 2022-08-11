# Implement fortify  

- install fortify  
> you see doc of laravel for install  

- check your database in `.env`  
- check mailer in `.env`

- copy / paste code in `database/migrations/create_users`
- copy / paste code in `database/migrations/create_role`
- copy / paste code in `database/factories/RoleFactory`  

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