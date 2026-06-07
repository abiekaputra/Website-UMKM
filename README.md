# UMKMGO! — Small Business E-Commerce Website

A PHP-native e-commerce website for small businesses (UMKM) featuring a product catalog, shopping cart, user authentication, and transaction management.

## Features

- **Product Catalog** — browse products with images, categories, prices, and descriptions
- **Product Detail** — dedicated page per product with full information
- **Shopping Cart** — add/remove items, order summary
- **Transactions** — purchase flow, transaction details, and receipt
- **Authentication** — session-based registration, login, and logout
- **Product Upload** — admin can upload products with photos
- **User Profile** — account management page

## Tech Stack

- PHP (native, no framework)
- MySQL
- HTML / CSS / JavaScript

## Installation

### Prerequisites

- PHP >= 7.4
- MySQL
- Web server (XAMPP, Laragon, or built-in `php -S`)

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/abiekaputra/Website-UMKM.git
cd Website-UMKM

# 2. Create database and tables
mysql -u root -p < schema.sql

# 3. Configure database connection
#    Edit config.php — set DB_HOST, DB_USER, DB_PASS, DB_NAME to match your local environment

# 4. Start the development server
php -S localhost:8000
```

Open `http://localhost:8000` in your browser.

## Configuration

All database settings are centralized in `config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'umkm');
```

## Project Structure

```
├── config.php              # Database configuration & connection helper
├── schema.sql              # Database schema (run once on setup)
├── index.php               # Homepage
├── products_page.php       # Product catalog
├── productDetail.php       # Product detail page
├── product_db.php          # Product upload handler
├── cart.php                # Shopping cart
├── addCart.php             # Add-to-cart action handler
├── transactionDetail.php   # Transaction details
├── receipt.php             # Purchase receipt
├── prosesLogin.php         # Login handler
├── register.php            # Registration handler
├── logout.php              # Logout handler
├── assets/                 # Images and fonts
├── style/                  # CSS files
└── upload_images/          # Product image uploads
```

## License

Built for academic purposes and portfolio development.
