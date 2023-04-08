<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

[![ar](https://img.shields.io/badge/lang-ar-yellow.svg)](README.ar.md)

# Careers App

A web application to list available jobs in the company and receive job applications from users. Built using Laravel, Jetstream, Livewire, Tailwind, and Sail.

## Table of Contents

- [Careers App](#careers-app)
  - [Table of Contents](#table-of-contents)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Adding Components](#adding-components)
    - [Laravel](#laravel)
    - [Livewire](#livewire)
    - [Tailwind](#tailwind)
  - [Useful Commands](#useful-commands)
  - [Contributing](#contributing)
  - [About Laravel](#about-laravel)
  - [Learning Laravel](#learning-laravel)

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- Docker (for Sail)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/careers-app.git
cd careers-app
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install JavaScript dependencies:

```bash
npm install
```

4. Copy the example environment file and configure the application:

```bash
cp .env.example .env
```

Update the `.env` file with your database and other required configurations.

5. Generate an application key:

```bash
php artisan key:generate
```

6. Run database migrations and seeders (if any):

```bash
php artisan migrate --seed
```

7. Start the Sail development environment:

```bash
./vendor/bin/sail up -d
```

The application should now be accessible at [http://localhost](http://localhost).

## Configuration

- Configure your application's environment variables in the `.env` file.
- Update the `config/*.php` files to customize the application settings.

## Adding Components

### Laravel

1. Generate a new model, migration, factory, and seeder:

```bash
php artisan make:model --migration --factory --seeder Job
```

2. Generate a new controller:

```bash
php artisan make:controller JobController --resource
```

### Livewire

1. Generate a new Livewire component:

```bash
php artisan make:livewire JobList
```

This will create a new class in `app/Http/Livewire` and a new view in `resources/views/livewire`.

### Tailwind

1. Import new Tailwind components in `resources/css/app.css`:

```bash
@import 'components/new-component';
```

2. Create the new component file in `resources/css/components`:

```bash
touch resources/css/components/new-component.css
```

3. Compile the CSS:

```bash
npm run dev
```

## Useful Commands

- Run tests:

```bash
php artisan test
```

- Run database migrations:

```bash
php artisan migrate
```

- Rollback database migrations:

```bash
php artisan migrate:rollback
```

- Clear cache:

```bash
php artisan cache:clear
```

- Clear config cache:

```bash
php artisan config:clear
```

- Clear view cache:

```bash
php artisan view:clear
```

- Tinker with your application code:

```bash
php artisan tinker
```

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.







## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
