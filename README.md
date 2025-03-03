# TCG Market

## Requisitos

Asegúrate de tener instalados los siguientes requisitos en tu sistema:

- [XAMPP](https://www.apachefriends.org/es/index.html) (para MySQL y Apache)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/downloads) (incluido en XAMPP, pero puede requerir configuración adicional)

## Instalación

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/VillegasMich/tcg-market-laravel.git
   cd tcg-market-laravel
   ```

2. **Configurar el entorno**

   Copia el archivo de configuración de ejemplo y ajústalo según tus necesidades:

   ```bash
   cp .env.example .env
   ```

   Edita el archivo `.env` y configura la conexión a la base de datos:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_base_datos
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Iniciar XAMPP y MySQL**

   Abre XAMPP y asegúrate de iniciar los módulos "Apache" y "MySQL".

4. **Instalar dependencias**

   ```bash
   composer install
   ```

5. **Generar clave de aplicación**

   ```bash
   php artisan key:generate
   ```

6. **Ejecutar migraciones y seeders (si aplica)**

   ```bash
   php artisan migrate --seed
   ```

7. **Ejecutar el servidor de Laravel**

   ```bash
   php artisan serve
   ```

   La aplicación estará disponible en [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Notas

- Si tienes problemas de permisos con storage, ejecuta:

  ```bash
  chmod -R 777 storage bootstrap/cache
  ```

- Si MySQL no permite la conexión, revisa en XAMPP el puerto correcto y ajústalo en `.env`.

---

Con esto, tu proyecto Laravel estará configurado y listo para ejecutarse.

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
