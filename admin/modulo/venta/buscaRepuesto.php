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

	$codigo = $_POST['codigo'];

	$cadena = "SELECT r.priceSale, r.name AS namePro, a.cantidad, f.name FROM repuesto AS r, almacen AS a, foto AS f WHERE r.numParte = '$codigo' AND r.id_repuesto = a.id_repuesto AND r.id_repuesto = f.id_repuesto GROUP BY r.id_repuesto";

	$exe = $db->Execute($cadena);

 	if( $exe->RecordCount() > 0 ){
	   	$array=array();
	   	$i=0;
	    while( $row = $exe->FetchRow() ){
	      $array[$i] = $row;
	      $i++;
   		}
   		echo json_encode($array);
 	}else{
   		echo "0";
 	}
?>