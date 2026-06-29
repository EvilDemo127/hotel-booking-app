# 🏨 Hotel Booking System

Responsive full-stack Hotel Booking Management System built with **Laravel**, **Laravel Breeze**, **Tailwind CSS**, and integrated with **Google Drive API** for secure cloud asset storage.

🌐 **Live Demo:** [View Live Site]([https://onrender.com](https://hotel-booking-app-wvsn.onrender.com/))

---

## 🚀 Features

- **Secure Authentication:** User registration, login, and profile management using Laravel Breeze.
- **Room Management:** CRUD operations for hotel rooms (Admin panel for room creation, updates, and tracking).
- **Cloud Image Hosting:** Automatic image upload and storage directly into Google Drive via API.
- **Responsive UI:** Clean, beautiful, and mobile-friendly design built with Tailwind CSS.
- **Data Validation:** Advanced request validation handling string lengths, numbers, and file types to prevent database truncation errors.

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.x, Laravel 11.x/12.x
- **Frontend:** Blade Templates, Tailwind CSS
- **Authentication:** Laravel Breeze
- **Database:** PostgreSQL / MySQL
- **Storage:** Google Drive API
- **Deployment:** Render

---

## 💻 Getting Started

Follow these steps to setup the project locally on your machine:

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM
- Google Cloud Console Account (For Drive API setup)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone [https://github.com](https://github.com/EvilDemo127/hotel-booking-app)
   cd YOUR_REPO_NAME
   ```

2. **Install Backend Dependencies**
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies**
   ```bash
   npm install && npm run dev
   ```

4. **Environment Setup**
   Copy the `.env.example` file and configure your database and Google Drive API credentials:
   ```bash
   cp .env.example .env
   ```

   Open `.env` and fill in your keys:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

   # Google Drive API Configurations
   GOOGLE_DRIVE_CLIENT_ID=your_client_id
   GOOGLE_DRIVE_CLIENT_SECRET=your_client_secret
   GOOGLE_DRIVE_REFRESH_TOKEN=your_refresh_token
   GOOGLE_DRIVE_ROOM_ID=your_parent_folder_id
   GOOGLE_DRIVE_GALERY_ID=your_parent_folder_id
   GOOGLE_DRIVE_BLOG_ID=your_parent_folder_id
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Link Storage**
   ```bash
   php artisan storage:link
   ```


---

## 🔑 Demo Account (Testing Credentials)

To test the application instantly without registering, use the following credentials:
- **Email:** `admin@example.com`
- **Password:** `password123`

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Feel free to check the issues page.



