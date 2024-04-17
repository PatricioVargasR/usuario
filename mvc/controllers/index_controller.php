<?php

    // Llamamos al modelo
    require_once "mvc/models/noticias_model.php";
    require_once "mvc/models/curiosidades_model.php";

    // Cremas un nuevo objeto y llamamos la función correspondiente
    $noticias = new noticias_model();
    $datos = $noticias->obtener_noticias();

    // Creamos un nuevo objeto de curiosidades y llmamamos a la función correspondiente
    $curiosidades = new curiosidades_model();
    $datos_curiosidades = $curiosidades->obtener_curiosidades();

    // Llamada a la vista
    require_once "mvc/views/index_view.php";
