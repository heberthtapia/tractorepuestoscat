<?php
	$keyword = strval($_POST['query']);
	$search_param = "%{$keyword}%";

	/*$argHostname = "ns6219.hostgator.com";
		$argUsername = "monkydj_tracto";
		$argPassword = "=QMKF1SGM,Mk";
		$argDatabaseName = "monkydj_tractorepuestoscat";*/

	//$conn = new mysqli('localhost', 'root', 'mysql' , 'bd_admin');
	$conn = new mysqli('ns6219.hostgator.com', 'monkydj_tracto', '=QMKF1SGM,Mk' , 'monkydj_tractorepuestoscat');

	$q = 'SELECT * FROM personas WHERE nombre LIKE "'.$search_param.'"';

	$sql = $conn->query($q);

	$row_cnt = $sql->num_rows;

	if ($row_cnt > 0) {

		while ($row = mysqli_fetch_array($sql)){

			$countryResult[] = $row["nombre"];

		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>