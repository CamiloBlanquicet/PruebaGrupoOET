# Prueba Tecnica En Laravel

> Laravel sample website with content retrieving from [prismic.io](https://prismic.io)

This project runs with Laravel Framework 9.18.0.

## Empecemos

Debe tener instalado en su maquina lo siguiente: PHP (>= 8.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# Instalar Dependencias
composer install
npm install

# Generar la llave o Key que utiliza la aplicación
php artisan key:generate

# Construir CSS y JS con node 
npm run dev
```
## Base de datos

Debe crear una base de datos en Mysql con el nombre "pruebatecnica" y ejecutar las migraciones

``` bash
php artisan migrate
```

En caso tal de que las migraciones hayan devuelto un error, tambien se adjuntara un archivo con el Script para crear la base de datos.

## Correr Servidor

Una ves haya realizado todos los pasos correctamente ya puede correr el siguiente comando para lanzar o correr el servidor local.

``` bash
php artisan migrate
```

¡El proyecto de muestra de Laravel ahora está en funcionamiento! Acceda a él en http://localhost:8000.

## Quedo Atento

Quedo a la espera del resultado de la prueba, espero les guste y podamos trabajar juntos, coordial Saludo
