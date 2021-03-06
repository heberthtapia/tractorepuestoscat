<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 23/9/2016
 * Time: 16:25
 */
session_start();

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();
?>
<script>
      $(document).ready(function() {
        $('#tablaList').on('draw.dt', function(e, settings, json) {
          if (typeof drawDT359 == 'function') { drawDT359(); }
        })
        .DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ filas por pagina",
                "zeroRecords": "No se encontro nada - Lo siento",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrada de _MAX_ registros en total)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            },
            "columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": true
                }
            ]
        });

        function drawDT359() {
          // when the alert pops up, you will still be on the same page
          // new results page isn't shown at this moment, will be shown after
          // so it seems the draw event is being triggered early
          console.log('drawing table ...');
          $('input.repuesto, input:radio').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            //increaseArea: '100%' // optional
          });

          $('input.repuesto:checkbox').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusRep(id, 'Activo');
          });
          $('input.repuesto:checkbox').on('ifUnchecked',function(event){
              id = $(this).attr('id');
              statusRep(id, 'Inactivo');
          });
        }
      });
    </script>
<table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Categoria</th>
                      <th># Parte</th>
                      <th>Nombre</th>
                      <th>Para Modelos</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Precio Compra</th>
                      <th>Almacenado</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  $sql = "SELECT r.id_repuesto, c.id_categoria, c.name AS cat, r.numParte, r.stockMin, r.name, r.detail, r.fromRep, ";
                  $sql.= "SUM(a.cantidad) AS cantidad, r.priceSale, r.priceBuy, r.status, r.statusRep, a.id_almacen ";
                  $sql.= "FROM repuesto AS r, almacen AS a, categoria AS c WHERE r.id_repuesto = a.id_repuesto ";
                  $sql.= "AND r.id_categoria = c.id_categoria GROUP BY (r.id_repuesto) ORDER BY (r.dateReg) DESC ";

                  $cont = 1;

                  $srtQuery = $db->Execute($sql);
                  if($srtQuery === false)
                      die("failed");

                  while( $row = $srtQuery->FetchRow()){

                    $sqlProv = "SELECT id_proveedor FROM suministra WHERE id_repuesto = '".$row['id_repuesto']."' ";
                    $srtProv = $db->Execute($sqlProv);
                    $reg = $srtProv->FetchRow();

                    if($row['statusRep'] == 1)
                      $alm = '<span class="label label-success">Real</span>';
                    else
                      $alm = '<span class="label label-danger">Ficticio</span>';

                      ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td align="center"><?=$row['dateReg']?></td>
                          <td align="center"><?=$row['cat'];?></td>
                          <td align="center"><?=$row['numParte'];?></td>
                          <td align="center"><?=$row['name'];?></td>
                          <td align="center"><?=$row['fromRep'];?></td>
                          <td align="center"><?=$row['cantidad'];?></td>
                          <td align="center"><?=$row['priceSale'];?></td>
                          <td align="center"><?=$row['priceBuy'];?></td>
                          <td align="center"><?=$alm;?></td>
                          <td width="14%">
                              <div class="btn-group" style="width: 171px">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                                      data-idResp     =   "<?=$row['id_repuesto']?>"
                                      data-numParte   =   "<?=$row['numParte']?>"
                                      data-name       =   "<?=$row['name']?>"
                                      data-idCat      =   "<?=$row['id_categoria']?>"
                                      data-proveedor  =   "<?=$reg['id_proveedor']?>"
                                      data-fromRep    =   "<?=$row['fromRep']?>"
                                      data-cantidad   =   "<?=$row['cantidad']?>"
                                      data-cantidadMin=   "<?=$row['stockMin']?>"
                                      data-priceSale  =   "<?=$row['priceSale']?>"
                                      data-priceBuy   =   "<?=$row['priceBuy']?>"
                                      data-detail     =   "<?=$row['detail']?>"
                                      <?php
                                      $sql = "SELECT s.id_sucursal, s.cantidad FROM repuesto AS r, almacen AS a, almacenSuc AS s WHERE r.id_repuesto = a.id_repuesto ";
                                      $sql.= "AND a.id_almacen = s.id_almacen AND r.id_repuesto = '".$row['id_repuesto']."' ";
                                      $querySql = $db->Execute($sql);
                                      $cantSuc = 0;
                                      while (  $file = $querySql->FetchRow() ) {
                                        $cantSuc++;
                                      ?>
                                      data-asingSuc<?=$file['id_sucursal']?>   =   "<?=$file['cantidad']?>"
                                      <?php
                                      }
                                      ?>
                                      data-cantSuc    =   "<?=$cantSuc;?>"
                                      data-idalmacen  =   "<?=$row['id_almacen'];?>"
                                      data-statusRep  =   "<?=$row['statusRep'];?>" >
                                      <i class='glyphicon glyphicon-edit'></i> Modificar
                                  </button>

                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_repuesto']?>"  >
                                      <i class='glyphicon glyphicon-trash'></i> Eliminar
                                  </button>
                              </div>
                              <div class="btn-group" style="width: 171px; margin-top: 5px;">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataStock"
                                        data-idResp     =   "<?=$row['id_repuesto']?>"
                                          data-numParte   =   "<?=$row['numParte']?>"
                                          data-name       =   "<?=$row['name']?>"
                                          data-cantidad   =   "<?=$row['cantidad']?>"
                                          <?php
                                          $sql = "SELECT s.id_sucursal, s.cantidad FROM repuesto AS r, almacen AS a, almacenSuc AS s WHERE r.id_repuesto = a.id_repuesto ";
                                          $sql.= "AND a.id_almacen = s.id_almacen AND r.id_repuesto = '".$row['id_repuesto']."' ";
                                          $querySql = $db->Execute($sql);
                                          $cantSuc = 0;
                                          while (  $file = $querySql->FetchRow() ) {
                                            $cantSuc++;
                                          ?>
                                          data-asingSuc<?=$file['id_sucursal']?>   =   "<?=$file['cantidad']?>"
                                          <?php
                                          }
                                          ?>
                                          data-cantSuc    =   "<?=$cantSuc;?>"
                                          data-idalmacen  =   "<?=$row['id_almacen'];?>" >
                                        <i class='glyphicon glyphicon-trash'></i> Agregar STOCK
                                    </button>
                              </div>
                              <div style="margin-top: 5px">
                                  <div class="checkbox" id="status<?=$row['id_repuesto']?>">
                                      <?PHP
                                          if( $row['status'] == 'Activo' ){
                                      ?>
                                          <input type="checkbox" class="repuesto" name="checks" checked id="<?=$row['id_repuesto']?>"/>
                                          <label>Status</label>
                                      <?PHP
                                          }else{
                                      ?>
                                          <input type="checkbox" class="repuesto" name="checks" id="<?=$row['id_repuesto']?>"/>
                                          <label>Status</label>
                                      <?PHP
                                          }
                                      ?>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <?PHP
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Categoria</th>
                      <th># Parte</th>
                      <th>Nombre</th>
                      <th>Para Modelos</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Precio Compra</th>
                      <th>Almacenado Sucursal</th>
                      <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
