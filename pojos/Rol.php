<?php 

	class Rol {
		private $idRol;
		private $nombre;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $nombre   
	 */
	public function __construct($idRol, $nombre)
	{
		$this->idRol = $idRol;
		$this->nombre = $nombre;
	}

		
    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}

 ?>