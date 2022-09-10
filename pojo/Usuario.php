<?php

class Usuario{
    
    private $id;
    private $nombre;
    private $password;
    private $activo;

    public function __construct($id, $nombre, $password, $activo)
	{
		$this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->activo = $activo;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    
}

?>