<?php 

class Maquinaria{
   
    private $id;
    private $idUsuario;
    private $equipo;
    private $numeroSerie;
    private $fechaAdquisicion;
    private $ubicacion;
    private $tipoMantenimiento;
    private $costeAdquisicion;
    private $estado;
    private $observaciones;
    private $rutaFoto;

    public function __construct($id, $idUsuario, $equipo, $numeroSerie, $fechaAdquisicion, $ubicacion, $tipoMantenimiento, $costeAdquisicion, $estado, $observaciones, $rutaFoto)
	{
		$this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->equipo = $equipo;
        $this->numeroSerie = $numeroSerie;
        $this->fechaAdquisicion = $fechaAdquisicion;
        $this->ubicacion = $ubicacion;
        $this->tipoMantenimiento = $tipoMantenimiento;
        $this->costeAdquisicion = $costeAdquisicion;
        $this->estado = $estado;
        $this->observaciones = $observaciones;
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
     * Get the value of equipo
     */ 
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set the value of equipo
     *
     * @return  self
     */ 
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get the value of numeroSerie
     */ 
    public function getNumeroSerie()
    {
        return $this->numeroSerie;
    }

    /**
     * Set the value of numeroSerie
     *
     * @return  self
     */ 
    public function setNumeroSerie($numeroSerie)
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    /**
     * Get the value of fechaAdquisicion
     */ 
    public function getFechaAdquisicion()
    {
        return $this->fechaAdquisicion;
    }

    /**
     * Set the value of fechaAdquisicion
     *
     * @return  self
     */ 
    public function setFechaAdquisicion($fechaAdquisicion)
    {
        $this->fechaAdquisicion = $fechaAdquisicion;

        return $this;
    }

    /**
     * Get the value of ubicacion
     */ 
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion
     *
     * @return  self
     */ 
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get the value of tipoMantenimiento
     */ 
    public function getTipoMantenimiento()
    {
        return $this->tipoMantenimiento;
    }

    /**
     * Set the value of tipoMantenimiento
     *
     * @return  self
     */ 
    public function setTipoMantenimiento($tipoMantenimiento)
    {
        $this->tipoMantenimiento = $tipoMantenimiento;

        return $this;
    }

    /**
     * Get the value of costeAdquisicion
     */ 
    public function getCosteAdquisicion()
    {
        return $this->costeAdquisicion;
    }

    /**
     * Set the value of costeAdquisicion
     *
     * @return  self
     */ 
    public function setCosteAdquisicion($costeAdquisicion)
    {
        $this->costeAdquisicion = $costeAdquisicion;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}

?>