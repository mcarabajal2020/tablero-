# 📊 Tablero Informativo Agropecuario

Aplicación web desarrollada con **Laravel + Filament** pensada para visualizar información clave del sector agropecuario en un tablero centralizado.

El sistema está diseñado para mostrarse en pantallas (TV / monitor) y se enfoca en **robustez**, **simplicidad** y **tolerancia a fallos**, evitando dependencias directas con servicios externos en tiempo real.

---

## 🚀 Características principales

- 📌 **Pizarra de precios** (CRUD)
- 📰 **Noticias del agro** (CRUD de noticias cortas)
- 💱 **Cotización del dólar mayorista**
  - Consumo desde API externa
  - Persistencia en base de datos
  - Tolerancia a caídas de la API
- 📈 **MATBA / ROFEX**
  - Producto / Contrato
  - Precio
  - Precio compra
  - Precio venta
- 🔐 Panel administrativo con **Filament**
- 🔄 Auto-refresh general del tablero

---

## 🛠️ Tecnologías utilizadas

- PHP 8.2+
- Laravel 11 / 12
- Filament 3
- SQLite / MySQL
- Tailwind CSS
- API externa: DolarAPI

---

## 📦 Instalación del proyecto

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/mcarabajal2020/tablero-.git
cd tablero-

2️⃣ Instalar dependencias
composer install
npm install
npm run build

3️⃣ Configurar entorno

Copiar el archivo de entorno:

cp .env.example .env


Generar la key de la aplicación:

php artisan key:generate

4️⃣ Configurar base de datos

Por defecto el proyecto puede funcionar con SQLite.

Crear el archivo:

touch database/database.sqlite


Y en .env:

DB_CONNECTION=sqlite
DB_DATABASE=/ruta/absoluta/al/proyecto/database/database.sqlite

5️⃣ Ejecutar migraciones
php artisan migrate

6️⃣ Crear usuario administrador
php artisan make:filament-user

💱 Actualización automática del dólar mayorista

La cotización del dólar NO se consulta en tiempo real desde la vista.
Se obtiene desde una API externa(https://dolarapi.com/ y toma cotizacion mayorista) y se almacena en base de datos mediante un comando programado.

▶️ Ejecutar manualmente
php artisan dolar:actualizar


Si todo está correcto, verás:

Dólar mayorista actualizado correctamente

⏱ Programar tarea automática (Scheduler)

En Laravel 11 / 12, el scheduler se define en:

bootstrap/app.php


Ejemplo:

->withSchedule(function (Schedule $schedule) {
    $schedule->command('dolar:actualizar')
        ->everyThirtyMinutes()
        ->withoutOverlapping();
})

🕒 Activar cron del sistema

Editar el crontab:

crontab -e


Agregar:

* * * * * php /ruta/al/proyecto/artisan schedule:run >> /dev/null 2>&1


Esto permite que Laravel ejecute las tareas programadas.

🖥️ Acceso al panel administrativo
/admin


Desde allí se gestionan:

Pizarra

Noticias

MATBA

Usuarios (según permisos)

🔐 Roles y permisos

El sistema contempla roles básicos como:

super_admin

operador

Algunos recursos solo son visibles para usuarios con permisos elevados.

📸 Vista general

El tablero se divide en dos secciones principales:

🎥 Video informativo (YouTube)

🧱 Tarjetas con información dinámica:

Pizarra

Noticias

Dólar

MATBA

Todas las tarjetas mantienen tamaño fijo y el contenido se adapta automáticamente.

📄 Licencia

Este proyecto es de uso interno / educativo.
Podés adaptarlo libremente según tus necesidades.

🤝 Autor

Desarrollado por Alejandro Carabajal
