<?php
session_start();
$session_id = session_id();

$id = $_POST['id'];

/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

if (isset($_POST['codID'])){ $codID = json_decode($_POST["codID"], true);}
if (isset($_POST['num'])){ $num = $_POST['num'];}

$num = $_POST['num'];
	$cont = count($codID);
	for ($i=1; $i < $cont; $i++) {
		if($codID[$i] != null){
			$result = mysqli_query($con, "SELECT * FROM tmp_cotizacion WHERE id_producto = $codID[$i] AND session_id = '".$session_id."' ");
			$numero = mysqli_num_rows($result);
			if($numero == 0){
				//echo "INSERT INTO tmp_cotizacion (id_producto,sessionID,session_id) VALUES ('$codID[$i]','cot".$i."','$session_id')";
				$insert_tmp = mysqli_query($con, "INSERT INTO tmp_cotizacion (id_producto,sessionID,session_id) VALUES ('$codID[$i]','cot".$i."','$session_id')");
			}
		}
	}

echo (true);
?>