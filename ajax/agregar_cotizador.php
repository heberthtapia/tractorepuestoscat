<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
session_start();
$session_id = session_id();

//if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

if (isset($_POST['codID'])){ $codID = json_decode($_POST["codID"], true);}
if (isset($_POST['num'])){ $num = $_POST['num'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

if (!empty($codID))// and !empty($cantidad) and !empty($precio_venta))
{
	$num = $_POST['num'];
	$cont = count($codID);
	for ($i=1; $i < $cont; $i++) {
		if($codID[$i] != null){
			$insert_tmp = mysqli_query($con, "INSERT INTO tmp_cotizacion (id_producto,session_id) VALUES ('$codID[$i]','$session_id')");
		}
	}
}

if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$delete = mysqli_query($con, "DELETE FROM tmp_cotizacion WHERE id_producto = '".mysql_escape_string($_GET['id'])."' AND '".$session_id."' = '".session_id()."' ");
	echo "===>>".$num = $_GET['num'];
}

?>
<table class="table">
<tr>
	<th># PARTE</th>
	<th>NOMBRE</th>
	<th>CANT.</th>
	<th>CATEGORIA</th>
	<th><span class="pull-right">PRECIO UNIT.</span></th>
	<th><span class="pull-right">PRECIO TOTAL</span></th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	//echo $sql = "SELECT * FROM repuesto AS r, tmp_cotizacion AS t WHERE r.id_repuesto = t.id_producto AND r.id_repuesto = $id AND t.session_id = '".$session_id."'";

	for ($i=1; $i <= $num; $i++) {
		echo $i;
		if($codID[$i] != null){
			echo "SELECT r.name, r.numParte, c.nameCategoria, r.priceSale, r.id_repuesto FROM repuesto AS r, categoria AS C WHERE r.id_repuesto = $codID[$i] AND r.id_categoria = c.id_categoria ";
			$sql = mysqli_query($con, "SELECT r.name, r.numParte, c.nameCategoria, r.priceSale, r.id_repuesto FROM repuesto AS r, categoria AS C WHERE r.id_repuesto = $codID[$i] AND r.id_categoria = c.id_categoria ");

			while ($row=mysqli_fetch_array($sql)){
				//$id_tmp = $row["id_tmp"];
				$name =  $row[0];
				$codigo_producto = $row[1];
				$cantidad = 1;//$row['cantidad_tmp'];
				$categoria = $row[2];
				$id_tmp = $row[4];
				//$nombre_producto = $row['name'];
				//$id_marca_producto=$row['id_marca_producto'];
				/*if (!empty($id_marca_producto))
				{
				$sql_marca=mysqli_query($con, "select nombre_marca from marcas_demo where id_marca='$id_marca_producto'");
				$rw_marca=mysqli_fetch_array($sql_marca);
				$nombre_marca=$rw_marca['nombre_marca'];
				$marca_producto=" ".strtoupper($nombre_marca);
				}
				else {$marca_producto='';}*/
				$precio_venta=$row[3];
				$precio_venta_f=number_format($precio_venta,2);//Formateo variables
				$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
				$precio_total=$precio_venta_r*$cantidad;
				$precio_total_f=number_format($precio_total,2);//Precio total formateado
				$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
				$sumador_total+=$precio_total_r;//Sumador

					?>
					<tr>
						<td><? echo $codigo_producto;?></td>
						<td><? echo $name;?></td>
						<td><? echo $cantidad;?></td>
						<td><? echo $categoria;?></td>
						<td><span class="pull-right"><? echo $precio_venta_f;?></span></td>
						<td><span class="pull-right"><? echo $precio_total_f;?></span></td>
						<td ><span class="pull-right"><a href="#" onclick="eliminar('<? echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
					</tr>
					<?php
			}
		}
	}

?>
<tr>
	<td colspan=5><span class="pull-right">TOTAL Bs.</span></td>
	<td><span class="pull-right"><? echo number_format($sumador_total,2);?></span></td>
	<td></td>
</tr>
</table>
<div class="form-group row">
	<label for="condiciones" class="col-md-2 control-label">Condiciones de pago:</label>
	<div class="col-md-3">
		<select class="form-control" id="condiciones">
			<option value='Contado'>Contado</option>
			<option value='Crédito 30 días'>Crédito 30 días</option>
			<option value='Crédito 45 días'>Crédito 45 días</option>
			<option value='Crédito 60 días'>Crédito 60 días</option>
			<option value='Crédito 90 días'>Crédito 90 días</option>
		</select>
	</div>
	<label for="validez" class="col-md-2 control-label">Validez de la oferta:</label>
	<div class="col-md-2">
		<select class="form-control" id="validez">
			<option value='5 días'>5 días</option>
			<option value='10 días'>10 días</option>
			<option value='15 días' selected>15 días</option>
			<option value='30 días'>30 días</option>
			<option value='60 días'>60 días</option>
		</select>
	</div>
	<label for="entrega" class="col-md-1 control-label">Tiempo:</label>
	<div class="col-md-2">
		<input type="text" class="form-control" id="entrega" placeholder="Tiempo de entrega" value="Inmediato">
	</div>
</div>