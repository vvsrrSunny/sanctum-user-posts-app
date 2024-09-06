## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Prerequisites](#prerequisites)
* [Setup](#setup)
* [Commands](#commands)
* [APIs](#apis)

## General info
This project offers Sanctum authentication for user registration, login, and logout. It applies various levels of authorization on users' CRUD operations for posts through post policies. Upon successful registration, a welcome email is dispatched to the user. Additionally, the app includes a custom Artisan command to queue the welcome email. A few test cases are also provided to ensure the functionality of the application.  
	
## Technologies
Project is created with:
* laravel: 11.9
* php: 8.2
* Mysql: 8.4

## Prerequisites
* Laravel : 11X
* php: 8.2 or above
* Composer
* MySQL or MariaDB
* Apache Http server  

## Setup
To run this project:

* Pull this git project from master branch, or if you already have this project the use it.
* create a database name in MySQL or MariaDB or any SQL server.
* In the root folder of the project, create the .env file or edit if exists. Provide database name, user name, and password of the database in the .env file. Make sure database connection is established
* Create a database in mysql using this command `CREATE DATABASE sanctum-user-posts-app`.
* For the emails to work, update the mailer information `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`,... In the .env file(I have used mailtrap.io as my mailer)
* Get the backend dependencies by running the following command in the project folder
```
composer install
```
* Run the below command to migrate the tables in to the database
```
php artisan migrate
```
*  Now migrate the CSV file to database by the below command 
```
php artisan db:seed
```
* try this for seeding if the above command could not run
```
php artisan migrate:fresh --seed
```
* Run the following command in the background to run the queues
```
php artisan queue:work
```
* Run the backend server
```
php artisan serve
```
Your application is ready to use!

## Commands
* There are main commands we believe could be used more 
* Custom command to send the email to the user 
```
php artisan mail:welcome {user_id}
```
* Command to run the test all the test cases
```
./vendor/bin/pest 
```
## APIs
