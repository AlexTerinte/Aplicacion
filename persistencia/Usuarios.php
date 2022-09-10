<?php 

    require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

	class Usuarios {
		private static $instancia;
		private $db;
		

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonUsuarios(){
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


		public function getUsuariosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM usuarios"; 

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
				$c=new Usuario($fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($tablaUsuarios, $c);
			}
			return $tablaUsuarios;
		}

		public function getNumeroClienteMismoId($id) {
			//Retorna el número de clientes con el mismo codPostal
			//que le paso como parámetro
			try {
				$consulta = "SELECT COUNT(id) FROM usuarios "
					. "WHERE id LIKE '$id'";
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
		public function addUnUsuario($c) {
			try {
				$consulta = "INSERT INTO usuarios (id_usuario, id_rol, email, nombre_completo, password, activo) VALUES (null,?,?,?,?,?)";

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$c->getIdRol());
				@$query->bindParam(2,$c->getEmail());
				@$query->bindParam(3,$c->getNombreCompleto());
				@$query->bindParam(4,$c->getPassword());
				@$query->bindParam(5,$c->getActivo());

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
				$consulta = "SELECT id FROM usuarios ORDER BY id_usuario DESC LIMIT 1";
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

		public function getUsuario($email, $pass){
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
		}


		public function getUsuarioById($id)
		{
			try {
				$consulta = "SELECT * FROM usuarios "
					. "WHERE id_usuario = '$id'";
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
				$u = new Usuario($tUsuario[0][0], $tUsuario[0][1], $tUsuario[0][2], $tUsuario[0][3], $tUsuario[0][4], $tUsuario[0][5]);
				array_push($tablaUsuarios, $u);
			}
			return $tablaUsuarios;
		}

		public function getUsuarioByEmail($email)
		{
			try {
				$consulta = "SELECT * FROM usuarios "
					. "WHERE email = '$email'";
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
				$u = new Usuario($tUsuario[0][0], $tUsuario[0][1], $tUsuario[0][2], $tUsuario[0][3], $tUsuario[0][4], $tUsuario[0][5]);
				array_push($tablaUsuarios, $u);
			}
			return $tablaUsuarios;
		}

		public function updateUsuario(Usuario $u){
			try{
				$id_cliente = $u->getIdUsuario();
				$consulta= "UPDATE usuarios SET id_rol = ?, email = ?, nombre_completo = ?, password = ?, activo = ? WHERE id LIKE '$id_cliente'";
				$query = $this->db->preparar($consulta);
				//echo $consulta;
				@$query->bindParam(1,$u->getIdRol());
				@$query->bindParam(2,$u->getEmail());
				@$query->bindParam(3,$u->getNombreCompleto());
				@$query->bindParam(4,$u->getPassword());
				@$query->bindParam(5,$u->getActivo());
				$query->execute();
				$actualizado = true;
			} catch (Exception $e)  {
				echo "Se ha producido un error";
				$actualizado = false;
			}
			return $actualizado;
		}

		public function deleteUser($id){
            try{
                $consulta= "DELETE FROM usuarios WHERE id=$id";
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
			 $consulta= "UPDATE usuarios SET activo = 0 WHERE id LIKE '$r'";
			 $query = $this->db->preparar($consulta);
			 $query->execute();
			 $actualizado = true;
		 } catch (Exception $e)  {
			 echo "Se ha producido un error";
			 $actualizado = false;
		 }
		 return $actualizado;
	 }
	 
		public function getNumeroUsuarios(){
			//Devolvemos un número que representa el número de productos que tenemos en la
			try {
				$consulta="SELECT * FROM usuarios";
				
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuario = $query->fetchAll();
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes
			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}
			return count($tUsuario);
	}
	}

 ?>