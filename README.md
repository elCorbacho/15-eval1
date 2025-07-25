# Eval1-Web

Aplicación web desarrollada con Laravel para la gestión de recursos mediante una API RESTful.

## Requisitos

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js y npm (opcional para frontend)

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/eval1-web.git
   cd eval1-web
   ```
2. Instala dependencias PHP:
   ```bash
   composer install
   ```
3. Copia el archivo de entorno y configura tus variables:
   ```bash
   cp .env.example .env
   ```
4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
5. Configura la base de datos en `.env`.
6. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```
7. (Opcional) Instala dependencias frontend:
   ```bash
   npm install && npm run dev
   ```
8. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## Uso

Accede a la aplicación en [http://localhost:8000](http://localhost:8000).

## Endpoints principales

### Endpoints API (`routes/api.php`)

| Método  | Endpoint              | Descripción                        |
|---------|-----------------------|------------------------------------|
| POST    | /api/proyecto         | Crear un nuevo proyecto            |
| PATCH   | /api/proyecto/{id}    | Actualizar proyecto por ID         |
| DELETE  | /api/proyecto/{id}    | Eliminar proyecto por ID           |
| GET     | /api/user             | Obtener usuario autenticado (Sanctum) |

> Nota: Los endpoints GET para listar y obtener proyectos por ID están comentados en `api.php`. Si deseas activarlos, descomenta las líneas correspondientes.

### Endpoints Web (`routes/web.php`)

| Método  | Endpoint              | Descripción                        |
|---------|-----------------------|------------------------------------|
| GET     | /                     | Página principal (welcome)         |
| GET     | /proyecto             | Listar todos los proyectos         |
| GET     | /proyecto/{id}        | Obtener proyecto por ID            |

<!-- Puedes agregar más endpoints según los recursos y controladores de tu proyecto. -->

## Contribuir

Las contribuciones son bienvenidas. Por favor, abre un issue o envía un pull request.

## Licencia

Este proyecto utiliza el framework Laravel, licenciado bajo [MIT](https://opensource.org/licenses/MIT).
Este proyecto utiliza el framework Laravel, licenciado bajo [MIT](https://opensource.org/licenses/MIT).
