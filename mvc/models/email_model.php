<?php

    // Creamos la clase del modelo
    class email_model {

        // Creamos las variables
        private $api_url;
        private $data;

        // Creamos el constructuor
        public function __construct(){
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/enviar_email/";
            $this->data = array();

        }

        // Creamos una función para registrar email
        public function registrar_email($email){

            $mensaje = false;

            // Asignamos el valor al array
            $this->data = array(
                'email'->$email
            );

            $ch = curl_init($this->api_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            curl_close($ch);

            if($response === null){
                echo 'Ocurrió un error';
                $mensaje = false;
            } else {
                $mensaje = true;
            }

            return $mensaje;

        }

    }