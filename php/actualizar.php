<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["apto_fisico"]) &&isset($_POST["address"]) &&isset($_POST["telefono"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["address"]!=""){
			include "conexion.php";
			
			$sql = "update personas set nombre=\"$_POST[nombre]\",apellido=\"$_POST[apellido]\",apto_fisico=\"$_POST[apto_fisico]\",address=\"$_POST[address]\",telefono=\"$_POST[telefono]\" where id_personas=".$_POST["id_personas"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>