# Vargazs

**"Find your inspiration."** Vargazs is a Pinterest-style web app where users share visual posts, explore what others create, and save the posts they like. It was built as a final project.

## Features

- **Authentication:** register, login, email verification, and password reset (Laravel Breeze)
- **Posts:** create, edit, and delete image posts
- **Explore feed** with a post detail view
- **Save / unsave** posts to a personal collection
- **User profile** page and profile settings

## Tech Stack

Laravel 12 · Laravel Breeze · Blade · Tailwind CSS · Vite · MySQL

## Getting Started

```bash
git clone https://github.com/SAJADDIPURO/vargazs.git
cd vargazs
composer install && npm install
cp .env.example .env && php artisan key:generate
php artisan migrate
php artisan storage:link
npm run build && php artisan serve
```
