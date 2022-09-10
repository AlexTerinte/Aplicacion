<?php

require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

class MantenimientoMaquinaria
{
    private static $instancia;
    private $db;

    function __construct()
    {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonMantenimientoMaquinaria()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia; //this->$instancia

    }

	public function getMantenimientoTodos()
	{
		//Devolvemos un array de objetos clientes

		try {

			$consulta = "SELECT * FROM mantenimiento_maquinaria ORDER BY fecha_inicio DESC";

			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMantenimientos = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMantenimientos

		} catch (Exception $e) {
			echo "Se ha producido un error";
		}

		$tablaMantenimientos = array();
		foreach ($tMantenimientos as $fila) {
			$c = new Mantenimiento($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
			array_push($tablaMantenimientos, $c);
		}
		return $tablaMantenimientos;
	}

	public function addMantenimiento($c)
	{
		try {
			$consulta = "INSERT INTO mantenimiento_maquinaria (id_mantenimiento, id_maquinaria, id_usuario, fecha_inicio, horas_trabajo, tipo_mantenimiento, frecuencia, coste, fecha_fin, observaciones, ruta_foto) values (null,?,?,?,?,?,?,?,?,?,?)";
			$insertado = false;
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdMaquinaria());
			@$query->bindParam(2, $c->getIdUsuario());
			@$query->bindParam(3, $c->getFechaInicio());
			@$query->bindParam(4, $c->getHorasTrabajo());
			@$query->bindParam(5, $c->getTipoMantenimiento());
			@$query->bindParam(6, $c->getFrecuencia());
			@$query->bindParam(7, $c->getCoste());
			@$query->bindParam(8, $c->getFechaFin());
			@$query->bindParam(9, $c->getObservaciones());
			@$query->bindParam(10, $c->getRutaFoto());
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
			$consulta = "SELECT id FROM mantenimiento_maquinaria ORDER BY id DESC LIMIT 1";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tMantenimientos = $query->fetchAll();

			if (empty($tMantenimientos)) {
				//no hay ninguno
				$numero = 0;
			} else {
				$numero = $tMantenimientos[0][0];
			}
		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function getMantenimiento($id)
	{
		try {

			$consulta = "SELECT * FROM mantenimiento_maquinaria WHERE id_maquinaria LIKE '$id'";
			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMaquinaria = $query->fetchAll();

			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMantenimientos

		} catch (Exception $e) {
			echo "Se ha producido un errro";
		}

		$tablaMantenimientos = array(); //inicializamos la tabla de salida
		foreach ($tMaquinaria as $fila) {
			$u = new Mantenimiento($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
			array_push($tablaMantenimientos, $u);
		}

		return $tablaMantenimientos;
	}

	public function getCostePreventivo() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT sum(coste) FROM mantenimiento_maquinaria WHERE tipo_mantenimiento like 'Preventivo'";
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
	public function getCosteCorrectivo() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT sum(coste) FROM mantenimiento_maquinaria WHERE tipo_mantenimiento like 'Correctivo'";
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

	public function getMantenimientosTotal() {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT count(id_mantenimiento) FROM mantenimiento_maquinaria";
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


	public function updateMantenimiento(Mantenimiento $c)
	{
		try {
			$id_maquinaria = $c->getId();
			$consulta = "UPDATE mantenimiento_maquinaria SET id_maquinaria = ?, id_usuario = ?, fecha_inicio = ?, horas_trabajo = ?, tipo_mantenimiento = ?, frecuencia = ?, coste = ?,  fecha_fin = ?, observaciones = ?, ruta_foto = ? WHERE id like $id_maquinaria";
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $c->getIdMaquinaria());
			@$query->bindParam(2, $c->getIdUsuario());
			@$query->bindParam(3, $c->getFechaInicio());
			@$query->bindParam(4, $c->getHorasTrabajo());
			@$query->bindParam(5, $c->getTipoMantenimiento());
			@$query->bindParam(6, $c->getFrecuencia());
			@$query->bindParam(7, $c->getCoste());
			@$query->bindParam(8, $c->getFechaFin());
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

	public function deleteMantenimiento($id)
	{
		try {
			$consulta = "DELETE FROM mantenimiento_maquinaria WHERE id = $id";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$actualizado = true;
		} catch (Exception $e) {
			echo "Se ha producido un error";
			$actualizado = false;
		}
		return $actualizado;
	}



	public function getNumeroMantenimiento()
	{
		//Devolvemos un número que representa el número de productos que tenemos en la
		try {
			$consulta = "SELECT * FROM mantenimiento_maquinaria";

			$query = $this->db->preparar($consulta);
			$query->execute();

			$tMaquinaria = $query->fetchAll();
			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tMantenimientos
		} catch (Exception $e) {
			echo "Se ha producido un error";
		}
		return count($tMaquinaria);
	}
}
