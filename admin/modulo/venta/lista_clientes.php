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

  $cadena = "SELECT * FROM cliente ORDER BY id_cliente";

  $exe = $db->Execute($cadena);

  if( $exe->RecordCount() > 0 ){
   echo "<table id='sample-table-3' class='table table-bordered table-hover'>";
   echo "<thead>";
   echo "<tr>";
   echo "<th>ID</th><th>Nombre</th><th>Telefono</th><th>Agregar</th>";
   echo "</tr>";
   echo "</thead>";
   echo "<tbody>";
   while( $row = $exe->FetchRow() ){
     echo "<tr>";
     echo "<td style='text-align: center;'>$row[id_cliente]</td>";
     echo "<td style='text-align: center;'>$row[nombre]</td>";
     echo "<td style='text-align: center;'>$row[phone]</td>";
     $elidcliente = $row['id_cliente']."|".$row['nombre'];
     echo "<td style='text-align: center;'><button type='button' class='btn btn-mini btn-success' id='$elidcliente' onclick='pone_cliente(this.id);'>Agregar</button></td>";
     echo "</tr>";
      }
    echo "</tbody>";
    echo "</table>";
  }else{
   echo "Actualmente no hay Clientes registrados...";
  }
?>