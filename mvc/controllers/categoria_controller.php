<?php

    // Llamada al modelo
    require_once "mvc/models/categorias_model.php";
    require_once "mvc/models/noticias_model.php";

    // Generamos un array
    $meta_datos[] = array();

    // En caso de que tengamos el valor correspondiente
    if (isset($_GET['title'])){

        // Obtenemos el titulo
        $slug = $_GET['title'];

        // Cremas un nuevo objeto y llamamos la función correspondiente
        $datos_informativos = new categorias_model();
        $datos = $datos_informativos->obtener_informativos($slug);


        // Verificamos que se reciba una respuesta
        if(count($datos) > 0){

            // Asignamos los datos correspondientes al array creado
            $meta_datos = array(
                'titulo' => $datos[0]['meta_title'],
                'descripcion' => $datos[0]['meta_description'],
                'palabras_clave' => $datos[0]['meta_keywords']
            );

            // Obtenemos el id de la categoria
            $category_id = $datos[0]['_id'];

            if ($category_id) {
                // Generamos una nuevo objeto de noticias y llamamos a la función
                $datos_noticia = new noticias_model();
                $datos_enviar = $datos_noticia->obtener_noticias_slug($category_id);
            }

        } else {
            //  En caso de no recibir respuesta asiganmos datos estaticos
            $meta_datos = array(
                'titulo' => 'Página de categorias',
                'descripcion' => 'Página de categorias del museo del santo',
                'palabras_clave' => 'El santo, Tulancingo de Bravo, Hidalgo, Cultural'
            );
        }
    //  En caso de no recibir tituloi asiganmos datos estaticos
    } else {
        $meta_datos = array(
            'titulo' => 'Página de categorias',
            'descripcion' => 'Página de categorias del museo del santo',
            'palabras_clave' => 'El santo, Tulancingo de Bravo, Hidalgo, Cultural'
        );
    }

    // Llamamos a la vista
    require_once "mvc/views/categoria_view.php";