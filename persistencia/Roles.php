<?php 

require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

	class Roles {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonRoles(){
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


		public function getRolesTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM roles";

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tRoles = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaRoles = array();
			foreach ($tRoles as $fila) {
				$c=new Rol($fila[0], $fila[1]);
				array_push($tablaRoles, $c);
			}
			return $tablaRoles;
		}


		// Un método que permita dar de alta a un cliente
		public function addUnRol($c) {
			try {
				$consulta = "INSERT INTO roles (id, nombre) VALUES (null, ?)";

				$query=$this->db->preparar($consulta);

				@$query->bindParam(1,$c->getNombre());
				$query->execute();
				$insertado=true;
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}

		public function getRolById($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM roles WHERE id_rol LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tRol = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaRoles=array(); //inicializamos la tabla de salida
			foreach ($tRol as $fila) {
				$r=new Rol($fila[0],$fila[1]);
				array_push($tablaRoles, $r);
			}

			return $tablaRoles;
		}
	
		public function updateRol(Rol $r){
            try{
                $codigoRol = $r->getIdRol();
                $consulta= "UPDATE roles SET nombre = ? WHERE id LIKE '$codigoRol'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$r->getNombre());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}

		public function deleteRol($id){
            try{
                $consulta= "DELETE FROM roles WHERE id=$id";
                $query = $this->db->preparar($consulta);
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}

	public function getNumeroRoles(){
		//Devolvemos un número que representa el número de productos que tenemos en la
		try {
			$consulta="SELECT * FROM roles";
			
			$query=$this->db->preparar($consulta);
			$query->execute();
			
			$tRol = $query->fetchAll();
			//obtiene todas las tuplas de la tabla clientes
			//y devuelve el array $tClientes
		} catch (Exception $e) {
			echo "Se ha producido un errro";
			
		}
		return count($tRol);
	}
}

?>