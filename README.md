# Proyecto_Integrador_I
En este respositorio se almacena el módulo de usuario del proyecto integrador realizado en tercer cuatrimestre
siendo nuevamente retomado en el presente quinto cuatrimestre

## Colaboradores
* Desarrollador: [Janneth Santos](https://github.com/jannethsm31)
* Desarrollador: [Jose David](https://github.com/JoseDavidEsquivel)

# Instalación

* ## Descarga
Clona este repositorio en la carpeta htdocs para poder ser visualizado en el empaquetador de aplicaciones
XAMPP utilizando Apache como servidor.
```
https://github.com/PatricioVargasR/usuario.git
```

* ## Configuración de los archivos
Una vez descargado, verifica el que el nombre de la carpeta es *usuario*, esto para evitar conflictos con el archivo *config.php* ubicado
en la ruta *usuario/mvc/views/includes/* puesto a que este archivo se encarga de colocar una URL base en ciertos elementos, si deseas modificar esto, basta con modificar la siguiente línea del archivo:
```php
<?php

    function base_url($slug){
        // Línea a modificar, puedes cambiar después cambiar el nombre de "dash" acorde al nombre de tu carpeta
        echo 'http://localhost/usuario/'.$slug;
    }
?>

```

* ## Configuración de la base de datos
Este proyecto utiliza una base de datos para almacenar desde las publicaciones de la página así como los usuarios administrados, actualmente funciona utilizando API's utilizando el servicio
de Heroku, se puede verificar los archivos del módelo para cambiar dichas URL's en caso de tener su propio servicio
_
Con las configuraciones anteriormente puestas, el proyecto debería de funcionar sin problemas, en caso de surgir un incoveniente, reportarlo.

## Estructura del proyecto
```bash
├── 404.php
├── acerca.php
├── categorias.php
├── descubrir.php
├── hoteles.php
├── index.php
├── mvc
│   ├── assets
│   │   ├── css
│   │   │   ├── bootstrap5.min.css
│   │   │   ├── custom.css
│   │   │   └── style.css
│   │   ├── img
│   │   │   ├── 65054.jpg
│   │   │   └── logo.jpg
│   │   └── js
│   │       ├── bootstrap5.min.js
│   │       ├── jquery.min.js
│   │       ├── script.js
│   │       └── scripts.js
│   ├── controllers
│   │   ├── acerca_controller.php
│   │   ├── categoria_controller.php
│   │   ├── descubrir_controller.php
│   │   ├── email_controller.php
│   │   ├── hoteles_controller.php
│   │   ├── index_controller.php
│   │   ├── noticias_controller.php
│   │   ├── publicaciones_controller.php
│   │   ├── recorrido_controller.php
│   │   ├── restaurantes_controller.php
│   │   └── visitas_controller.php
│   ├── models
│   │   ├── categorias_model.php
│   │   ├── curiosidades_model.php
│   │   ├── efemerides_model.php
│   │   ├── email_model.php
│   │   ├── imagenes_model.php
│   │   └── noticias_model.php
│   ├── uploads
│   │   └── posts
│   │       ├── Cineteca.jpg
│   │       ├── Datos.jpg
│   │       ├── Ejemplos2.jpg
│   │       ├── Ejemplos.jpg
│   │       ├── Entretenimiento.jpg
│   │       ├── exhibicion13.jpeg
│   │       ├── exhibicion1.jpeg
│   │       ├── exhibicion2.jpeg
│   │       ├── exhibicion_video.jpg
│   │       ├── Ferrocarril.jpg
│   │       ├── Hoteles.jpg
│   │       ├── Noticia.jpg
│   │       ├── Restaurante.jpg
│   │       └── Tulancingo.jpg
│   └── views
│       ├── acerca_view.php
│       ├── categoria_view.php
│       ├── descubrir_view.php
│       ├── hoteles_view.php
│       ├── includes
│       │   ├── config.php
│       │   ├── footer.php
│       │   ├── header.php
│       │   └── navbar.php
│       ├── index_view.php
│       ├── noticias_view.php
│       ├── publicaciones_view.php
│       ├── recorrido_view.php
│       ├── restaurantes_view.php
│       └── visitas_view.php
├── noticias.php
├── publicaciones.php
├── recorrido.php
├── restaurantes.php
└── visitas.php

12 directories, 65 files
```
