# Udemy Clone – Laravel 12 (MVP)

A Udemy-like learning platform built with Laravel 12.

##  Features

### Instructor
- Instructor authentication
- Create / Edit / Delete courses
- Add modules (sections)
- Add lessons with video URLs
- Manage course content

### Student
- Browse published courses
- View course details
- Enroll in courses
- Access enrolled courses only
- Watch lesson videos (protected access)

##  Tech Stack
- Laravel 12
- PHP 8+
- MySQL
- Blade
- Bootstrap 5
- Tailwind 3
##  Installation

```bash
git clone https://github.com/USERNAME/udemy-clone-laravel.git
cd udemy-clone-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
