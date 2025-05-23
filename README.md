# API Aseguradora ficticia

Esta es la capa correspondiente a la api de la aseguradora ficticia.

## Características

* **PHP 8.2**: Desarrollada con la versión 8.2 de PHP.
* **Base de datos MySQL**: Conexión a **MySQL** para almacenamiento y consulta de datos.
* **URLs amigables**: Diseñada para funcionar bajo un servidor **Apache**, aprovechando la reescritura de URLs.

## Requisitos previos

* PHP 8.2 instalado en tu servidor.
* Usar un servidor web **Apache** preferiblemente para gestionar correctamente las URLs.
* Base de datos **MySQL**.

## Instalación

1. Clona o descarga este repositorio en tu servidor.
2. Asegúrate de que **Apache** está configurado para servir la carpeta del proyecto.
3. Verifica que **MySQL** está en ejecución y puedes acceder con credenciales válidas.
4. Descarga el archivo de respaldo `sql/backup-api-ws.sql`.
5. Importa el backup en tu base de datos **MySQL**.
6. Para la correcta integracion con la **API SGA** se requiere configurar un **Virtual Host** para esta api. En el archivo `.conf` de tu servidor **Apache** agregar la configuracion del Virtual Host, ejemplo:
    ```txt
    <VirtualHost *:8083> 
        DocumentRoot "C:/laragon/www/prueba-ga-api-ws"
        ServerName prueba-ga-api-ws.test
        ServerAlias *.prueba-ga-api-ws.test
        <Directory "C:/laragon/www/prueba-ga-api-ws">
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
    ```

    Luego agregar el dominio al archivo `C:\Windows\System32\drivers\etc\hosts` de tu sitema operativo, ejemplo:

    ```txt
    127.0.0.1      prueba-ga-api-ws.test #laragon magic!   
    ```

    Reinicar **Apache** luego de aplicar las configuraciones.

## Configuración

Edita el archivo `config.php` para ajustar los parámetros de conexión a la base de datos:

```php
<?php
// config.php

// Configuración de la base de datos
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'grupo_asistencia');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
```

Asegúrate de que estos valores coinciden con los de tu base de datos **MySQL**.