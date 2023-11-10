# Todo Api
A simple API project for managing tasks that has simple data

## Breakpoints
First, before each breakpoint, use the Prefix 'api /v1'
### Authentication

- POST: `/register` User registration process
- POST: `/login` User authentication process

### Tasks

- GET: `/tasks` Get all tasks
- GET `/tasks/{id}` Receive a special task
- GET `/tasks/user` Receive user tasks
- POST `/tasks` Add a task
- PUT `/tasks/{id}/toggle` The operation of doing or not doing the task
- DELETE `/tasks/{id}` Task deletion process

## Installation
Necessary dependencies to implement this project:
* PHP 8
* Composer

We get the repository from the repository with the following command
```shell
git clone https://github.com/MrjaaDev/todo-api.git
```
Enter the root directory of the project and then enter the following command
```shell
composer install
```
After configuring the database, migrate the tables using the command below
```shell
php artisan migrate

# OR

php artisan migrate --seed
```
Run the project using the following command
```shell
php artisan serve
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
