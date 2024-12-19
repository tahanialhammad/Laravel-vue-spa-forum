<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel SPA with Vue.js 3

## About This Project
This **Laravel SPA** project is a full-stack web application built with **PHP Laravel** for the backend and **Vue.js 3** for the frontend. It leverages **MySQL** as the database and integrates modern tools for styling and interactivity:

- **Laravel Jetstream** for authentication.
- **TailwindCSS** for clean and responsive styling.
- **SweetAlert2** for beautiful, user-friendly alerts.
- **Swiper.js** for animated sliders.
- **GSAP (GreenSock Animation Platform)** for smooth animations.

The application features a robust three-level interface designed for different user roles:

---

### 🚪 **Guest Interface**
The public-facing part of the site, accessible to visitors who have not logged in. It includes:
- Landing pages with general information.
- Blog section for articles or updates.
- Product/service details or any content meant for general users.

---

### 👤 **User Interface** (Authenticated Users)
Once logged in, users gain access to personalized features, such as:
- User profile management and settings.
- Blog functionalities:
  - Create, update, and delete blog posts.
  - Add comments to blog posts.
- Service requests:
  - Place an order or request specific services.

---

### 🔧 **Admin Interface** (CMS - Content Management System)
Admins with elevated privileges can manage the entire system. Key features include:
- Content management:
  - Add services, packages, or features for specific services.
- User management:
  - Manage user accounts, roles, and permissions.
- Order management:
  - Accept and process service orders placed by users.
- Analytics and system oversight.

---

## Features
- **Modern UI/UX** powered by TailwindCSS, Swiper.js, and GSAP.
- **Secure Authentication** with Laravel Jetstream.
- **Dynamic Content Management** for administrators.
- **SPA Architecture** with Vue.js 3 for seamless user experiences.
- **Responsive Design** ensuring mobile and desktop compatibility.

---

## Project Screenshot
<img src="https://i.postimg.cc/XvX2DsGM/laravel-vue-spa.png"  alt="home page ">

---

### Author
Developed by **Tahani Alhammad**.

---

## Installation
Follow these steps to install and set up the project on your local environment:

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment:**
   - Duplicate `.env.example` and rename it to `.env`.
   - Configure your database and application details.

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **Build the frontend assets:**
   ```bash
   npm run dev
   ```

7. **Serve the application:**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://127.0.0.1:8000`.

---

## Technologies Used
- **Backend:** Laravel 11
- **Frontend:** Vue.js 3, TailwindCSS
- **Database:** MySQL
- **Authentication:** Laravel Jetstream
- **Animations:** GSAP, Swiper.js
- **Alerts:** SweetAlert2

---

## License
This project is open-source and available under the **MIT License**.

---
