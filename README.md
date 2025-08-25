# ⚡ Laravel Blade Template Learning Project

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

> 🚀 A **comprehensive learning project** built to master **Laravel Blade Templates** using a real-world e-commerce and blog system.
> Perfect for developers who want to **understand Laravel Blade conceptually** with practical examples, modern UI, and production-ready code structure.

## 📋 Application Information

### 🎯 Project Overview
This Laravel application demonstrates a complete e-commerce and blog system built with Blade templates. It showcases modern Laravel development practices including:

- **Framework**: Laravel 12.x with PHP 8.2+
- **Frontend**: Tailwind CSS with Vite build system
- **Database**: MySQL with comprehensive relationships
- **Architecture**: MVC pattern with Blade templating
- **Features**: User management, blog system, e-commerce functionality

### 🏗️ System Architecture
```
├── App Layer (Controllers, Models, Services)
├── View Layer (Blade Templates, Layouts, Components)  
├── Database Layer (Migrations, Seeders, Relationships)
└── Frontend Assets (Tailwind CSS, JavaScript, Vite)
```

### 🔧 Technology Stack
- **Backend**: Laravel 12.x, PHP 8.2+
- **Frontend**: Blade Templates, Tailwind CSS 3.4, Alpine.js
- **Database**: MySQL 8.0+
- **Build Tools**: Vite 5.x, PostCSS, Autoprefixer
- **Development**: Laravel Debugbar, Pail, Pint

---

## ✨ Features

-   🔹 **Layouts & Partials** → Reusable `navbar`, `footer`, and global layout.
-   🔹 **Dynamic Rendering** → Posts, products, orders, comments, and settings directly from DB.
-   🔹 **Blade Directives** → Learn `@extends`, `@yield`, `@include`, `@foreach`, `@if`, and more.
-   🔹 **Relationships** → Orders with items, posts with comments, products with details.
-   🔹 **Modern UI Base** → Minimal but extendable UI with custom CSS (easily upgradable to Tailwind/Bootstrap).

---

## 🗄 Database Setup

You can import the database directly using the provided SQL dump.

📦[([database/dump/laravelbladetemplate.sql.zip](https://github.com/farmanali007/LaravelBladeTemplate/blob/main/database/dump/LaravelBladeTemplate_DB.zip))]

### Import Instructions

1. Unzip the file.
   Ensure your .env file has the correct DB credentials:
   `DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelbladetemplate
DB_USERNAME=root
DB_PASSWORD=`

## 🗂 Database Schema Overview

This project simulates **real-world e-commerce + blog** functionality:

-   👤 **Users** (customers, authors)
-   📝 **Posts & Comments** (blog system)
-   🛒 **Products & Orders with Items** (shop system)
-   🏷 **Categories & Tags** (organization)
-   ⚙️ **Settings** (site-level configuration)

---

## 📸 Preview (Conceptual)

### 🏠 Homepage

-   Latest Posts with author
-   Latest Products with price

### 📝 Post Page

-   Post details
-   Comments with user name

### 🛒 Order Page

-   Order summary
-   Order items with product names

---

## 🚀 Complete Setup Guide

### 📋 Prerequisites

Before starting, ensure you have the following installed on your system:

| Requirement | Version | Download Link |
|-------------|---------|---------------|
| **PHP** | 8.2+ | [php.net](https://www.php.net/downloads) |
| **Composer** | Latest | [getcomposer.org](https://getcomposer.org/download/) |
| **Node.js** | 18+ | [nodejs.org](https://nodejs.org/) |
| **MySQL** | 8.0+ | [mysql.com](https://dev.mysql.com/downloads/) |
| **Git** | Latest | [git-scm.com](https://git-scm.com/) |

**PHP Extensions Required:**
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

### ⚙️ Installation Steps

#### 1️⃣ Clone the Repository
```bash
git clone https://github.com/farmanali007/LaravelBladeTemplate.git
cd LaravelBladeTemplate
```

#### 2️⃣ Install Backend Dependencies
```bash
composer install
```

#### 3️⃣ Install Frontend Dependencies
```bash
npm install
```

#### 4️⃣ Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 5️⃣ Database Configuration

**Method A: Import Sample Database (Recommended)**
1. Create a MySQL database named `laravelbladetemplate`
2. Extract and import `database/dump/laravelbladetemplate.sql.zip`
3. Update your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelbladetemplate
DB_USERNAME=root
DB_PASSWORD=
```

**Method B: Fresh Installation**
```bash
# Create database first, then run:
php artisan migrate --seed
```

#### 6️⃣ Build Frontend Assets

**For Development (with hot reload):**
```bash
npm run dev
```

**For Production:**
```bash
npm run build
```

#### 7️⃣ Start the Application

**Simple Development Server:**
```bash
php artisan serve
```

**Full Development Mode (Server + Queue + Vite):**
```bash
composer run dev
```

#### 8️⃣ Access Your Application
- **Main Application**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **With Vite Dev Server**: [http://localhost:5173](http://localhost:5173) (assets)

---

## 📚 Learning Roadmap

This project is structured as **5 learning modules**:

### 1️⃣ Layouts & Global Partials

-   `layouts.app` base layout
-   `partials.navbar`, `partials.footer`

### 2️⃣ Rendering Data

-   Posts with authors
-   Products with prices
-   Orders with items

### 3️⃣ Blade Directives

-   Loops (`@foreach`)
-   Conditionals (`@if`)
-   Includes (`@include`)

### 4️⃣ Forms & Inputs

-   Simple create/edit forms
-   Validation messages

### 5️⃣ Advanced Blade

-   Components & Slots
-   Stacks & Push/Prepend

---

## 🖼 Example Blade Snippet

```blade
@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <h3>Comments</h3>
    <ul>
        @foreach($post->comments as $comment)
            <li>{{ $comment->body }} — by {{ $comment->user->name }}</li>
        @endforeach
    </ul>
@endsection
```

---

## 🔧 Development Commands

### Essential Commands
```bash
# Clear application cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run database migrations
php artisan migrate
php artisan migrate:fresh --seed

# Generate application key
php artisan key:generate

# Run queue worker
php artisan queue:work
php artisan queue:listen --tries=1

# Code formatting (Laravel Pint)
./vendor/bin/pint

# Run tests
php artisan test
composer run test
```

### Asset Management
```bash
# Development with hot reload
npm run dev

# Build for production
npm run build

# Watch for changes
npm run dev -- --watch
```

### Database Operations
```bash
# Run specific seeder
php artisan db:seed --class=UserSeeder

# Rollback migrations
php artisan migrate:rollback

# Check migration status
php artisan migrate:status
```

---

## 🚨 Troubleshooting

### Common Issues & Solutions

#### ❌ **Issue**: `composer install` fails
**Solution**: 
```bash
# Clear composer cache
composer clear-cache

# Update composer
composer self-update

# Install with verbose output
composer install -v
```

#### ❌ **Issue**: Database connection refused
**Solutions**:
1. Check MySQL service is running
2. Verify database credentials in `.env`
3. Create database if it doesn't exist:
```sql
CREATE DATABASE laravelbladetemplate;
```

#### ❌ **Issue**: `npm run dev` fails
**Solutions**:
```bash
# Clear npm cache
npm cache clean --force

# Delete node_modules and reinstall
rm -rf node_modules package-lock.json
npm install
```

#### ❌ **Issue**: Permission denied errors
**Solutions** (Linux/Mac):
```bash
# Fix storage and cache permissions
chmod -R 775 storage bootstrap/cache

# Change ownership (replace 'username' with your username)
sudo chown -R username:www-data storage bootstrap/cache
```

#### ❌ **Issue**: Vite assets not loading
**Solutions**:
1. Ensure both servers are running:
   - Laravel: `php artisan serve`
   - Vite: `npm run dev`
2. Check `vite.config.js` configuration
3. Clear browser cache

### Environment-Specific Notes

**Windows (XAMPP/WAMP)**:
- Ensure PHP path is in system PATH
- Use `php.exe artisan serve` if needed
- Check Windows Firewall settings

**macOS (MAMP/Homebrew)**:
- Use Homebrew PHP: `brew install php@8.2`
- Set correct PHP path in terminal

**Linux (Ubuntu/Debian)**:
```bash
# Install required packages
sudo apt update
sudo apt install php8.2 php8.2-mysql php8.2-xml php8.2-mbstring
```

### Performance Optimization

**Production Deployment**:
```bash
# Optimize for production
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

---

## 📞 Support & Resources

### Getting Help
- 📚 **Laravel Documentation**: [laravel.com/docs](https://laravel.com/docs)
- 🐛 **Report Issues**: [GitHub Issues](https://github.com/farmanali007/LaravelBladeTemplate/issues)
- 💬 **Community**: [Laravel Community](https://laravel.io/)

### Learning Resources
- 🎥 **Laracasts**: [laracasts.com](https://laracasts.com/)
- 📖 **Laravel Blade Docs**: [laravel.com/docs/blade](https://laravel.com/docs/blade)
- 🏗️ **Tailwind CSS Docs**: [tailwindcss.com/docs](https://tailwindcss.com/docs)

---

## 🤝 Contributing

Want to improve this learning project?

-   Add more Blade examples
-   Upgrade UI with Tailwind/Bootstrap
-   Extend relationships

Fork it, create a PR, and let’s make Blade learning easier together 🚀

---

## 📄 License

This project is open-sourced under the **MIT License**.

---

⚡ **Pro Tip:** This repo is best used as a **learning sandbox** → tweak Blade files, break things, and rebuild. That's how you truly master **Laravel Blade** 💡

---

## 📊 Project Statistics

- **Total Views**: Blog posts, products, and order management
- **Database Tables**: 8+ interconnected tables
- **Blade Templates**: 15+ reusable templates and partials  
- **Tailwind Components**: Modern, responsive UI components
- **Learning Modules**: 5 structured learning paths

---

**⭐ Star this repository if you find it helpful for learning Laravel Blade Templates!**
