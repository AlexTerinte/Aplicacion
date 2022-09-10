<?php 

	require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

	class Empleados {
		private static $instancia;
		private $db;
		

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonEmpleados(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}


		//////// programamaos cada una de las funciones que necesitemos
		///// de ataque a la base de datos
		///// CRUD

		/// Vamos a empezar programando una select * from clientes


		public function getEmpleadosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM empleados"; 

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuarios = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaUsuarios = array();
			foreach ($tUsuarios as $fila) {
				$c=new Empleado($fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14],$fila[15], $fila[16]);
				array_push($tablaUsuarios, $c);
			}
			return $tablaUsuarios;
		}

		public function getNumeroClienteMismoId($id) {
			//Retorna el número de clientes con el mismo codPostal
			//que le paso como parámetro
			try {
				$consulta = "SELECT COUNT(id_empleado) FROM empleados "
					. "WHERE id_empleado LIKE '$id'";
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


		// Un método que permita dar de alta a un cliente
		public function addUnEmpleado($c) {
			try {
				$consulta = "INSERT INTO empleados (id_empleado, id_carro, ruta_foto, nombre, direccion, telefono, email, dni_cif, num_ss, talla_pantalon, talla_camiseta, talla_zapato, empresa, contrato, activo, fecha_entrada, fecha_salida) VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$c->getIdCarro());
				@$query->bindParam(2,$c->getRutaFoto());
				@$query->bindParam(3,$c->getNombre());
				@$query->bindParam(4,$c->getDireccion());
				@$query->bindParam(5,$c->getTelefono());
                @$query->bindParam(6,$c->getEmail());
				@$query->bindParam(7,$c->getDniCif());
                @$query->bindParam(8,$c->getNumSS());
                @$query->bindParam(9,$c->getTallaPantalon());
                @$query->bindParam(10,$c->getTallaCamiseta());
                @$query->bindParam(11,$c->getTallaZapato());
                @$query->bindParam(12,$c->getEmpresa());
                @$query->bindParam(13,$c->getContrato());
                @$query->bindParam(14,$c->getActivo());
				@$query->bindParam(15,$c->getFechaEntrada());
				@$query->bindParam(16,$c->getFechaSalida());
				$query->execute();
				$insertado=true;

			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}

		public function lastId() {
			try {
				$consulta = "SELECT id_empleado FROM empleados ORDER BY id_empleado DESC LIMIT 1";
				//echo $consulta;
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tClientes = $query->fetchAll();
	
				if (empty($tClientes)) {
					//no hay ninguno
					$numero = 0;
	
				} else {
					$numero = $tClientes[0][0];
				}
	
			} catch (Exception $ex) {
				$numero = -1;
			}
			//echo $numero;
			return $numero;
			var_dump($numero);
		}

/* 		public function getEmpleado($email, $pass){
			try {
				
				$consulta="SELECT * FROM usuarios WHERE email LIKE '$email' and password like '$pass'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuario = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaUsuarios = array(); //inicializamos la tabla de salida
			foreach ($tUsuario as $fila) {
				$u = new Usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($tablaUsuarios, $u);
			}

			return $tablaUsuarios;
		} */


		public function getEmpleadoById($id)
		{
			try {
				$consulta = "SELECT * FROM empleados "
					. "WHERE id_empleado = '$id'";
				//echo $consulta;
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tUsuario = $query->fetchAll();
			}catch (Exception $e) {
				echo "Se ha producido un error";
			}
			if (empty($tUsuario)){
				$tablaUsuarios = array();
				echo "<h1>ERROR, la direccion no existe</h1>";
			} else {
				$tablaUsuarios = array();
				$u = new Empleado($tUsuario[0][0], $tUsuario[0][1], $tUsuario[0][2], $tUsuario[0][3], $tUsuario[0][4], $tUsuario[0][5], $tUsuario[0][6], $tUsuario[0][7], $tUsuario[0][8], $tUsuario[0][9], $tUsuario[0][10], $tUsuario[0][11], $tUsuario[0][12], $tUsuario[0][13], $tUsuario[0][14], $tUsuario[0][15], $tUsuario[0][16]);
				array_push($tablaUsuarios, $u);
			}
			return $tablaUsuarios;
		}

		public function getEmpleadoByNumSS($numSS)
		{
			try {
				$consulta = "SELECT * FROM empleados "
					. "WHERE num_ss = '$numSS'";
				//echo $consulta;
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tUsuario = $query->fetchAll();
			}catch (Exception $e) {
				echo "Se ha producido un error";
			}
			if (empty($tUsuario)){
				$tablaUsuarios = array();
				echo "<h1>ERROR, la direccion no existe</h1>";
			} else {
				$tablaUsuarios = array();
				$u = new Empleado($tUsuario[0][0], $tUsuario[0][1], $tUsuario[0][2], $tUsuario[0][3], $tUsuario[0][4], $tUsuario[0][5], $tUsuario[0][6], $tUsuario[0][7], $tUsuario[0][8], $tUsuario[0][9], $tUsuario[0][10], $tUsuario[0][11], $tUsuario[0][12], $tUsuario[0][13], $tUsuario[0][14], $tUsuario[0][15], $tUsuario[0][16]);
				array_push($tablaUsuarios, $u);
			}
			return $tablaUsuarios;
		}

		public function updateEmpleado(Empleado $u){
			try{
				$id_empleado = $u->getIdEmpleado();
				$consulta= "UPDATE empleados SET id_carro = ?, ruta_foto = ?, nombre = ?, direccion = ?, telefono = ?, email = ?, dni_cif = ?, num_ss = ?, talla_pantalon = ?, talla_camiseta = ?, talla_zapato = ?, empresa = ?, contrato = ?, activo = ?, fecha_entrada = ?, fecha_salida = ? WHERE id_empleado LIKE '$id_empleado'";
				$query = $this->db->preparar($consulta);
				//echo $consulta;
				@$query->bindParam(1,$u->getIdCarro());
				@$query->bindParam(2,$u->getRutaFoto());
				@$query->bindParam(3,$u->getNombre());
				@$query->bindParam(4,$u->getDireccion());
				@$query->bindParam(5,$u->getTelefono());
                @$query->bindParam(6,$u->getEmail());
				@$query->bindParam(7,$u->getDniCif());
                @$query->bindParam(8,$u->getNumSS());
                @$query->bindParam(9,$u->getTallaPantalon());
                @$query->bindParam(10,$u->getTallaCamiseta());
                @$query->bindParam(11,$u->getTallaZapato());
                @$query->bindParam(12,$u->getEmpresa());
                @$query->bindParam(13,$u->getContrato());
                @$query->bindParam(14,$u->getActivo());
				@$query->bindParam(15,$u->getFechaEntrada());
				@$query->bindParam(16,$u->getFechaSalida());
				$query->execute();
				$actualizado = true;
			} catch (Exception $e)  {
				echo "Se ha producido un error";
				$actualizado = false;
			}
			return $actualizado;
		}

		public function deleteEmpleado($id){
            try{
                $consulta= "DELETE FROM empleados WHERE id_empleado=$id";
                $query = $this->db->preparar($consulta);
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}
	

		public function updateActivo($r){
			$actualizado = false;
		 try{
			 $consulta= "UPDATE empleados SET activo = 0 WHERE id_empledo LIKE '$r'";
			 $query = $this->db->preparar($consulta);
			 $query->execute();
			 $actualizado = true;
		 } catch (Exception $e)  {
			 echo "Se ha producido un error";
			 $actualizado = false;
		 }
		 return $actualizado;
	 }
	}

 ?>