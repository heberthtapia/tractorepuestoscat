<?php
session_start();
$session_id = session_id();

$id = $_POST['id'];

/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

//echo "DELETE FROM tmp_cotizacion WHERE id_producto = '".mysql_escape_string($_GET['id'])."' AND '".$session_id."' = '".session_id()."' ";
$delete = mysqli_query($con, "DELETE FROM tmp_cotizacion WHERE id_producto = '".$id."' AND '".$session_id."' = '".session_id()."' ");

echo (true);
?>