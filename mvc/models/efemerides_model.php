<?php
    class efemerides_model {

        // Declaramos nuestras variables a utilizar
        private $api_url;
        private $efemerides;

        // Creamos el constructor de a clase
        public function __construct() {
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/efemerides";
            $this->efemerides = array();
        }

        // Creamos la función para obtener todas las noticias
        public function obtener_efemerides(){

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decodificación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->efemerides = $data;
            }

            return $this->efemerides;
        }
    }