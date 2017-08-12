<?php
    include 'admin/adodb5/adodb.inc.php';
    include 'admin/inc/function.php';

    $db = NewADOConnection('mysqli');
    //$db->debug = true;
    $db->Connect();

    $op = new cnFunction();

    $id = $_POST['id'];

    $str = "SELECT c.name, r.name, r.detail FROM repuesto AS r, categoria AS c WHERE r.id_categoria = c.id_categoria AND r.id_repuesto = ".$id."";
    $Query = $db->Execute($str);

    $row = $Query->FetchRow();

    $strFoto = "SELECT f.name, r.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto AND r.id_repuesto = ".$id."";
    $queryFoto = $db->Execute($strFoto);

    $foto = $queryFoto->FetchRow();

 $strQuery = "SELECT r.name, f.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name) ORDER BY (r.dateReg) DESC limit 0,10";
 $query = $db->Execute($strQuery);

?>


            <div class="row">


                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Inicio</a>
                            <a href="repuesto.php">Repuestos</a>
                            <span><?=$foto[1];?></span>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img" align="center">
                                        <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($foto[0]);?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    </div>

                                    <div class="product-gallery">
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
                                        <p>Categoria: <a href=""><?=$row[0];?>.</a></p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripcion</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cotización</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descripción Repuesto</h2>
                                                <?=$row[2];?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-sidebar">
                                    <h2 class="sidebar-title">Repuestos</h2>
                                    <div class="thubmnail-recent">
                                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                                        <div class="product-sidebar-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div>
                                    </div>
                                    <div class="thubmnail-recent">
                                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                                        <div class="product-sidebar-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div>
                                    </div>
                                    <div class="thubmnail-recent">
                                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                                        <div class="product-sidebar-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div>
                                    </div>
                                    <div class="thubmnail-recent">
                                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                                        <div class="product-sidebar-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
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

                                            <h2><a href="single-product.html"><?=$reg[0]?></a></h2>
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
            }
        }
    });
</script>
<style type="text/css" media="screen">
    .owl-item{
        width: 298.5px;
    }
</style>