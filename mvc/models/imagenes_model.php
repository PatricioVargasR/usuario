<?php
    class imagenes_model {

        // Declaramos nuestras variables a utilizar
        private $api_url;
        private $imagenes;

        // Creamos el constructor de a clase
        public function __construct() {
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/imagenes";
            $this->imagenes = array();
        }

        // Creamos la función para obtener todas las imagenes
        public function obtener_imagenes(){

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decodificación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->imagenes = $data;
            }

            return $this->imagenes;
        }
    }