<?php

function conexion(){

 $con = mysql_connect("localhost","root","mysql");

 if (!$con){

  die('Could not connect: ' . mysql_error());
 }

 mysql_select_db("bd_admin", $con);

 return($con);

}

?>