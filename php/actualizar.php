<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""){
			include "conexion.php";
			
            $sql = "UPDATE person SET (name,lastname,email,address,phone) = ('$_POST[name]','$_POST[lastname]','$_POST[email]','$_POST[address]','$_POST[phone]') WHERE id=".$_POST['id'];
            
			#$sql = "UPDATE person SET name=\'$_POST[name]\',lastname=\'$_POST[lastname]\',email=\'$_POST[email]\',address=\'$_POST[address]\',phone=\'$_POST[phone]\' WHERE id=".$_POST[id];
            
			$query = pg_query($dbconn, $sql);
            
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>