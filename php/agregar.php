<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["apto_fisico"]) &&isset($_POST["address"]) &&isset($_POST["telefono"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["address"]!=""){
			include "conexion.php";
			
			$sql = "insert into personas(nombre,apellido,apto_fisico,address,telefono,created_at) value (\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[apto_fisico]\",\"$_POST[address]\",\"$_POST[telefono]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>