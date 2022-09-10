<?php 

    class ImagenLlanta{
        private $id;
        private $idUsuario;
        private $idLlanta; 
        private $codImagen;
        private $rutaFoto;

        public function __construct($id, $idUsuario, $idLlanta, $codImagen, $rutaFoto)
        {
            $this->id = $id;
            $this->idUsuario = $idUsuario;
            $this->idLlanta = $idLlanta;
            $this->codImagen = $codImagen;
            $this->rutaFoto = $rutaFoto;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of idLlanta
         */ 
        public function getIdLlanta()
        {
                return $this->idLlanta;
        }

        /**
         * Set the value of idLlanta
         *
         * @return  self
         */ 
        public function setIdLlanta($idLlanta)
        {
                $this->idLlanta = $idLlanta;

                return $this;
        }

        /**
         * Get the value of rutaFoto
         */ 
        public function getRutaFoto()
        {
                return $this->rutaFoto;
        }

        /**
         * Set the value of rutaFoto
         *
         * @return  self
         */ 
        public function setRutaFoto($rutaFoto)
        {
                $this->rutaFoto = $rutaFoto;

                return $this;
        }

        /**
         * Get the value of codImagen
         */ 
        public function getCodImagen()
        {
                return $this->codImagen;
        }

        /**
         * Set the value of codImagen
         *
         * @return  self
         */ 
        public function setCodImagen($codImagen)
        {
                $this->codImagen = $codImagen;

                return $this;
        }
    }

?>