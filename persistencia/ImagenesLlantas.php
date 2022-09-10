<?php 

require_once '/var/www/vhosts/atilianoyantonio.es/httpdocs/aplicacion/conexion/conexion.php';

	class ImagenesLlantas {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonImagenesLlantas(){
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


		public function getImagenesTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM imagenes_llantas";

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
				$c=new ImagenLlanta($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
				array_push($tablaImagenes, $c);
			}
			return $tablaImagenes;
		}


		// Un método que permita dar de alta a un cliente
		public function addUnaImagen($c) {
			try {
				$consulta = "INSERT INTO imagenes_llantas (id, id_usuario, id_llanta, cod_imagen, ruta_foto) VALUES (null,?,?,?,?)";

				$query=$this->db->preparar($consulta);

				@$query->bindParam(1,$c->getIdUsuario());
                @$query->bindParam(2,$c->getIdLlanta());
				@$query->bindParam(3,$c->getCodImagen());
                @$query->bindParam(4,$c->getRutaFoto());
				$query->execute();
				$insertado=true;
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}

		public function getImagenesByID($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM imagenes_llantas WHERE id LIKE '$codigo'";
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
				$r=new ImagenLlanta($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
				array_push($tablaImagenes, $r);
			}

			return $tablaImagenes;
		}

		public function getCompById($cod) {
			//Retorna el número de clientes con el mismo codPostal
			//que le paso como parámetro
			try {
				$consulta = "SELECT cod_imagen FROM imagenes_llantas "
					. "WHERE id_llanta LIKE '$cod'";
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

		public function getImagenesByCod($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM imagenes_llantas WHERE cod_imagen LIKE '$codigo'";
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
				$r=new ImagenLlanta($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
				array_push($tablaImagenes, $r);
			}

			return $tablaImagenes;
		}


		public function lastId()
		{
			try {
				$consulta = "SELECT id FROM imagenes_llantas ORDER BY id DESC LIMIT 1";
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
                $consulta= "UPDATE imagenes_llantas SET ruta_foto = ? WHERE id LIKE '$idImage'";
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
                $consulta= "DELETE FROM imagenes_llantas WHERE id=$id";
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
			$consulta="SELECT * FROM imagenes_llantas";
			
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