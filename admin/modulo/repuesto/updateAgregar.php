<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');

	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	$strQuery = "INSERT INTO almacen ( id_repuesto, cantidad, dateReg, status ) ";
	$strQuery.= "VALUES ('".$data->idResp."', '".$data->cantidad."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	$lastIdAl = $db->insert_Id();

	$srtSql = "SELECT * FROM sucursal ";
	$srtSqlId = $db->Execute($srtSql);

	while ($srtId = $srtSqlId->FetchRow()) {
		$strQuery = "INSERT INTO almacenSuc ( id_almacen, id_sucursal, cantidad, dateReg, status ) ";
		$strQuery .= "VALUES ('".$lastIdAl."', '".$srtId['id_sucursal']."', '".$data->$srtId['id_sucursal']."', ";
		$strQuery .= "'".$data->date."', 'Activo' )";
		$sql = $db->Execute($strQuery);
	}

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
