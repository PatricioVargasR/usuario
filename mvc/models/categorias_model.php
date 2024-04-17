<?php
    class categorias_model {

        // Declaramos nuestras variables a utilizar
        private $api_url;
        private $categorias;

        // Creamos el constructor de a clase
        public function __construct() {
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/categorias";
            $this->categorias = array();
        }

        // Creamos la función para obtener todas las noticias
        public function obtener_categorias(){

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decodificación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->categorias = $data;
            }

            return $this->categorias;
        }

        // Creamos la función para obtener una noticia
        public function obtener_informativos($title){

            // Modificamos la apide la consulta
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/buscar_categoria/" . urlencode($title);

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decoficiación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->categorias = $data;
            }

            return $this->categorias;
        }
    }