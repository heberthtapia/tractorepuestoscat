<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 4/9/2016
 * Time: 23:31
 */
error_reporting(E_ALL ^ E_WARNING);

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();

$data = stripslashes($_POST['res']);

$data = json_decode($data);

//$q = "DELETE FROM repuesto AS r, almacen AS a WHERE r.id_repuesto = '".$data->id."' ";

$sql = "DELETE repuesto, almacen, almacenSuc FROM repuesto INNER JOIN almacen ON repuesto.id_repuesto = almacen.id_repuesto INNER JOIN almacenSuc ON almacen.id_almacen = almacenSuc.id_almacen WHERE repuesto.id_repuesto = '".$data->id."'";
$reg = $db->Execute($sql);

$strQuery = "SELECT name FROM foto WHERE id_repuesto = '".$data->id."' ";
$str = $db->Execute($strQuery);

while ($row = $str->FetchRow()) {
	unlink('uploads/files/'.$row['name'].'');
}

$sql = "DELETE FROM foto WHERE id_repuesto = '".$data->id."' ";
$reg = $db->Execute($sql);

if($reg)
    echo json_encode($data);
else
    echo 0;
?>
