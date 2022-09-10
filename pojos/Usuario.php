<?php 

	class Usuario {
		private $idUsuario;
        private $idRol;
        private $email;
        private $nombreCompleto;
		private $password;
		private $activo;

	/**
	 * Class Constructor
	 * @param    $id    
	 * @param    $email   
	 * @param    $password   
	 * @param    $activo   
	 */
	public function __construct($idUsuario, $idRol, $email, $nombreCompleto, $password, $activo)
	{
		$this->idUsuario = $idUsuario;
        $this->idRol = $idRol;
		$this->email = $email;
        $this->nombreCompleto = $nombreCompleto;
		$this->password = $password;
		$this->activo = $activo;
	}
	
    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     *
     * @return self
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }


        public function getIdRol()
        {
                return $this->idRol;
        }

        /**
         * Set the value of idRol
         *
         * @return  self
         */ 
        public function setIdRol($idRol)
        {
                $this->idRol = $idRol;

                return $this;
        }

        /**
         * Get the value of nombreCompleto
         */ 
        public function getNombreCompleto()
        {
                return $this->nombreCompleto;
        }

        /**
         * Set the value of nombreCompleto
         *
         * @return  self
         */ 
        public function setNombreCompleto($nombreCompleto)
        {
                $this->nombreCompleto = $nombreCompleto;

                return $this;
        }
}
