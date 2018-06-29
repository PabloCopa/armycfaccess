<?php

if(!empty($_POST)){
	if(isset($_POST['name']) &&isset($_POST['lastname']) &&isset($_POST['email']) &&isset($_POST['address']) &&isset($_POST['phone'])){
		if($_POST['name']!=''&& $_POST['lastname']!=''&&$_POST['address']!=''){
			include 'conexion.php';
			
			$sql = "insert into person (name,lastname,email,address,phone,created_at) values (\'$_POST[name]\',\'$_POST[lastname]\',\'$_POST[email]\',\'$_POST[address]\',\'$_POST[phone]\',NOW())";
			$query = $dsn->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>


insert into person (id, name,lastname,address,phone,email,created_at) values 
('1','pablo','xplod','pablo@hotmail.com','address','32165487','2018-08-21');