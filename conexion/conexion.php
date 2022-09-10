<?php

class conexion {
  private static $instancia;
  private $dbh;
  
  private function __construct()
  {
      try {
          $host="localhost";
          $database="bbdd_atianmar";
          $usuario="alex.atianmar";
          $password="ceIm673@";
          
          $this->dbh=new PDO("mysql:host=$host;dbname=$database",
                  $usuario,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //este último parámetro ayuda a encontrar errores en la conexión y en las consultas posteriores, si nos falta algún parámetro o no coinciden los tipos.
          if ($this->dbh)
          {
              $this->dbh->exec("SET CHARSET utf8");
              //otra forma de hacer lo mismo si acaso la
              //anterior no funciona
              $this->dbh->query("SET NAMES 'utf8'");

              
          }
          
          
      } catch (Exception $ex) {
          echo "Error en la conexión" . $ex->getMessage(). "<br>";
          die();
      }
  }
     function preparar($sql)
  {
      
      return $this->dbh->prepare($sql);
      
  }
  
  public static function singleton_conexion()
  {
      if (!isset(self::$instancia)) 
      {
            //En este caso, no existe la conexión aún.
          //hay que crear la instancia
          $miclase=__CLASS__;
          self::$instancia=new $miclase;
      }
              
      return self::$instancia;     
  }        
  

  
  public function __clone()
  {
      echo "Error. No se puede clonar";
  }
  
  
}  
?>  
    

