<?php
    include 'admin/adodb5/adodb.inc.php';
    include 'admin/inc/function.php';

    $db = NewADOConnection('mysqli');
    //$db->debug = true;
    $db->Connect();

    $op = new cnFunction();

    $strQuery = "SELECT r.name, f.name, r.id_repuesto FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name)";
    $sql = $db->Execute($strQuery);
?>
            <div class="row">
            <?php
                while( $row = $sql->FetchRow() ){
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=$row[1];?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="<?=$row[1]?>">
                        </div>
                        <h2><?=$row[0]?></h2>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button" onclick="javascript:despliega('single-product.php', 'container', <?=$row[2];?> );">Mas Detalle:</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>