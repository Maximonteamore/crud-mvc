# Proyecto MVC - Gestion de Productos

Este es un proyecto basico de ejemplo que utiliza el patrón MVC para gestionar un catalogo de productos con conexion a base de datos MySQL.

## Estructura del Proyecto

- `index.php` - Punto de entrada principal.
- `config.php` - Archivo de configuración con la URL base.
- `models/` - Contiene las clases para conexion y manipulacion de datos.
- `views/` - Contiene las vistas para mostrar los productos.
- `controllers/` - Controladores para manejar la logica de negocio.
- `sql/` - Contiene el archivo `productos.sql` con la estructura y datos de la base de datos.

## Requisitos

- PHP 8 o superior.
- Servidor MySQL o MariaDB.
- Servidor local (XAMPP, WAMP, MAMP, etc.).

## Instalación

1. Clonar o descargar el repositorio.
2. Importar el archivo `sql/productos.sql` en tu base de datos MySQL.
3. Configurar la conexión a la base de datos en el modelo (archivo `models/`).
4. Ajustar la constante `urlsite` en `config.php` según la URL de tu servidor local.
5. Ejecutar el proyecto desde el navegador apuntando a la carpeta raíz.

## Uso

El proyecto permite listar productos con sus precios y stock. Puedes modificar los datos directamente en la base de datos o crear nuevas funcionalidades.

## Licencia

Proyecto creado para fines educativos.
