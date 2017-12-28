<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);
	if( $data->statusRep == 'on' )
		$statusRep = 1;
	else
		$statusRep = 0;

	$strQuery = "INSERT INTO repuesto ( id_categoria, numParte,  name, fromRep, priceSale, priceBuy, detail, stockMin, statusRep, dateReg, status ) ";
	$strQuery.= "VALUES ('".$data->categoria."', '".$data->numParte."', '".$data->name."', '".$data->fromRep."','".$data->priceSale."','".$data->priceBuy."', ";
	$strQuery.= "'".$data->detail."', '".$data->cantidadMin."', '".$statusRep."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	$lastId = $db->insert_Id();

	$strQuery = "INSERT INTO almacen ( id_repuesto, cantidad, dateReg, status ) ";
	$strQuery.= "VALUES ('".$lastId."', '".$data->cantidad."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	$lastIdAl = $db->insert_Id();

	$strQuery = "INSERT INTO suministra ( id_repuesto, id_proveedor, cantidad, dateReg ) ";
	$strQuery.= "VALUES ('".$lastId."', '".$data->proveedor."', '".$data->cantidad."', '".$data->date."' )";

	$sql = $db->Execute($strQuery);

	$srtSql = "SELECT * FROM sucursal ";
	$srtSqlId = $db->Execute($srtSql);

	while ($srtId = $srtSqlId->FetchRow()) {
		$strQuery = "INSERT INTO almacenSuc ( id_almacen, id_sucursal, cantidad, dateReg, status ) ";
		$strQuery .= "VALUES ('".$lastIdAl."', '".$srtId['id_sucursal']."', '".$data->$srtId['id_sucursal']."', ";
		$strQuery .= "'".$data->date."', 'Activo' )";
		$sql = $db->Execute($strQuery);
	}

	/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

	//$data->img = '';

	$strQuery = "SELECT * FROM auxImg ";

	$srtQ = $db->Execute($strQuery);

	if ($srtQ){
		while($row = $srtQ->FetchRow()){
			$name = $row['name'];
			$size = $row['size'];

			$strQuery = "INSERT INTO foto ( id_repuesto, name, size, dateReg, status ) ";
			$strQuery.= "VALUES ( '".$lastId."', '".$name."', '".$size."', '".$data->date."', 'Activo' )";

			$strQ = $db->Execute($strQuery);
			//$data->img = $img;
		}
	}
	if($data->checksEmail == 'on'){
		//echo 'entra......';
		//include '../../classes/envioData.php';
	}
	//print_r($data);
	/***************************************************************************/

	$sql = "TRUNCATE TABLE auxImg ";
	$strQ = $db->Execute($sql);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
