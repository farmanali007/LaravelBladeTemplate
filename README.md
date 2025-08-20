# ⚡ Laravel Blade Template Learning Project

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

> 🚀 A **hands-on learning project** built to master **Laravel Blade Templates** using a real-world style database (Users, Posts, Products, Orders, etc.).
> Perfect for beginners who want to **understand Blade conceptually** with practical examples, clean UI, and modular code.

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

## ⚙️ Installation

```bash
# 1. Clone the repo
git clone https://github.com/farmanali007/LaravelBladeTemplate.git
cd LaravelBladeTemplate

# 2. Install dependencies
composer install
npm install && npm run dev

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Run migrations & seed
php artisan migrate --seed

# 5. Start server
php artisan serve
```

Visit 👉 `http://127.0.0.1:8000`

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

⚡ **Pro Tip:** This repo is best used as a **learning sandbox** → tweak Blade files, break things, and rebuild. That’s how you truly master **Laravel Blade** 💡

---

👉 Do you also want me to design a **futuristic logo/banner (like “Laravel Blade Learning Hub” with gradient style)** for your README to make it stand out visually on GitHub?
