
# SME POS System – Local Development Setup Guide

Follow these steps to clone and run this Laravel + Filament project on your local machine.

---

## ✅ 1. Clone the repository

```bash
git clone https://github.com/your-username/sme-pos-system.git
cd sme-pos-system
```

---

## ✅ 2. Install PHP dependencies

Ensure you have PHP (8.1 or newer) and Composer installed.

```bash
composer install
```

---

## ✅ 3. Install Node dependencies

Make sure you have Node.js and npm installed.

```bash
npm install
```

---

## ✅ 4. Set up environment file

```bash
cp .env.example .env
```

Then generate the app key:

```bash
php artisan key:generate
```

---

## ✅ 5. Configure your database

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sme_pos
DB_USERNAME=root
DB_PASSWORD=your_password
```

Then run:

```bash
php artisan migrate
```

---

## ✅ 6. Create a Filament admin user

```bash
php artisan make:filament-user
```

Follow the prompts to create your login.

---

## ✅ 7. Run Vite in development

```bash
npm run dev
```

---

## ✅ 8. Serve the app with Laravel Valet or PHP's built-in server

**If using Valet:**

```bash
valet link
valet secure
```

- `valet link` registers your project with Valet so it can be accessed via `http://sme-pos-system.test`.
- `valet secure` enables HTTPS by generating a self-signed TLS certificate for your site, making it accessible at `https://sme-pos-system.test`.

> ⚠️ Note: Browsers may show a warning for self-signed certificates. You can safely bypass it in local development.

Visit: [https://sme-pos-system.test/admin](https://sme-pos-system.test/admin)

**Or use PHP server:**

```bash
php artisan serve
```

Visit: [http://localhost:8000/admin](http://localhost:8000/admin)

---

## ✅ Notes

- This app uses **Filament Admin Panel v3**
- Session driver: `database` (run `php artisan session:table && php artisan migrate` if needed)
- Logging: daily logs in `storage/logs`

---

## ✅ Troubleshooting

- Run `composer install` if `vendor` folder is missing.
- Run `npm run build` for production assets.
- Ensure database is running locally.

---

