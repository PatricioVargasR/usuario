<?php
    // Llamada al modelo
   require_once "mvc/models/email_model.php";

   // Verificamos que se haya enviado el email
   if(isset($_POST['enviar'])){

    // Obtenemos el email
    $email = $_POST['email'];

    // Creamos un nuevo objeto llamando a la función correspondiente
    $enviar_email = new email_model();
    $respuesta = $enviar_email->registrar_email($email);

    require_once "mvc/views/index_view.php";
   }