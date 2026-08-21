# Project 407

The marketing website for Project 407, a web and software studio serving contractors and local service businesses.

## Requirements

- PHP 8.4
- Composer
- Node.js and npm
- SQLite or another Laravel-supported database

## Local setup

```bash
composer run setup
composer run dev
```

The setup command installs dependencies, creates the local environment file, generates an application key, runs the database migrations, and builds the frontend assets. The development command starts Laravel, Vite, the queue worker, and the application log viewer.

## Tests

```bash
php artisan test --compact
```

## Code formatting

```bash
vendor/bin/pint --format agent
```

## Environment configuration

The inquiry form stores submissions in the database. These optional environment variables enable external services:

```dotenv
DISCORD_PROJECT_407_LEADS_WEBHOOK_URL=
GOOGLE_ANALYTICS_ID=
```

Production deployments should set `APP_URL` to the canonical public URL and use a persistent cache store for inquiry rate limiting.
