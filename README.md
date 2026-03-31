📦 Product Gallery Manager
A modern, robust Product Management System built with Laravel 12. This application allows administrators to manage a product catalog featuring multiple image galleries, custom dashboard mastering, and a clean user profile management system.

🚀 Features
🔐 Secure Authentication: Full login and registration system for administrative access.

📊 Custom Admin Dashboard: - Real-time statistics (Total Products/Images).

Integrated Profile Management for quick updates.

🛒 Product CRUD Operations:

Create, Read, Update, and Delete products.

Rich text descriptions and organized data handling.

🖼️ Advanced Gallery Management:

Multi-Image Upload: Support for uploading 3+ images per product.

Smart Storage: Managed via Laravel's Storage facade on the public disk.

Sync-Delete: Automatically removes image files from physical storage when a record is deleted from the database.

👤 Profile Settings: Update administrative name, email, and password directly from the dashboard.

📱 Responsive UI: Fully responsive design crafted with Bootstrap 5 and Blade Layout Mastering (@yield, @section).

🛠️ Tech Stack
Backend: Laravel 12 (PHP 8.2+)

Frontend: Blade Templating, Bootstrap 5, JavaScript (AJAX for gallery interactions)

Database: MySQL / PostgreSQL

Storage: Local Filesystem (Linked to Public)

🔧 Installation & Setup
Follow these steps to get the project running locally:

1. Clone the Repository
Bash
git clone https://github.com/0000asif/product-gallery.git
cd product-gallery
2. Install Dependencies
Bash
composer install
npm install && npm run dev
3. Environment Configuration
Create your environment file and generate the application key:

Bash
cp .env.example .env
php artisan key:generate
Note: Update the DB_DATABASE, DB_USERNAME, and DB_PASSWORD in your .env file.

4. Database Migration & Seeding
Bash
php artisan migrate --seed
5. Link Storage
Create a symbolic link to make uploaded images accessible via the browser:

Bash
php artisan storage:link
📂 Project Logic & Architecture
Eloquent Relationships: Uses a One-to-Many relationship between Product and ProductImage models.

File Handling: Images are validated (max 2MB, JPEG/PNG/WebP) and stored in storage/app/public/products.

Blade Mastering: The UI is built on a central layouts.admin master file, ensuring a consistent sidebar and navigation across all views.

📸 Usage
Start the local server: php artisan serve

Navigate to: http://localhost:8000

Register an account and log in.

Go to Product Gallery to add your first product with multiple images.

👨‍💻 Developer Information
Developer: Asif
WhatsApp: +8801758040074
