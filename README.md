## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Prerequisites](#prerequisites)
* [Setup](#setup)
* [API Documentation](#api-documentation)
* [Artisan Commands](#artisan-commands)
* [Testing](#testing)
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
Your application setup is done!

## API Documentation

This project provides a RESTful API with Sanctum authentication for user registration, login, and logout. Below are the available API routes and their corresponding descriptions:

### Post Routes

1. **List All Posts**
   - **Endpoint:** `GET /api/posts`
   - **Description:** Retrieves a list of all posts.
   - **Authentication:** Required

2. **Get a Specific Post**
   - **Endpoint:** `GET /api/posts/{id}`
   - **Description:** Retrieves details of a specific post by its ID.
   - **Authentication:** Required

3. **Create a New Post**
   - **Endpoint:** `POST /api/posts`
   - **Description:** Creates a new post.
   - **Authentication:** Required
   - **Validation:**
     ```json
     {
         "title": "required|string|min:3",
         "content": "required|string|max:6000"
     }
     ```

4. **Update an Existing Post**
   - **Endpoint:** `PATCH /api/posts/{id}`
   - **Description:** Updates an existing post by its ID.
   - **Authentication:** Required
   - **Validation:**
     ```json
     {
         "title": "required|string|min:3",
         "content": "required|string|max:6000"
     }
     ```

5. **Delete a Post**
   - **Endpoint:** `DELETE /api/posts/{id}`
   - **Description:** Deletes a post by its ID.
   - **Authentication:** Required

### User Routes

6. **Get a Specific User**
   - **Endpoint:** `GET /api/users/{id}`
   - **Description:** Retrieves details of a specific user by their ID.
   - **Authentication:** Required

7. **Register a New User**
   - **Endpoint:** `POST /api/register`
   - **Description:** Registers a new user.
   - **Validation:**
     ```json
     {
         "name": "required|string|max:255",
         "email": "required|string|email|max:255|unique:users",
         "password": "required|string|min:8|confirmed"
     }
     ```

8. **Login a User**
   - **Endpoint:** `POST /api/login`
   - **Description:** Authenticates a user and returns a token.
   - **Validation:**
     ```json
     {
         "email": "required|string|email|max:255|exists:users",
         "password": "required|string|min:8"
     }
     ```

9. **Logout a User**
   - **Endpoint:** `POST /api/logout`
   - **Description:** Logs out the authenticated user.
   - **Authentication:** Required

### Authentication & Authorization

- **Sanctum Authentication:** The API uses Laravel Sanctum for authentication. Routes under the `/api/posts` and `/api/users` endpoints are protected and require the user to be authenticated.
- **Authorization:** Post-related actions (CRUD) are managed by post policies that enforce various levels of user authorization.

### Artisan Commands

- **Queue Welcome Email:**
```
php artisan mail:welcome {user_id}
```

### Testing

- A few test cases are included in the project to validate the core functionalities.
```
./vendor/bin/pest 
```
