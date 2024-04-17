<?php
    class curiosidades_model {

        // Declaramos nuestras variables a utilizar
        private $api_url;
        private $curiosidades;

        // Creamos el constructor de a clase
        public function __construct() {
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/curiosidades";
            $this->curiosidades = array();
        }

        // Creamos la función para obtener todas las curiosidades
        public function obtener_curiosidades(){

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decodificación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->curiosidades = $data;
            }

            return $this->curiosidades;
        }
    }