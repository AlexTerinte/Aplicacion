<?php 

class Llanta{
    
    private $id;
    private $idUsuario;
    private $codImagen;
    private $matricula;
    private $fechaInicio;
    private $horaInicio;
    private $empresa;
    private $unidades;
    private $precio;
    private $operacion;
    private $tipoVehiculo;
    private $tipoDmg;
    private $estado;
    private $fechaFin;
    private $horaFin;
    private $transporteExterno;
    private $transportista;
    private $proveniencia;
    private $observaciones;
    private $importeTotal;
    private $facturado;

    public function __construct($id, $idUsuario, $codImagen, $matricula, $fechaInicio, $horaInicio, $empresa, $unidades, $precio, $operacion, $fechaFin, $horaFin, $tipoVehiculo, $tipoDmg, $estado, $transporteExterno, $transportista, $proveniencia, $observaciones, $importeTotal, $facturado)
	{
		$this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->codImagen = $codImagen;
		$this->fechaInicio = $fechaInicio;
		$this->horaInicio = $horaInicio;
		$this->empresa = $empresa;
        $this->unidades = $unidades;
        $this->precio = $precio;
        $this->operacion = $operacion;
        $this->estado = $estado;
        $this->fechaFin = $fechaFin;
        $this->horaFin = $horaFin;
        $this->transporteExterno = $transporteExterno;
        $this->proveniencia = $proveniencia;
        $this->observaciones = $observaciones;
        $this->tipoVehiculo = $tipoVehiculo;
        $this->tipoDmg = $tipoDmg;
        $this->importeTotal = $importeTotal;
        $this->facturado = $facturado;
        $this->matricula = $matricula;
        $this->transportista = $transportista;
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

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

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
     * Get the value of horaInicio
     */ 
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set the value of horaInicio
     *
     * @return  self
     */ 
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get the value of empresa
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set the value of empresa
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }


    /**
     * Get the value of unidades
     */ 
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set the value of unidades
     *
     * @return  self
     */ 
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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
     * Get the value of horaFin
     */ 
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set the value of horaFin
     *
     * @return  self
     */ 
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

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

        /**
     * Get the value of transporteExterno
     */ 
    public function getTransporteExterno()
    {
        return $this->transporteExterno;
    }

    /**
     * Set the value of transporteExterno
     *
     * @return  self
     */ 
    public function setTransporteExterno($transporteExterno)
    {
        $this->transporteExterno = $transporteExterno;

        return $this;
    }

            /**
     * Get the value of transporteExterno
     */ 
    public function getProveniencia()
    {
        return $this->proveniencia;
    }

    /**
     * Set the value of transporteExterno
     *
     * @return  self
     */ 
    public function setProveniencia($proveniencia)
    {
        $this->proveniencia = $proveniencia;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of operacion
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set the value of operacion
     *
     * @return  self
     */ 
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }


    /**
     * Get the value of tipoVehiculo
     */ 
    public function getTipoVehiculo()
    {
        return $this->tipoVehiculo;
    }

    /**
     * Set the value of tipoVehiculo
     *
     * @return  self
     */ 
    public function setTipoVehiculo($tipoVehiculo)
    {
        $this->tipoVehiculo = $tipoVehiculo;

        return $this;
    }

    /**
     * Get the value of importeTotal
     */ 
    public function getImporteTotal()
    {
        return $this->importeTotal;
    }

    /**
     * Set the value of importeTotal
     *
     * @return  self
     */ 
    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }

    /**
     * Get the value of facturado
     */ 
    public function getFacturado()
    {
        return $this->facturado;
    }

    /**
     * Set the value of facturado
     *
     * @return  self
     */ 
    public function setFacturado($facturado)
    {
        $this->facturado = $facturado;

        return $this;
    }

    /**
     * Get the value of tipoDmg
     */ 
    public function getTipoDmg()
    {
        return $this->tipoDmg;
    }

    /**
     * Set the value of tipoDmg
     *
     * @return  self
     */ 
    public function setTipoDmg($tipoDmg)
    {
        $this->tipoDmg = $tipoDmg;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of transportista
     */ 
    public function getTransportista()
    {
        return $this->transportista;
    }

    /**
     * Set the value of transportista
     *
     * @return  self
     */ 
    public function setTransportista($transportista)
    {
        $this->transportista = $transportista;

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