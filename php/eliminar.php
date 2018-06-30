<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM person WHERE id=".$_GET["id"];
			$query = pg_query($conexion, $sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../ver.php';</script>";

			}
}

?>