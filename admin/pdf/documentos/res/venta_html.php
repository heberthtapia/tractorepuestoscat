<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<?php
    date_default_timezone_set("America/La_Paz" );
?>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <? echo "tractorepuestoscat.com "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 50%; color: #444444;">
                <img style="width: 100%;" src="../../../img/logo.jpg" alt="Logo"><br>

            </td>
			<td style="width: 50%;text-align:right">
			VENTA Nº <? echo $op->ceros($idX,4);?>
			</td>

        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
		<td style="width:50%;"><strong>Dirección:</strong> <br><?=$suc['nameSuc']?> - <?=$suc['address']?><br><br> <strong>Teléfono.:</strong> (591)2222-2222</td>

		</tr>
	</table>

	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		<tr>
			<td style="width: 100%;text-align:right">
			<strong>Fecha:</strong> <? echo date("d-m-Y");?>
			</td>
		</tr>
	</table>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>

            <td style="width:15%; "><strong>Cliente:</strong></td>
            <td style="width:50%; text-transform: capitalize;"><? echo $cliente; ?> </td>
			<td style="width:15%;text-align:right"><strong>Teléfono:</strong></td>
			<td style="width:20%">&nbsp;<? echo $phone; ?> </td>
        </tr>
        <tr>

            <td style="width:15%; "><strong>Email:</strong></td>
            <td style="width:50%"><? echo $email; ?></td>
        </tr>

    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
             <td style="width:100%; ">Detalle de Venta.</td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;padding:1mm;">
        <tr>
            <th style="width: 10%"># DE PARTE</th>
            <th style="width: 30%">NOMBRE</th>
            <th style="width: 30%">CANTIDAD</th>
            <th style="width: 15%">PRECIO UNIT.</th>
            <th style="width: 15%">MONTO TOTAL</th>

        </tr>
    </table>
<?php
    $sumador_total = 0;

    $sqlQuery   = "SELECT * FROM compra AS c, compraRepuesto AS cr, repuesto AS r WHERE c.id_compra = ".$idX." AND c.id_compra = cr.id_compra AND cr.id_repuesto = r.id_repuesto";

    $sql    = $db->Execute($sqlQuery);

    while ($row = $sql->FetchRow()){

        $numRep = $row['numParte'];
        $name   = $row['name'];
        $cant   = $row['cantidad'];
        $price  = $row['price'];
        $monto  = $cant*$price;

        $subTotal   = $row['subTotal'];
        $descuento  = $row['descuento'];
        $total      = $row['total'];

        $monto  = number_format($monto,2);

        $condiciones = "Al Contado"


    /*$id_tmp = $row["id_tmp"];
	$id_repuesto = $row["id_repuesto"];
	$numParte = $row['numParte'];
	$cantidad = 1;//$row['cantidad_tmp'];
	$nombre_producto = $row['nameRepuesto'];
	$categoria = $row['cat'];*/

	/*if (!empty($id_marca_producto))
	{
	$sql_marca=mysqli_query($con,"select nombre_marca from marcas_demo where id_marca='$id_marca_producto'");
	$rw_marca=mysqli_fetch_array($sql_marca);
	$nombre_marca=$rw_marca['nombre_marca'];
	$marca_producto=" ".strtoupper($nombre_marca);
	}
	else {$marca_producto='';}*/

	/*$precio_venta=$row['priceSale'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador*/
	?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black;  text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <td style="width: 10%; text-align: center"><?php echo $numRep; ?></td>
            <td style="width: 30%; text-align: center"><? echo $name;?></td>
            <td style="width: 30%; text-align: center"><? echo $cant;?></td>
            <td style="width: 15%; text-align: right"><? echo $price;?></td>
            <td style="width: 15%; text-align: right"><? echo $monto;?></td>

        </tr>
    </table>
	<?php
	}
    $total = ($subTotal - $subTotal*($descuento/100));
    ?>
<br>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">SUBTOTAL : </th>
            <th style="width: 13%; text-align: right;">Bs.- <? echo number_format($subTotal,2);?></th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">DESCUENTO : </th>
            <th style="width: 13%; text-align: right;"><? echo number_format($descuento,2);?> %</th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">TOTAL : </th>
            <th style="width: 13%; text-align: right;">Bs.- <? echo number_format($total,2);?></th>
        </tr>
    </table>
	*** Precios incluyen IVA ***

	<br><br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width:50%;text-align:right">Condiciones de pago: </td>
                <td style="width:50%; ">&nbsp;<? echo $condiciones; ?></td>
            </tr>
        </table>
    <br><br><br><br>


	  <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
			 <tr>
                <td style="width:33%;text-align: center;border-top:solid 1px"><?=$op->toSelect($_SESSION['cargo']);?><br><?=$nameEmp;?></td>
               <td style="width:33%;"></td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
            </tr>
        </table>

</page>