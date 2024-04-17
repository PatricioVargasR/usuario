<?php

    // Llamamos al modelo
    require_once "mvc/models/imagenes_model.php";

    // Cremas un nuevo objeto y llamamos la función correspondiente
    $imagenes = new imagenes_model();
    $datos = $imagenes->obtener_imagenes();

    // Llamada a la vista
    require_once "mvc/views/descubrir_view.php";
