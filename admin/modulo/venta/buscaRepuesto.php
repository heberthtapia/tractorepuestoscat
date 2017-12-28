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

	$cadena = "SELECT r.priceSale, r.name AS namePro, s.cantidad, f.name ";
	$cadena.= "FROM repuesto AS r, almacen AS a, almacenSuc AS s, foto AS f ";
	$cadena.= "WHERE r.numParte = '".$codigo."' AND r.id_repuesto = a.id_repuesto AND r.id_repuesto = f.id_repuesto ";
 	$cadena.= "AND a.id_almacen = s.id_almacen AND s.id_sucursal = '".$_SESSION['idSuc']."' GROUP BY r.id_repuesto ";

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
