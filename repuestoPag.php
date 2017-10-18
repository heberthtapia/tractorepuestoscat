<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('numParte', 'name');//Columnas de busqueda
		 $sTable = "repuesto";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 8; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql = "SELECT r.name, f.name, r.id_repuesto FROM repuesto AS r, (SELECT id_repuesto, name FROM foto GROUP BY (id_repuesto)) AS f WHERE r.id_repuesto = f.id_repuesto LIMIT $offset,$per_page";
		//$sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){

?>

            <div class="row">
            <?php
                while( $row = mysqli_fetch_array($query) ){
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product" align="center">
                        <div class="product-upper">
                            <img src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=$row[1];?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="<?=$row[1]?>">
                        </div>
                        <h2><?=$row[0]?></h2>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" onclick="javascript:despliega('single-product.php', 'container', <?=$row[2];?>, <?=$page;?> );">Mas Detalle</a>
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
                          <table class="table">
							<tr>
								<td colspan=5><span class="pull-right"><?
								 echo paginate($reload, $page, $total_pages, $adjacents);
								?></span></td>
							</tr>
						  </table>
                        </nav>
                    </div>
                </div>
            </div>
			<?php
		}
	}
?>