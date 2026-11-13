# Integrated Blood Distribution System

A Laravel portfolio application for coordinating blood requests and stock records between health facilities and regional blood bank managers in Tanzania.

## Features

- Blood request creation, validation and status management.
- Role-specific request views for administrators, blood bank managers and laboratory technicians.
- Blood-group inventory records and donation records.
- Facility, doctor and blood-use records.
- Authenticated application workflows.

## Built with

PHP 8.1+, Laravel 10, Eloquent, MySQL, Blade, JavaScript and Vite. Exact dependency constraints are in `composer.json` and `package.json`.

## Local setup outline

1. Clone the repository and install PHP dependencies with `composer install`.
2. Create a local `.env` file using the configuration keys required by Laravel and this application's `config/` files. A project `.env.example` is not currently included.
3. Configure a new local MySQL database, `APP_URL`, application environment and database credentials.
4. Run `php artisan key:generate`, then `php artisan migrate`.
5. Install frontend dependencies with `npm ci` and build with `npm run build`.
6. Run `php artisan serve` for local development.

Database migrations and the complete startup flow need environment-specific verification. Do not assume a newly registered account has an administrative role.

## Code guide

- `app/Http/Controllers/BloodrequestController.php`: blood requests and role-specific listing.
- `app/Http/Controllers/StocksController.php`: stock record management.
- `app/Models/`: application data models.
- `database/migrations/`: schema evolution.
- `routes/`: route definitions.

## Project scope

This is a software portfolio project, not a clinically validated blood-allocation system. Use synthetic data for demonstrations. Production adoption would require a separate review of clinical workflows, permissions, stock consistency and privacy controls.

## Author

[Hassan Robert](https://github.com/HassanR500) · [LinkedIn](https://www.linkedin.com/in/hassan-robert/)
