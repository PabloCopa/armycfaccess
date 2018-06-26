<?php
 $pdo = new PDO('pgsql:host=ec2-54-163-229-212.compute-1.amazonaws.com;dbname=db1dtmnbmah579', 'lwnwsibmeluecn', 'fbd10d0e0bf159244e530cecc56b3260864a4cabbb0a09d0b9ad00dae1b2917f');
?>



<?
/*
 * Database.php - The all important database class that connects to the database using PDO
 * Last Updated: 15th November, 2014
 */

class Database extends PDO {

    public function __construct() {

        try {
            parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $custom_errormsg = 'Error connecting to database - check your database connection properties in constants.php file';
            echo $custom_errormsg . " <br>\n<br>\n ". $e->getMessage();
            echo "<br>\nPHP Version : ".phpversion()."<br>\n";
        }
    }

}
?>


<?php 
 class Conexion extends PDO { 
   private $tipo_de_base = 'pgsql';
   private $host = 'ec2-54-163-229-212.compute-1.amazonaws.com';
   private $nombre_de_base = 'db1dtmnbmah579';
   private $usuario = 'lwnwsibmeluecn';
   private $contrasena = 'fbd10d0e0bf159244e530cecc56b3260864a4cabbb0a09d0b9ad00dae1b2917f'; 
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>