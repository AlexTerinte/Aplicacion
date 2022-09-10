<?php 

    class ImagenLlanta{
        private $id;
        private $idEmpleado; 
        private $codImagen;
        private $rutaFoto;

        public function __construct($id, $idEmpleado, $codImagen, $rutaFoto)
        {
            $this->id = $id;
            $this->idEmpleado = $idEmpleado;
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
         * Get the value of idEmpleado
         */ 
        public function getIdEmpleado()
        {
                return $this->idEmpleado;
        }

        /**
         * Set the value of idEmpleado
         *
         * @return  self
         */ 
        public function setIdEmpleado($idEmpleado)
        {
                $this->idEmpleado = $idEmpleado;

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
    }

?>