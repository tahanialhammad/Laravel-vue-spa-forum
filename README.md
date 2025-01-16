<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel SPA Forum App  with Vue.js 3

**Version:** v1.0  
**Created:** 15/01/2025  
**Updated:** 15/01/2025  
**By:** Tahani Alhammad  
**Email:** [tahaninawebdeveloper@gmail.com](mailto:tahaninawebdeveloper@gmail.com)

Thank you for purchasing my Web-app. If you have any questions beyond the scope of this help file, please feel free to email via my email [tahaninawebdeveloper@gmail.com](mailto:tahaninawebdeveloper@gmail.com). Thanks so much!

---

## About the Project

This project is a feature-rich forum application designed for freelancers to share ideas and discuss topics. Built with Laravel 11, Vue.js, and the robust Jetstream Authentication Starter Kit, this SPA offers a seamless user experience and advanced functionality.

### Features Overview:

#### Guest Features:
- View the homepage with a clean, responsive layout.
- Browse all posts and filter by topic for easier navigation.
- Read comments on posts.
- Access the contact page to send messages to info@example.com.

#### User Features:
- Register and log in to unlock advanced capabilities.
- Create, edit, or delete your own posts.
- Add comments to any post, edit/delete comments within 15 minutes.
- Like posts and comments to engage with the community.
- Access a personal dashboard to track your contributions, including a summary of your posts (title, date, and likes).

#### Admin Features:
- Perform all user-level actions.
- Manage users with an admin dashboard featuring user data (username, email, number of posts).
- Add, edit, or delete topics dynamically using a modal.
- Manage marketing items to display on the homepage and latest items shown on login/register pages.

---

## Technical Highlights:
- Built with **Laravel 11** and **Vue.js** for robust performance and modern design.
- Includes **Jetstream Authentication** for secure user registration and role-based access control (Admin, User, Guest).
- Leverages **Inertia.js** to seamlessly combine the power of Laravel with Vue.js, providing a smooth single-page application experience without the complexity of a full front-end framework.
- Integrated with **SweetAlert** for intuitive confirmation dialogs when deleting items.
- Fully responsive and optimized for desktop and mobile devices.
- Clean, maintainable, and well-documented code for easy customization.
- All design created with **Tailwind CSS** for a flexible and modern user interface.
- Utilizes the **Swiper** package to create stunning, responsive carousels and sliders, enhancing the user experience on the homepage Portfolio and other sections.
- Incorporates **TipTap Markdown** to provide a powerful markdown editor, allowing users to format posts and comments easily with intuitive controls.
- Comprehensive **testing** is implemented using **Pest**, ensuring high-quality code by testing critical features such as the **PostController, CommentController, and LikeController** functionalities.

---


### Author
Developed by **Tahani Alhammad**.

---

## Installation
Follow these steps to install and set up the project on your local environment:


1. **Downloading the project:**
   ```bash
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
- **Animations:** Swiper.js
- **Alerts:** SweetAlert2

---
