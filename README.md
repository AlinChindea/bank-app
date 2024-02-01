## About Bank App
A basic Laravel 10+ app, featuring a JSON-based REST API in the back-end that's consumed by a JavaScript (Vuejs v3) front-end.

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
npm run dev
```

## Testing
The app should now run at `http://bank-app.test`. To run the development server over `https`, use the `herd secure` command (if you've installed the app using Laravel Herd). To add a customer, head to `https://bank-app.test/customers`. To test the API more comprehensively, I recommend using a specialised tool such as [Postman](https://www.postman.com/). The API's base endpoint is `/api/customers`.
