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
  - [Running the project](#running-the-project)
    - [Using Laravel Sail (recommended)](#using-laravel-sail-recommended)
    - [Using local MySQL and PHP artisan](#using-local-mysql-and-php-artisan)
    - [Running npm commands](#running-npm-commands)
  - [Development](#development)
    - [Adding Components](#adding-components)
      - [Laravel](#laravel)
      - [Livewire](#livewire)
      - [Tailwind](#tailwind)
    - [Useful Commands](#useful-commands)
  - [Contributing](#contributing)
  - [License](#license)
  - [Acknowledgments](#acknowledgments)
  - [About Laravel](#about-laravel)
  - [Learning Laravel](#learning-laravel)

## Prerequisites

- PHP >= 8.2
- MySQL
- Composer
- Node.js and npm
- Docker (for Sail)
- Laravel Sail (optional)


## Installation

1. Clone the repository: `git clone https://github.com/khalidfsh/careers-app.git`

2. Navigate to the project folder: `cd careers-app`

3. Install PHP dependencies: `composer install`

4. Install JavaScript dependencies: `npm install`

5. Copy the `.env.example` file to a new `.env` file: `cp .env.example .env`

6. Generate an application key: `php artisan key:generate`

## Configuration

1. Open the `.env` file and configure your database settings:

   - For Laravel Sail, set `DB_CONNECTION=mysql` and `DB_HOST=mysql`
   - For local MySQL, set `DB_CONNECTION=mysql`, `DB_HOST=127.0.0.1`, and enter your `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`

2. (Optional) Configure Laravel Sail to use the correct database settings in `docker-compose.yml` if you are using Laravel Sail.

## Running the project

### Using Laravel Sail (recommended)

1. Start Laravel Sail: `./vendor/bin/sail up`

2. Run database migrations: `./vendor/bin/sail artisan migrate`

### Using local MySQL and PHP artisan

1. Start your local MySQL server.

2. Run database migrations: `php artisan migrate`

### Running npm commands

1. Compile your assets for development: `npm run dev`

   - Alternatively, compile your assets for production: `npm run build`

2. (Optional) Watch for changes in your assets and automatically recompile them: `npm run watch`

## Development

### Adding Components

#### Laravel

1. Generate a new model, migration, factory, and seeder:

```bash
php artisan make:model --migration --factory --seeder Job
```

2. Generate a new controller:

```bash
php artisan make:controller JobController --resource
```

#### Livewire

1. Generate a new Livewire component:

```bash
php artisan make:livewire JobList
```

This will create a new class in `app/Http/Livewire` and a new view in `resources/views/livewire`.

#### Tailwind

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

### Useful Commands

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

## License

This project is licensed under the Careers-App License. See the [LICENSE](LICENSE.md) file for details.

## Acknowledgments

- Hail Health Cluster.





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
