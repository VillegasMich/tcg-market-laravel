# TCG Market

# Laravel Project

## Requirements

Make sure you have the following installed on your system:

- [XAMPP](https://www.apachefriends.org/index.html) (for MySQL and Apache)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/downloads) (included in XAMPP but may require additional configuration)

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/VillegasMich/tcg-market-laravel.git
   cd tcg-market-laravel
   ```

2. **Set up the environment**

   Copy the example configuration file and adjust it as needed:

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file and configure the database connection:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=database_name
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Start XAMPP and MySQL**

   Open XAMPP and ensure the "Apache" and "MySQL" modules are running.

4. **Install dependencies**

   ```bash
   composer install
   npm install  # If using Laravel Mix
   ```

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Run migrations and seeders (if applicable)**

   ```bash
   php artisan migrate --seed
   ```

7. **Start the Laravel server**

   ```bash
   php artisan serve
   ```

   The application will be available at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Notes

- If you have permission issues with storage, run:

  ```bash
  chmod -R 777 storage bootstrap/cache
  ```

- If MySQL does not allow the connection, check the correct port in XAMPP and adjust it in `.e

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
