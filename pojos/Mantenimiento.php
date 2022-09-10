<?php

class Mantenimiento{
    
    private $id;
    private $idMaquinaria;
    private $idUsuario;
    private $fechaInicio;
    private $horasTrabajo;
    private $tipoMantenimiento;
    private $frecuencia;
    private $coste;
    private $fechaFin;
    private $observaciones;
    private $rutaFoto;

    public function __construct($id, $idMaquinaria, $idUsuario, $fechaInicio, $horasTrabajo, $tipoMantenimiento, $frecuencia, $coste, $fechaFin, $observaciones, $rutaFoto)
	{
		$this->id = $id;
        $this->idMaquinaria = $idMaquinaria;
        $this->idUsuario = $idUsuario;
        $this->fechaInicio = $fechaInicio;
        $this->horasTrabajo = $horasTrabajo;
        $this->tipoMantenimiento = $tipoMantenimiento;
        $this->frecuencia = $frecuencia;
        $this->coste = $coste;
        $this->fechaFin = $fechaFin;
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
     * Get the value of idMaquinaria
     */ 
    public function getIdMaquinaria()
    {
        return $this->idMaquinaria;
    }

    /**
     * Set the value of idMaquinaria
     *
     * @return  self
     */ 
    public function setIdMaquinaria($idMaquinaria)
    {
        $this->idMaquinaria = $idMaquinaria;

        return $this;
    }

    /**
     * Get the value of fechaInicio
     */ 
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set the value of fechaInicio
     *
     * @return  self
     */ 
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get the value of horasTrabajo
     */ 
    public function getHorasTrabajo()
    {
        return $this->horasTrabajo;
    }

    /**
     * Set the value of horasTrabajo
     *
     * @return  self
     */ 
    public function setHorasTrabajo($horasTrabajo)
    {
        $this->horasTrabajo = $horasTrabajo;

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
     * Get the value of coste
     */ 
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */ 
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of fechaFin
     */ 
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set the value of fechaFin
     *
     * @return  self
     */ 
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

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
     * Get the value of frecuencia
     */ 
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Set the value of frecuencia
     *
     * @return  self
     */ 
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

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