<?php
    class noticias_model {

        // Declaramos nuestras variables a utilizar
        private $api_url;
        private $noticias;

        // Creamos el constructor de a clase
        public function __construct() {
            // Generamos la URL de la API así como el Array a guardar los datos
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/posts";
            $this->noticias = array();
        }

        // Creamos la función para obtener todas las noticias
        public function obtener_noticias(){

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);


            // Verificamos que la decodificación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->noticias = $data;
            }

            return $this->noticias;
        }

        // Creamos la función para obtener todas las noticias relacionadas
        public function obtener_noticias_slug($categoria_id){

            // Modificamos la apide la consulta
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/buscar_post_categoria/" . urlencode($categoria_id);

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decoficiación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->noticias = $data;
            }

            return $this->noticias;
        }

        // Creamos la función para obtener todas las noticias relacionadas
        public function obtener_noticia_especifica($slug){

            // Modificamos la apide la consulta
            $this->api_url = "https://apiusuario-e595e779a035.herokuapp.com/buscar_post/" . urlencode($slug);

            // Realizamos la petición a la API
            $response = file_get_contents($this->api_url);

            // Decodificamos la respuesta
            $data = json_decode($response, true);

            // Verificamos que la decoficiación fuera exitosa
            if($data === null){
                echo 'Ocurrió un error';
            } else {
                $this->noticias = $data;
            }

            return $this->noticias;
        }
    }