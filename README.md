# POS System - CodeIgniter 4

A basic Point-of-Sale (POS) website created using CodeIgniter 4.

## Features

- Landing Page
- About Page
- Customer Accounts
- User Accounts
- Static PHP arrays as temporary data sources
- Navigation between all pages

## Routes

- `/` - Home
- `/about` - About
- `/customers` - Customer Accounts
- `/users` - User Accounts

## Requirements

- PHP
- Composer
- CodeIgniter 4

## How to Run

1. download the repository.
2. Open the project folder.
3. Run:

   composer install

4. Create/configure the `.env` file.
5. Set the base URL:

   app.baseURL = 'http://localhost:8080/'

6. Start the development server:

   php spark serve

7. Open:

   http://localhost:8080/

## Data

Customer and user records are stored in static PHP arrays. 