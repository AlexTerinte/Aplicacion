<?php 

require_once 'conexion/conexion.php';

	class ImagenesEmpleados {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonImagenesEmpleados(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia
		}

		public function getImagenesTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM imagenes_empleados";

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tImagenes = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaImagenes = array();
			foreach ($tImagenes as $fila) {
				$c=new ImagenLlanta($fila[0], $fila[1], $fila[2], $fila[3]);
				array_push($tablaImagenes, $c);
			}
			return $tablaImagenes;
		}

		public function addUnaImagen($c) {
			try {
				$consulta = "INSERT INTO imagenes_empleados (id, id_empleados, cod_imagen, ruta_foto) VALUES (null,?,?,?)";

				$query=$this->db->preparar($consulta);

				@$query->bindParam(1,$c->getIdEmpleado());
				@$query->bindParam(2,$c->getCodImagen());
                @$query->bindParam(3,$c->getRutaFoto());
				$query->execute();
				$insertado=true;
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}

		public function getImagenesByID($codigo){
			try {
				
				$consulta="SELECT * FROM imagenes_empleados WHERE id LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tRol = $query->fetchAll();

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaImagenes=array(); //inicializamos la tabla de salida
			foreach ($tRol as $fila) {
				$r=new ImagenLlanta($fila[0],$fila[1],$fila[2],$fila[3]);
				array_push($tablaImagenes, $r);
			}

			return $tablaImagenes;
		}

		public function getImagenesByCod($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM imagenes_empleados WHERE cod_imagen LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tRol = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaImagenes=array(); //inicializamos la tabla de salida
			foreach ($tRol as $fila) {
				$r=new ImagenLlanta($fila[0],$fila[1],$fila[2],$fila[3]);
				array_push($tablaImagenes, $r);
			}

			return $tablaImagenes;
		}


		public function lastId()
		{
			try {
				$consulta = "SELECT id FROM imagenes_empleados ORDER BY id DESC LIMIT 1";
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
	
		public function updateImagen(ImagenLlanta $r){
            try{
                $idImage = $r->getId();
                $consulta= "UPDATE imagenes_empleados SET ruta_foto = ? WHERE id LIKE '$idImage'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$r->getRutaFoto());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}

		public function deleteImage($id){
            try{
                $consulta= "DELETE FROM imagenes_empleados WHERE id=$id";
                $query = $this->db->preparar($consulta);
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}

	public function getNumeroImagenes(){
		//Devolvemos un número que representa el número de productos que tenemos en la
		try {
			$consulta="SELECT * FROM imagenes_empleados";
			
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