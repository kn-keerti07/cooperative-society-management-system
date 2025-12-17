Co-Operative Society Management System
=========================================

Project Overview
----------------
The Co-Operative Society Management System is a web-based application developed to automate and manage the day-to-day operations of a cooperative society. It provides a secure and efficient platform for member registration, transaction processing, balance checking, account management, and product inventory. This system replaces manual processes with a centralized digital solution for both administrators and account holders.

Project Creator
---------------
Created by K. N. KEERTI, student of BCA final year/semester, for the final year project at JSS SMI UG & PG Studies, Dharwad.
For further help or inquiries, contact the project maintainer.

Technologies Used
-----------------
- PHP (Backend logic)
- MySQL (Database)
- HTML5, CSS3 (Frontend structure and styling)
- JavaScript (UI interactivity)
- XAMPP/WAMP (Local server environment)

Project Structure
-----------------
- assets/           # Static files (css, js, images)
- includes/         # PHP includes/utilities
- config/           # Configuration files
- templates/        # HTML templates (auth, dashboard, etc.)
- admin/            # Admin panel files
- user/             # Account holder access files
- uploads/          # File uploads if any
- index.html        # Home or landing page

Setup Instructions
------------------
1. Download or clone the project to your web server directory (e.g., c:/xampp/htdocs/).
2. Create a new MySQL database (e.g., csms_db).
3. Import the schema from csms_db.sql using phpMyAdmin or MySQL CLI.
4. Update database credentials in `config.php` file.
5. Ensure the `uploads/` directory is writable by the server (if used).
6. Start Apache and MySQL from XAMPP/WAMP.
7. Access the app at http://localhost/Cooperative society management system

How to Use Each Part of the Website
-----------------------------------

1. Admin Panel
   - Login via `admin_login.html` with admin credentials.
   - Manage members, view and approve transactions, check inventory, and oversee operations.

2. Member Registration & Login
   - Members can register via the registration form.
   - Login with credentials to access account dashboard.
   - View profile, check balances, and request transaction statements.

3. Transactions
   - Members can perform deposit and withdrawal transactions.
   - Admins can monitor and confirm transactions from the backend.

4. Product Management
   - Admins can add, update, or delete product information such as name, price, and stock.
   - Inventory can be viewed by members (if enabled).

Security Features
-----------------
- Password Hashing (secure storage)
- Session Management (user authentication)
- Input Validation (server side)
- SQL Injection Prevention (prepared statements)

Troubleshooting
---------------
- Database errors? Check database connection in `config.php` and ensure the database is properly imported.
- Login issues? Verify account exists and credentials are correct.
- File upload issues? Check folder permissions.

Credits & Ownership
-------------------
- Created by K. N. KEERTI, BCA final year/sem, JSS SMI UG & PG Studies, Dharwad.
- This project is intended for academic and demonstration purposes.

For further help, contact the project maintainer.
