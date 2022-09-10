<?php

require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

class Maquinarias
{
	private static $instancia;
	private $db;


	function __construct()
	{
		$this->db = Conexion::singleton_conexion();
	}

	public static function singletonMaquinarias()
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


	public function getMaquinariaTodos()
	{
		//Devolvemos un array de objetos clientes

		try {

			$consulta = "SELECT * FROM maquinaria ORDER BY id ASC";

			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMaquinarias = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMaquinarias

		} catch (Exception $e) {
			echo "Se ha producido un error";
		}

		$tablaMaquinarias = array();
		foreach ($tMaquinarias as $fila) {
			$c = new Maquinaria($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
			array_push($tablaMaquinarias, $c);
		}
		return $tablaMaquinarias;
	}

	public function addMaquinaria($c)
	{
		try {
			$consulta = "INSERT INTO maquinaria (id, id_usuario, equipo, numero_serie, fecha_adquisicion, ubicacion, tipo_mantenimiento, coste_adquisicion, estado, observaciones, ruta_foto) values (null,?,?,?,?,?,?,?,?,?,?)";
			$insertado = false;
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdUsuario());
			@$query->bindParam(2, $c->getEquipo());
			@$query->bindParam(3, $c->getNumeroSerie());
			@$query->bindParam(4, $c->getFechaAdquisicion());
			@$query->bindParam(5, $c->getUbicacion());
			@$query->bindParam(6, $c->getTipoMantenimiento());
			@$query->bindParam(7, $c->getCosteAdquisicion());
			@$query->bindParam(8, $c->getEstado());
			@$query->bindParam(9, $c->getObservaciones());
			@$query->bindParam(10, $c->getRutaFoto());
			$query->execute();

			$insertado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		return $insertado;
	}

	public function getMaquinariasTotal() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT count(id) FROM maquinaria";
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

	

	public function lastId()
	{
		try {
			$consulta = "SELECT id FROM maquinaria ORDER BY id DESC LIMIT 1";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tMaquinarias = $query->fetchAll();

			if (empty($tMaquinarias)) {
				//no hay ninguno
				$numero = 0;
			} else {
				$numero = $tMaquinarias[0][0];
			}
		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function getNomMaquinaria()
	{
		try {
			$consulta = "SELECT id, equipo, numero_serie
			FROM maquinaria";
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
				$servicio = Array(
					$fila[0],
					$fila[1],
					$fila[2]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}

	public function getNomMaquinariaById($id)
	{
		try {
			$consulta = "SELECT equipo, numero_serie
			FROM maquinaria WHERE id like '$id'";
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
				$servicio = Array(
					$fila[0],
					$fila[1]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	}
	

	public function getMaquinaria($id)
	{
		try {

			$consulta = "SELECT * FROM maquinaria WHERE id LIKE '$id'";
			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMaquinaria = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMaquinarias

		} catch (Exception $e) {
			echo "Se ha producido un errro";
		}

		$tablaMaquinarias = array(); //inicializamos la tabla de salida
		foreach ($tMaquinaria as $fila) {
			$u = new Maquinaria($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
			array_push($tablaMaquinarias, $u);
		}

		return $tablaMaquinarias;
	}


	public function updateMaquinaria(Maquinaria $c)
	{
		try {
			$id_maquinaria = $c->getId();
			$consulta = "UPDATE maquinaria SET id_usuario = ?, equipo = ?, numero_serie = ?, fecha_adquisicion = ?, ubicacion = ?, tipo_mantenimiento = ?, coste_adquisicion = ?, estado = ?, observaciones = ?, ruta_foto = ? WHERE id like $id_maquinaria";
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdUsuario());
			@$query->bindParam(2, $c->getEquipo());
			@$query->bindParam(3, $c->getNumeroSerie());
			@$query->bindParam(4, $c->getFechaAdquisicion());
			@$query->bindParam(5, $c->getUbicacion());
			@$query->bindParam(6, $c->getTipoMantenimiento());
			@$query->bindParam(7, $c->getCosteAdquisicion());
			@$query->bindParam(8, $c->getEstado());
			@$query->bindParam(9, $c->getObservaciones());
			@$query->bindParam(10, $c->getRutaFoto());
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}

	public function deleteMaquinaria($id)
	{
		try {
			$consulta = "DELETE FROM maquinaria WHERE id = $id";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}



	public function getNumeroMaquinaria()
	{
		//Devolvemos un número que representa el número de productos que tenemos en la
		try {
			$consulta = "SELECT * FROM maquinaria";

			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMaquinaria = $query->fetchAll();
			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMaquinarias
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		return count($tMaquinaria);
	}

	/* public function getMaquinariasFiltPaisEstado($rec, $mec, $pint, $ent, $pais)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE estado_recogido like '$rec' and estado_mecanizado like '$mec' and estado_pintado like '$pint' and estado_entregado like '$ent' and proveniencia like '$pais' ORDER BY fecha DESC";
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
					$fila[20],
					$fila[21],
					$fila[22],
					$fila[23]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	} */

	/* public function getMaquinariasFiltPaisEstado($rec, $mec, $pint, $ent, $pais)
	{
		try {
			$consulta = "SELECT * FROM llantas WHERE estado_recogido like '$rec' and estado_mecanizado like '$mec' and estado_pintado like '$pint' and estado_entregado like '$ent' and proveniencia like '$pais' ORDER BY fecha DESC";
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
					$fila[20],
					$fila[21],
					$fila[22],
					$fila[23]
				);
				array_push($tablaServicios, $servicio);
			}
		}
		return $tablaServicios;
	} */
}


?>