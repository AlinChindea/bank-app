## About Bank App
A simple Laravel 10+ bank app, featuring a JSON-based REST API in the back-end that's consumed by a JavaScript front-end.

## Requirements
The following tools are required in order to start the installation:
 - PHP 8.1 or higher
 - Composer
 - Node.js LTS
 - MySQL 8

## Setup
If you're on a Mac and use [Herd](https://herd.laravel.com/), clone the repo in the right location (either the Herd directory or your dedicated code workspace, e.g. `~/Code`). Otherwise, clone it in your natural work directory.

### 1. Create your DB and `.env`
Set up a local database. If you call the DB `bank_db`, there's no much configuration to be done. If you call it something else, make sure its name matches the value of the `DB_DATABASE` variable in the `.env` file you'll create next. Likewise, if you access your MySQL instance using a password, make sure that value is updated in the corresponding variable in the `.env` file.

```shell
cp .env.example .env
```

### 2. Install dependencies

```shell
composer install
php artisan key:generate
php artisan migrate
npm install
npm run build
```

## Testing
TBA
