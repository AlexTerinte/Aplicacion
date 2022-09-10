<?php 

class Empleado{
   
    private $idEmpleado;
    private $idCarro;
    private $rutaFoto;
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $dniCif;
    private $numSS;
    private $tallaPantalon;
    private $tallaCamiseta;
    private $tallaZapato;
    private $empresa;
    private $contrato;
    private $activo;
    private $fechaEntrada; 
    private $fechaSalida;

    public function __construct($idEmpleado, $idCarro, $rutaFoto, $nombre, $direccion, $telefono, $email, $dniCif, $numeroSS, $tallaPantalon, $tallaCamiseta, $tallaZapato, $empresa, $contrato, $activo, $fechaEntrada, $fechaSalida)
	{
        $this->idEmpleado = $idEmpleado;
        $this->idCarro = $idCarro;
        $this->rutaFoto = $rutaFoto;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->dniCif = $dniCif;
        $this->numeroSS = $numeroSS;
        $this->tallaPantalon = $tallaPantalon;
        $this->tallaCamiseta = $tallaCamiseta;
        $this->tallaZapato = $tallaZapato;
        $this->empresa = $empresa;
        $this->contrato = $contrato;
        $this->activo = $activo;
        $this->fechaEntrada = $fechaEntrada;
        $this->fechaSalida = $fechaSalida;
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
     * Get the value of idCarro
     */ 
    public function getIdCarro()
    {
        return $this->idCarro;
    }

    /**
     * Set the value of idCarro
     *
     * @return  self
     */ 
    public function setIdCarro($idCarro)
    {
        $this->idCarro = $idCarro;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of numSS
     */ 
    public function getNumSS()
    {
        return $this->numSS;
    }

    /**
     * Set the value of numSS
     *
     * @return  self
     */ 
    public function setNumSS($numSS)
    {
        $this->numSS = $numSS;

        return $this;
    }

    /**
     * Get the value of tallaPantalon
     */ 
    public function getTallaPantalon()
    {
        return $this->tallaPantalon;
    }

    /**
     * Set the value of tallaPantalon
     *
     * @return  self
     */ 
    public function setTallaPantalon($tallaPantalon)
    {
        $this->tallaPantalon = $tallaPantalon;

        return $this;
    }

    /**
     * Get the value of tallaCamiseta
     */ 
    public function getTallaCamiseta()
    {
        return $this->tallaCamiseta;
    }

    /**
     * Set the value of tallaCamiseta
     *
     * @return  self
     */ 
    public function setTallaCamiseta($tallaCamiseta)
    {
        $this->tallaCamiseta = $tallaCamiseta;

        return $this;
    }

    /**
     * Get the value of tallaZapato
     */ 
    public function getTallaZapato()
    {
        return $this->tallaZapato;
    }

    /**
     * Set the value of tallaZapato
     *
     * @return  self
     */ 
    public function setTallaZapato($tallaZapato)
    {
        $this->tallaZapato = $tallaZapato;

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
     * Get the value of contrato
     */ 
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set the value of contrato
     *
     * @return  self
     */ 
    public function setContrato($contrato)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

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
     * Get the value of fechaEntrada
     */ 
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    /**
     * Set the value of fechaEntrada
     *
     * @return  self
     */ 
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;

        return $this;
    }

    /**
     * Get the value of fechaSalida
     */ 
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set the value of fechaSalida
     *
     * @return  self
     */ 
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    /**
     * Get the value of dniCif
     */ 
    public function getDniCif()
    {
        return $this->dniCif;
    }

    /**
     * Set the value of dniCif
     *
     * @return  self
     */ 
    public function setDniCif($dniCif)
    {
        $this->dniCif = $dniCif;

        return $this;
    }
}

?>