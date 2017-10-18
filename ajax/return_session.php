<?php
session_start();
$session_id = session_id();

$id = $_POST['id'];

/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
//echo "SELECT sessionID FROM tmp_cotizacion WHERE id_producto = $id AND session_id = '".$session_id."' ";

$query = mysqli_query($con, "SELECT sessionID FROM tmp_cotizacion WHERE id_producto = $id AND session_id = '".$session_id."' ");

$row=mysqli_fetch_array($query);

echo ($row[0]);
?>