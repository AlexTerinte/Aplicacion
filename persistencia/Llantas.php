<?php

require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

class Llantas
{
	private static $instancia;
	private $db;


	function __construct()
	{
		$this->db = Conexion::singleton_conexion();
	}

	public static function singletonLlantas()
	{
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia; //this->$instancia

	}


	//////// programamaos cada una de las funciones que necesitemos
	///// de ataque a la base de datos
	///// CRUD

	/// Vamos a empezar programando una select * from clientes


	public function getLlantasTodos()
	{
		//Devolvemos un array de objetos clientes

		try {

			$consulta = "SELECT * FROM llantas where estado != 'Entregado' and estado != 'Cancelado' ORDER BY fecha DESC";

			$query = $this->db->preparar($consulta);
			$query->execute();

			$tLlantas = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tLlantas

		} catch (Exception $e) {
			echo "Se ha producido un error";
		}

		$tablaLlantas = array();
		foreach ($tLlantas as $fila) {
			$c = new Llanta($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12], $fila[13], $fila[14], $fila[15], $fila[16], $fila[17], $fila[18], $fila[19], $fila[20]);
			array_push($tablaLlantas, $c);
		}
		return $tablaLlantas;
	}
	
			public function getNumeroLlantasByFilt($fechaEntrada, $fechaSalida, $pais) {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT sum(unidades) FROM llantas "
				. "WHERE (fecha >= '$fechaEntrada' and fecha_fin <= '$fechaSalida') and proveniencia like '$pais'";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tUsuarios = $query->fetchAll();

			if (empty($tUsuarios)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tUsuarios[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function addLlanta($c)
	{
		try {
			$consulta = "INSERT INTO llantas (id, id_usuario, cod_imagenes, matricula, fecha, hora, empresa, unidades, precio, operacion, fecha_fin, hora_fin, tipo_vehiculo, tipo_dmg, estado, transporte_externo, transportista, proveniencia, observaciones, importe_total, facturado) values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$insertado = false;
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdUsuario());
			@$query->bindParam(2, $c->getCodImagen());
			@$query->bindParam(3, $c->getMatricula());
			@$query->bindParam(4, $c->getFechaInicio());
			@$query->bindParam(5, $c->getHoraInicio());
			@$query->bindParam(6, $c->getEmpresa());
			@$query->bindParam(7, $c->getUnidades());
			@$query->bindParam(8, $c->getPrecio());
			@$query->bindParam(9, $c->getOperacion());
			@$query->bindParam(10, $c->getFechaFin());
			@$query->bindParam(11, $c->getHoraFin());
			@$query->bindParam(12, $c->getTipoVehiculo());
			@$query->bindParam(13, $c->getTipoDmg());
			@$query->bindParam(14, $c->getEstado());
			@$query->bindParam(15, $c->getTransporteExterno());
			@$query->bindParam(16, $c->getTransportista());
			@$query->bindParam(17, $c->getProveniencia());
			@$query->bindParam(18, $c->getObservaciones());
			@$query->bindParam(19, $c->getImporteTotal());
			@$query->bindParam(20, $c->getFacturado());
			$query->execute();

			$insertado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		return $insertado;
	}

	public function lastId()
	{
		try {
			$consulta = "SELECT id FROM llantas ORDER BY id DESC LIMIT 1";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tLlantas = $query->fetchAll();

			if (empty($tLlantas)) {
				//no hay ninguno
				$numero = 0;
			} else {
				$numero = $tLlantas[0][0];
			}
		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}
	
		public function getMediaLlantasTotal() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT AVG(
				TIMESTAMPDIFF(DAY, fecha, fecha_fin) +
				DATEDIFF(
				  fecha_fin,
				  fecha + INTERVAL
					TIMESTAMPDIFF(DAY, fecha, fecha_fin)
				  DAY
				) /
				DATEDIFF(
				  fecha + INTERVAL
					TIMESTAMPDIFF(DAY, fecha, fecha_fin) + 1
				  DAY,
				  fecha + INTERVAL
					TIMESTAMPDIFF(DAY, fecha, fecha_fin)
				  DAY
				)) FROM llantas WHERE fecha_fin is not null";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tUsuarios = $query->fetchAll();

			if (empty($tUsuarios)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tUsuarios[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}
	
	public function getLlantaByMat($matricula)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE matricula like '%".$matricula."%' ORDER BY fecha DESC";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tServicio = $query->fetchAll();
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		if (empty($tServicio)) {
			$tablaServicios = array();
		} else {
			$tablaServicios = array();
			foreach ($tServicio as $fila) {
				$servicio = array(
					$fila[0],
					$fila[1],
					$fila[2],
					$fila[3],
					$fila[4],
					$fila[5],
					$fila[6],
					$fila[7],
					$fila[8],
					$fila[9],
					$fila[10],
					$fila[11],
					$fila[12],
					$fila[13],
					$fila[14],
					$fila[15],
					$fila[16],
					$fila[17],
					$fila[18],
					$fila[19],
					$fila[20]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}


	public function getLlanta($id)
	{
		try {

			$consulta = "SELECT * FROM llantas WHERE id LIKE '$id'";
			$query = $this->db->preparar($consulta);
			$query->execute();

			$tLlanta = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tLlantas

		} catch (Exception $e) {
			echo "Se ha producido un errro";
		}

		$tablaLlantas = array(); //inicializamos la tabla de salida
		foreach ($tLlanta as $fila) {
			$u = new Llanta($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12], $fila[13], $fila[14], $fila[15], $fila[16], $fila[17], $fila[18], $fila[19], $fila[20]);
			array_push($tablaLlantas, $u);
		}

		return $tablaLlantas;
	}


	public function updateLlanta(Llanta $c)
	{
		try {
			$id_llanta = $c->getId();
			echo $id_llanta;
			$consulta = "UPDATE llantas SET id_usuario = ?, cod_imagenes = ?, matricula = ?, fecha = ?, hora = ?, empresa = ?, unidades = ?, precio = ?, operacion = ?, fecha_fin = ?, hora_fin = ?, tipo_vehiculo = ?, tipo_dmg = ?, estado = ?, transporte_externo = ?, transportista = ?, proveniencia = ?, observaciones = ?, importe_total = ?, facturado = ? WHERE id like '$id_llanta'";
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdUsuario());
			@$query->bindParam(2, $c->getCodImagen());
			@$query->bindParam(3, $c->getMatricula());
			@$query->bindParam(4, $c->getFechaInicio());
			@$query->bindParam(5, $c->getHoraInicio());
			@$query->bindParam(6, $c->getEmpresa());
			@$query->bindParam(7, $c->getUnidades());
			@$query->bindParam(8, $c->getPrecio());
			@$query->bindParam(9, $c->getOperacion());
			@$query->bindParam(10, $c->getFechaFin());
			@$query->bindParam(11, $c->getHoraFin());
			@$query->bindParam(12, $c->getTipoVehiculo());
			@$query->bindParam(13, $c->getTipoDmg());
			@$query->bindParam(14, $c->getEstado());
			@$query->bindParam(15, $c->getTransporteExterno());
			@$query->bindParam(16, $c->getTransportista());
			@$query->bindParam(17, $c->getProveniencia());
			@$query->bindParam(18, $c->getObservaciones());
			@$query->bindParam(19, $c->getImporteTotal());
			@$query->bindParam(20, $c->getFacturado());
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}

	public function updateCodImagen($id)
	{
		try {
			$consulta = "UPDATE llantas SET cod_imagenes = null WHERE id like $id";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}

	public function deleteLlanta($id)
	{
		try {
			$consulta = "DELETE FROM llantas WHERE id=$id";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}



	public function getNumeroLlantas() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT sum(unidades) FROM llantas "
				. "WHERE facturado LIKE 'Si'";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tUsuarios = $query->fetchAll();

			if (empty($tUsuarios)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tUsuarios[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function getImporteTotalLlantas() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT SUM(importe_total) FROM llantas";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tUsuarios = $query->fetchAll();

			if (empty($tUsuarios)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tUsuarios[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function getNumeroLlantasSinFacturar() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT sum(unidades) FROM llantas "
				. "WHERE facturado LIKE 'No'";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tUsuarios = $query->fetchAll();

			if (empty($tUsuarios)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tUsuarios[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	

	public function getLlantasFiltEstado($estado)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE estado like '$estado' ORDER BY fecha DESC";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tServicio = $query->fetchAll();
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		if (empty($tServicio)) {
			$tablaServicios = array();
		} else {
			$tablaServicios = array();
			foreach ($tServicio as $fila) {
				$servicio = array(
					$fila[0],
					$fila[1],
					$fila[2],
					$fila[3],
					$fila[4],
					$fila[5],
					$fila[6],
					$fila[7],
					$fila[8],
					$fila[9],
					$fila[10],
					$fila[11],
					$fila[12],
					$fila[13],
					$fila[14],
					$fila[15],
					$fila[16],
					$fila[17],
					$fila[18],
					$fila[19],
					$fila[20]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}

	public function getLlantasFiltPais($pais)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE proveniencia like '$pais' ORDER BY fecha DESC";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tServicio = $query->fetchAll();
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		if (empty($tServicio)) {
			$tablaServicios = array();
		} else {
			$tablaServicios = array();
			foreach ($tServicio as $fila) {
				$servicio = array(
					$fila[0],
					$fila[1],
					$fila[2],
					$fila[3],
					$fila[4],
					$fila[5],
					$fila[6],
					$fila[7],
					$fila[8],
					$fila[9],
					$fila[10],
					$fila[11],
					$fila[12],
					$fila[13],
					$fila[14],
					$fila[15],
					$fila[16],
					$fila[17],
					$fila[18],
					$fila[19],
					$fila[20]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}

	public function getLlantasFiltPaisEstado($estado, $pais)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE estado like '$estado' and proveniencia like '$pais' ORDER BY fecha DESC";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tServicio = $query->fetchAll();
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		if (empty($tServicio)) {
			$tablaServicios = array();
		} else {
			$tablaServicios = array();
			foreach ($tServicio as $fila) {
				$servicio = array(
					$fila[0],
					$fila[1],
					$fila[2],
					$fila[3],
					$fila[4],
					$fila[5],
					$fila[6],
					$fila[7],
					$fila[8],
					$fila[9],
					$fila[10],
					$fila[11],
					$fila[12],
					$fila[13],
					$fila[14],
					$fila[15],
					$fila[16],
					$fila[17],
					$fila[18],
					$fila[19],
					$fila[20]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}
}


?>