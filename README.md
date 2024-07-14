# Music Library Project

Welcome to this music library project! This project is built using Laravel and Vue with Inertia.js, providing a platform to add tracks, play them, and create playlists. Follow the instructions below to get started.

## Installation

### Clone the repository:

```bash
git clone git@github.com:lucaschrng/rendu-fullstack.git
cd rendu-fullstack
```

### Install dependencies:

```bash
composer install
npm install
```

### Create a copy of the .env file:

```bash
cp .env.example .env
```

### Generate an application key:

```bash
php artisan key:generate
```

### Configure your database settings in the .env file.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=music_library
DB_USERNAME=root
DB_PASSWORD=secret
```

### Run the database migrations:

```bash
php artisan migrate
```

## Seeding the Database

To populate the database with some initial data, you can use the database seeder.

```bash
php artisan db:seed
```

This command will seed the database with some example tracks, users, and playlists.

## Usage

### Start the development server:

```bash
php artisan serve*
```

### Compile the frontend assets:

```bash
npm run dev
```

Visit the application in your browser:

```
http://localhost:8000
```

## Default Admin Credentials

- Email: admin@email.com
- Password: password

## Features

- Add and manage tracks
- Create and manage playlists
- Play tracks directly within the application
- User authentication and authorization
