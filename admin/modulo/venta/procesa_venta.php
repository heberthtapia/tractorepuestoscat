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

	$id			=	strtoupper($_POST['id']);
	$idRep		=	strtoupper($_POST['idRep']);
	$cantidad	=	$_POST['cantidad'];
	$precio		=	$_POST['precio'];

	$sql = "SELECT id_repuesto FROM repuesto WHERE numParte = '".$idRep."' ";
	$sqlQuery = $db->Execute($sql);
	$reg = $sqlQuery->FetchRow();

	//if($clienteid == '0'){
	$strQuery = "INSERT INTO compraRepuesto(id_compra, id_repuesto, price, cantidad, status) VALUES('".$id."', '".$reg[0]."', '".$precio."', '".$cantidad."', 'Activo')";

	$cadena_insert	 =	$db->Execute($strQuery);


	$strQuery = "UPDATE sucursal SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "nameSuc = '".$data->name."', address = '".$data->address."', status = 'Activo' ";
	$strQuery.= "WHERE id_sucursal = '".$data->idSuc."' ";

	$sql = $db->Execute($strQuery);
	
	//}
	/*if($credito=='1'){
		$cadena_insert=$db->Execute("INSERT INTO compra(codigo,cantidad,tipo,fecha,user,costou,preciou,proveedor,descuento_porcentaje,impuesto_porcentaje,serie,numero,fecha_proceso,referencia,referencia1,referencia2) VALUES(
	'$codigo',$cantidad,'STCR',now(),'$usuario',$costo_articulo,$preciou,0,0.00,0.00,$caja,$numero_ticket,now(),'$clienteid','','')");
	}*/

	//$cadena_update=$db->Execute("Update existencias set cantidad=cantidad-$cantidad where codigo='$codigo'");

?>