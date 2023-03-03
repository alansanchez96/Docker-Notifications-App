### Aplicacion con distintas funcionalidades para demostrar conocimientos avanzados sobre el framework de Laravel

#### Configuracion para entorno local

Cambiar el nombre de .env.example a .env
En el archivo de variables de entorno (.env) ingresar credenciales de email
Puede optar por MailHog, Mailtrap entre otros...

#### Instalacion
Ejecutar en consola
`composer install`
`php artisan key:generate`
`php artisan migrate --seed`

#### Inicializacion
`php artisan serve`