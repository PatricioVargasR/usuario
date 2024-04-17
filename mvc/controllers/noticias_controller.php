<?php

    // Llamamos al modelo
    require_once "mvc/models/noticias_model.php";
    require_once "mvc/models/categorias_model.php";
    require_once "mvc/models/efemerides_model.php";

    // Cremas un nuevo objeto y llamamos la función correspondiente
    $noticias = new noticias_model();
    $datos = $noticias->obtener_noticias();

    // Creamos un nuevo objeto de curiosidades y llamamos a la función correspondiente
    $curiosidades = new categorias_model();
    $datos_categorias = $curiosidades->obtener_categorias();

    // Creamos un nuevo objeto de curiosidades y llmamamos a la función correspondiente
    $efemerides = new efemerides_model();
    $datos_efemerides = $efemerides->obtener_efemerides();

    // Llamada a la vista
    require_once "mvc/views/noticias_view.php";
