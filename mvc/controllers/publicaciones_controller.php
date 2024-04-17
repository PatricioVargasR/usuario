<?php

    // Llamada al modelo
    require_once "mvc/models/noticias_model.php";

    // Generamos un array
    $meta_datos[] = array();

    // En caso de que tengamos el valor correspondiente
    if (isset($_GET['title'])){

        // Obtenemos el titulo
        $slug = $_GET['title'];

        // Cremas un nuevo objeto y llamamos la función correspondiente
        $datos_informativos = new noticias_model();
        $datos = $datos_informativos->obtener_noticia_especifica($slug);

        // Verificamos que se reciba una respuesta
        if(count($datos) > 0){

            // Asignamos los datos correspondientes al array creado
            $meta_datos = array(
                'titulo' => $datos[0]['meta_title'],
                'descripcion' => $datos[0]['meta_description'],
                'palabras_clave' => $datos[0]['meta_keyword']
            );

        } else {
            //  En caso de no recibir respuesta asiganmos datos estaticos
            $meta_datos = array(
                'titulo' => 'Página de publicaciones',
                'descripcion' => 'Página de publicaciones del museo del santo',
                'palabras_clave' => 'El santo, Tulancingo de Bravo, Hidalgo, Cultural'
            );
        }
    //  En caso de no recibir tituloi asiganmos datos estaticos
    } else {
        $meta_datos = array(
            'titulo' => 'Página de publicaciones',
            'descripcion' => 'Página de publicaciones del museo del santo',
            'palabras_clave' => 'El santo, Tulancingo de Bravo, Hidalgo, Cultural'
        );
    }

    // Llamamos a la vista
    require_once "mvc/views/publicaciones_view.php";