<?php
    session_start();
    $session_id = session_id();

    include 'admin/adodb5/adodb.inc.php';
    include 'admin/inc/function.php';

    $db = NewADOConnection('mysqli');
    //$db->debug = true;
    $db->Connect();

    $op = new cnFunction();

    $id = $_POST['id'];
    $pag = $_POST['pag'];

    $str = "SELECT c.name as cat, r.name, r.detail FROM repuesto AS r, categoria AS c WHERE r.id_categoria = c.id_categoria AND r.id_repuesto = ".$id."";
    $Query = $db->Execute($str);
    $row = $Query->FetchRow();

    $strFoto = "SELECT f.name, r.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto AND r.id_repuesto = ".$id."";
    $queryFoto = $db->Execute($strFoto);
    $foto = $queryFoto->FetchRow();

    $strQuery = "SELECT r.name, f.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name) ORDER BY (r.dateReg) DESC limit 0,10";
    $query = $db->Execute($strQuery);

    $strQuery = "SELECT r.name, f.name, r.id_repuesto FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name)";
    $sql = $db->Execute($strQuery);

    $sqlQuery = "SELECT * FROM tmp_cotizacion WHERE id_producto = $id AND session_id = '".$session_id."' ";
    $regSql = $db->Execute($sqlQuery);
    $result = $regSql->RecordCount();
?>
<script>



    $('input:checkbox').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        //increaseArea: '100%' // optional
    });

    $('input:checkbox').on('ifChecked', function(event){
        id = $(this).attr('value');
        cotizar(id);

        var codID = new Array();
        n = sessionStorage.getItem("numG");
        for (var i = 1; i <= n; i++) {
            cotId = sessionStorage.getItem("cot"+i);
            codID[i] = cotId;
        }

        agregarID(codID, n);
    });

    $('input:checkbox').on('ifUnchecked',function(event){
        id = $(this).attr('value');
        removeCotizar(id);
        deletID(id);
    });

    var numG = sessionStorage.getItem("numG");
    var num = sessionStorage.getItem("num");

    c = parseInt(numG);

    /*if(c > 0){
        var i = 1;
        while(i <= c) {
            var cotId = sessionStorage.getItem("cot"+i);
            alert(cotId);
            if(cotId == ){
                $('input:checkbox').iCheck('check');
                //$('input:checkbox').addClass('select');
            }
            i++;
        }
    }*/

    function agregarID(id, n){
        $.ajax({
            type: "POST",
            url: "./ajax/agregar_id.php",
            //data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
            data: {
                codID: JSON.stringify(id),
                num: n
            },
            beforeSend: function(objeto){
                //$("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos){
                //alert(datos);
                //$("#resultados").html(datos);
            }
        });
    }

    function deletID(id){
        $.ajax({
            type: "POST",
            url: "./ajax/delet_id.php",
            //data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
            data: {
                id: id
            },
            beforeSend: function(objeto){
                //$("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos){
                //alert(datos);
                //$("#resultados").html(datos);
            }
        });
    }

    var sw = 0;
    function cotizar(id){
        c = parseInt(numG);
        if(c > 0){
            var i = 1;
            while(i <= c) {
                var cotId = sessionStorage.getItem("cot"+i);
                if(cotId == <?=$id;?>){
                    sw = 1;
                }
                i++;
            }
        }
        if(sw == 0 || c == 0){
            num++;
            numG++;
            /*Guardando los datos en el LocalStorage*/
            sessionStorage.setItem("cot"+num, id);
            sessionStorage.setItem("num", num);
            sessionStorage.setItem("numG", numG);
            $('span#cot').text(num);
        }
    }
    function removeCotizarID(id){
        num--;
        n = sessionStorage.getItem("numG");
        for (var i = 0; i <= n; i++) {
            var pro = sessionStorage.key(i);
            cotId = sessionStorage.getItem(pro);
            if(id == cotId){
                var j = i;
                j++;
            }
        }
        sessionStorage.removeItem("cot"+j);
        sessionStorage.setItem("num", num);
        $('span#cot').text(num);
    }
    n = sessionStorage.getItem("numG");
    for (var i = 1; i <= n; i++) {
        cotId = sessionStorage.getItem("cot"+i);
    }
</script>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a onclick="javascript:load(<?=$pag;?>);"><<< Volver</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img" align="center">
                                        <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($foto[0]);?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    </div>

                                    <div class="product-gallery" align="center">
                                        <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($foto[0]);?>&amp;w=76&amp;h=76&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    <?php
                                        while ( $foto = $queryFoto->FetchRow() ) {
                                    ?>
                                        <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($foto[0]);?>&amp;w=76&amp;h=76&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?=$row[1];?></h2>

                                    <div class="product-inner-category">
                                        <p>Categoria: <a href=""><?=$row['cat'];?>.</a></p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripcion</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descripción Repuesto</h2>
                                                <?=$row[2];?>
                                                <br><br>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                          <?PHP
                                                              if( $result > 0 ){
                                                          ?>
                                                              <input type="checkbox" class="form-check-input" checked value="<?=$id;?>">
                                                                Cotizar Producto
                                                          <?PHP
                                                              }else{
                                                          ?>
                                                              <input type="checkbox" class="form-check-input" value="<?=$id;?>">
                                                                Cotizar Producto
                                                          <?PHP
                                                              }
                                                          ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="related-products-wrapper">
                                    <h2 class="related-products-title">Repuestos Relacionados</h2>
                                    <div class="related-products-carousel">
                                        <?php
                                            while( $reg = $query->FetchRow() ){
                                        ?>
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($reg[1]);?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                                <div class="product-hover">
                                                    <!-- <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Mas</a> -->
                                                    <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> detalles</a>
                                                </div>
                                            </div>
                                            <h2><?=$reg[0]?></h2>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    $('.related-products-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            },
            1200:{
                items:4,
            },
            1200:{
                items:5,
            }
        }
    });
</script>
<style type="text/css" media="screen">
    .owl-item{
        width: 298.5px;
    }
</style>