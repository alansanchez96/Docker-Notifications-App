# Notificaciones Websockets Application

## Indice
<a href="#indice"></a>

1. [Introduccion](#introduccion)
1. [Requisitos](#requisitos)
2. [Instalacion](#instalacion)

## Introduccion
<a href="#introduccion"></a>

### Es una aplicacion sencilla a nivel intuitivo en donde la página principal mostrará un glosario de las acciones que se pueden realizar
### Vas a poder realizar operaciones en segundo plano tales como:
### - **Envios de Emails**
### - **Subida de Archivos**
### - **Envio de notificaciones atraves de Websockets**
### Tambien incluye un pequeño CRUD utilizando SoftDeletes
### Y por ultimo tiene un pequeño sistema de autenticación muy sencillo, sin confirmacion de cuentas para agilizar la experiencia de usuario

## Requisitos
<a href="#requisitos"></a>

1) **Requisitos**
    * Docker [Web oficial](https://www.docker.com/)
    * Docker Compose [Web oficial](https://docs.docker.com/compose/install/)

## Instalacion
<a href="#instalacion"></a>

### Los comandos que veras a continuacion se ejecuta en la raiz del proyecto

1) Inicializamos los contenedores de Docker

    ```bash
        $ docker-compose up -d
    ```

2) Otorgamos los permisos al directorio storage y bootstrap

    ```bash
        $ docker exec lv_app chmod -R 777 storage bootstrap/cache
    ```

3) Instalamos las dependencias de Composer

    ```bash
        $ docker exec lv_app composer install
    ```

4) Corremos las migraciones y el seeder

    ```bash
        $ docker exec lv_app php artisan migrate --seed
    ```

5) Añadimos una key a nuestra variable de entorno APP_KEY

    ```bash
        $ docker exec lv_app php artisan key:generate
    ```

4) Ejecutamos los servicios con supervisor
    
    ```bash
        $ docker exec lv_app supervisord -n
    ```

## Disfruta de la aplicación

## Author

[![linkedin-shield-alansanchez]][linkedin-alansanchez-url] [![portfolio]][portfolio-alansanchez] <br>

<p align="right"><a href="#indice">Volver al Indice</a></p>

[portfolio]: https://img.shields.io/badge/-Portfolio-orange?style=for-the-badge&logo=appveyor

[linkedin-shield-alansanchez]: https://img.shields.io/badge/-Alan_Sanchez-black.svg?style=for-the-badge&logo=linkedin&color=0A66C2
[linkedin-alansanchez-url]: https://linkedin.com/in/alansanchez96
[portfolio-alansanchez]: https://dev-alansan.netlify.app/