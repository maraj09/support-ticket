# Ticket Management System

This project allows you to create and manage tickets.

## Features
- Create new ticket as customer.
- Admin can reply as well as customer also.
- Admin can close the ticket.
- Mail will be send in all iteration.

## Prerequisites
- PHP 7.4 or higher
- MySQL database
- Composer for dependency management
- Bootstrap for basic styling

## Installation

### 1. Installation Commands

composer install 

npm install

php artisan key:generate

### 2. Database Credentials Setup

create the .env file 

*Must Set Database Connections, QUEUE_CONNECTION=database (for sending mail), Mail Connections in .env

php artisan migrate

php artisan db:seed --class=RolesTableSeeder

php artisan db:seed --class=AdminUserSeeder 
(Default email: admin@gmail.com and pass: 123456789)

### 3. Commands To Run Initially

php artisan serve

npm run dev 

php artisan queue:listen 
(must for receiving emails)

