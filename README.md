
# 🛒 Akatsuki Shop

**Akatsuki Shop** es una tienda online de tecnología desarrollada con Laravel y PHP como proyecto de portafolio. Permite visualizar productos, gestionar un carrito de compras y realizar simulaciones de pagos electrónicos mediante la integración de Webpay Plus de Transbank.

El proyecto tiene como objetivo aplicar conocimientos de desarrollo web Full Stack, arquitectura MVC, gestión de bases de datos e integración de servicios externos.

## 🚀 Funcionalidades

- 📦 Catálogo de productos con imágenes, precios y descripciones.
- 🔎 Vista de detalle de cada producto.
- 🛒 Carrito de compras interactivo.
- ➕ Aumentar y disminuir cantidades de productos.
- 🗑️ Eliminar productos del carrito.
- 💰 Cálculo automático del total de compra.
- 💳 Integración de Webpay Plus de Transbank.
- 🔄 Procesamiento y validación de respuestas de pago.
- 📊 Registro de transacciones en la base de datos.
- 📦 Gestión de stock de productos.

## 🛠️ Tecnologías utilizadas

| Tecnología | Descripción |
|---|---|
| PHP 8.2 | Lenguaje backend |
| Laravel 12 | Framework de desarrollo |
| SQLite | Base de datos local |
| Tailwind CSS 4 | Diseño y estilos |
| JavaScript | Interactividad frontend |
| Vite 7 | Compilación de recursos |
| Transbank Webpay Plus SDK 5.0 | Integración de pagos |
| Git / GitHub | Control de versiones |

## 💳 Integración de Webpay Plus

El proyecto incorpora la integración de **Webpay Plus de Transbank**, utilizando el ambiente de integración (Sandbox).

Permite:
- Crear transacciones de pago.
- Redireccionar al usuario a la plataforma de Webpay.
- Recibir y confirmar respuestas de transacciones.
- Identificar pagos aprobados o rechazados.
- Registrar el resultado de cada operación.

> Los pagos se realizan exclusivamente en ambiente de pruebas. No se procesan transacciones reales.

## ⚙️ Instalación y ejecución local

1. Clonar el repositorio:

```bash
git clone https://github.com/henryguajard/akatsuki-shop.git
```

2. Ingresar al proyecto:

```bash
cd akatsuki-shop
```

3. Instalar dependencias de PHP:

```bash
composer install
```

4. Crear el archivo de entorno:

```bash
cp .env.example .env
```

5. Generar la clave de Laravel:

```bash
php artisan key:generate
```

6. Crear la base de datos SQLite (si no existe):

```bash
touch database/database.sqlite
```

En Windows PowerShell puedes utilizar:

```powershell
New-Item database/database.sqlite -ItemType File
```

7. Ejecutar las migraciones y los datos iniciales:

```bash
php artisan migrate --seed
```

8. Instalar dependencias frontend:

```bash
npm install
```

9. Compilar los recursos:

```bash
npm run build
```

10. Iniciar el servidor:

```bash
php artisan serve
```

Abrir en el navegador:

```text
http://127.0.0.1:8000
```

## 🎯 Objetivo del proyecto

Desarrollar una aplicación de comercio electrónico aplicando conocimientos de programación backend y frontend, operaciones CRUD, arquitectura MVC, persistencia de datos e integración de servicios de terceros.

**Akatsuki Shop** forma parte de mi portafolio de desarrollo web y representa una experiencia práctica en la construcción de aplicaciones web utilizando tecnologías actuales.

---

**Desarrollado por Henry Guajardo** | [GitHub](https://github.com/henryguajard)
