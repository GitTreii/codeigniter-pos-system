# POS System - CodeIgniter 4

A basic Point-of-Sale (POS) website created using CodeIgniter 4 and MySQL.

## Features

- Landing Page
- About Page
- Customer Accounts
- User Accounts
- Add new customer records
- Add new user records
- Edit and update customer records
- Edit and update user records
- Form validation
- Preserved form values after validation errors
- Unique username validation
- User avatar upload
- JPG/JPEG/PNG validation
- Maximum 2MB avatar file size
- Display-ready 200x200 avatar thumbnails
- Placeholder avatar for users without an uploaded image
- MySQL database using CodeIgniter Models and Query Builder

## Routes

- `/` - Home
- `/about` - About
- `/customers` - Customer Accounts
- `/customers/new` - New Customer
- `/customers/edit/{id}` - Edit Customer
- `/users` - User Accounts
- `/users/new` - New User
- `/users/edit/{id}` - Edit User

## Requirements

- PHP
- Composer
- CodeIgniter 4
- MySQL / MariaDB
- XAMPP

## Database

Database name:

`pos_system`

Tables:

- `customers`
- `users`

The `users` table includes an `avatar` column for storing the uploaded image filename.

The database export is included in the project as:

`pos_system.sql`

## How to Run

1. Download the repository.

2. Open the project folder.

3. Install dependencies:

   `composer install`

4. Start Apache and MySQL in XAMPP.

5. Open phpMyAdmin:

   `http://localhost/phpmyadmin`

6. Create a database named:

   `pos_system`

7. Import the included:

   `pos_system.sql`

8. Configure the `.env` file with your local database settings:

   `database.default.hostname = localhost`

   `database.default.database = pos_system`

   `database.default.username = root`

   `database.default.password =`

   `database.default.DBDriver = MySQLi`

   `database.default.port = 3306`

9. Set the base URL:

   `app.baseURL = 'http://localhost:8080/'`

10. Start CodeIgniter:

   `php spark serve`

11. Open:

   `http://localhost:8080/`

## Avatar Upload

User profile pictures must be JPG, JPEG, or PNG files no larger than 2MB.

Uploaded images are prepared as 200x200 thumbnails and stored in:

`public/uploads/`

Only the generated filename is stored in the database.

Users without an uploaded avatar use:

`public/placeholder.png`

## Data

Customer and user records are stored in MySQL and retrieved through CodeIgniter Models using Query Builder.
