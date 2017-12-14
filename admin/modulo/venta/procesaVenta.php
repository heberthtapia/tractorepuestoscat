<?php
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	/*if($_SESSION['autorizado']<>1){
    	header("Location: index.php");
	}*/
	$idCliente 	= 	$_POST['idCliente'];
	$subTotal	=	$_POST['subTotal'];
	$total		=	$_POST['total'];
	$descuento	=	$_POST['descuento'];
	$total 		=	$_POST['total'];

	$cadena_insert	 =	$db->Execute("INSERT INTO compra(id_empleado, id_cliente, dateReg, subTotal, descuento, total, status) VALUES('".$_SESSION['idEmp']."', '".$idCliente."', '".$fecha." ".$hora."', '".$subTotal."', '".$descuento."', '".$total."', 'Activo')");

	$lastId = $db->insert_Id();

	if($cadena_insert)
		echo $lastId;
	else
		echo 0;
?>