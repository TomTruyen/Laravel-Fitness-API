# Setup

## .env

Setup the following environment variables in the `.env` file

#### Database

-   `DB_CONNECTION` (database type e.g.: **mysql**)
-   `DB_HOST` (database url e.g..: **localhost**)
-   `DB_PORT` (datbase port e.g.: **3306**)
-   `DB_DATABASE` (database name e.g.: **boardgamer_db**)
-   `DB_USERNAME` (database username e.g.: **user**)
-   `DB_PASSWORD` (database password e.g.: **user**)

#### Google

-   `GOOGLE_CLIENT_ID` (required, but can be empty)
-   `GOOGLE_CLIENT_SECRET` (required, but can be empty)
-   `GOOGLE_REDIRECT_URI` (required, should be empty for mobile)

# How to run

## Database

Create docker containers with the **database** and **adminer**

`docker-compose up -d`

## Composer

`composer install`

## Migrations

`php artisan migrate`

## Seed data

`php artisan db:seed`

## Start application (development)

`php artisan serve`

`npm run watch`

# Troubleshooting

## Route not found

If you are sure the route exists but you get a 404 Not Found error then try the following commands:

#### Check what routes exists

`php artisan r:l`

#### Fix missing routes

`php artisan optimize`

## Environment variables not working/returning null

`php artisan cache:clear`

## Recreate database from the first migration (drop & create all tables)

`php artisan migrate:fresh`
