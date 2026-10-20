# ShopNext &bull; Next-Gen E-Commerce Platform

ShopNext is a multi-vendor e-commerce application built with Laravel and Tailwind CSS, featuring role-based access for Buyers, Sellers, and Admins.

## Features

- **Multi-Role Authentication**: Seamless login and registration with dedicated roles (`customer`, `seller`, `admin`).
- **Responsive UI**: Fully optimized for mobile, tablet, and desktop viewports.
- **Admin Control Hub**: Platform overview, metrics, and user management directory.
- **Seller Merchant Center**: Shop statistics, order management, and product listings.
- **Buyer Storefront**: Product browsing and checkout workflow.

## Requirements

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL / MariaDB

## Installation & Setup

1. **Clone & Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   Configure your database credentials in `.env`, then run migrations:
   ```bash
   php artisan migrate
   ```

4. **Default Admin Seeder (Optional)**
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   ```
   - **Default Admin Email**: `admin@shopnext.com`
   - **Default Admin Password**: `admin12345`

5. **Build Assets & Start Local Server**
   ```bash
   npm run build
   php artisan serve
   ```

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
