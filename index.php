<?php
    include 'admin/adodb5/adodb.inc.php';
    include 'admin/inc/function.php';

    $db = NewADOConnection('mysqli');
    //$db->debug = true;
    $db->Connect();

    $op = new cnFunction();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tractorepuestos CAT</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/cargareloj.js"></script>

	<script src="js/ajax.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body onload="actualizaReloj()">

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="user-menu">
                        <ul>
                            <li style="padding: 10px;"><i class="fa fa-clock-o"></i> <span id="Fecha_Reloj"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5" style="text-align: right;">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#" title=""><i class="fa fa-user"></i> My Account</a></li>
                            <li style="padding: 10px;"><i class="fa fa-phone"></i>Tel No. (+591) 725-589-72</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><img src="img/logo.jpg" height="64"></a></h1>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="logo">
                        <h1>
                        <form>
                          <div class="input-group">
                            <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar" autocomplete="off" class="typeahead">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                              </button>
                            </div>
                          </div>
                          <div id="myDiv"></div><br>
                        </form>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!--End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="enlace">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="repuesto.php">Repuestos</a></li>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="#">Puntos de Venta</a></li>
                        <!--<li><a href="#">Category</a></li>
                        <li><a href="#">Cotizacion</a></li>-->
                        <li><a href="contactos.html">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                <?php
                    //while( $row = $srtQuery->FetchRow()){
                ?>
                    <li>
                        <img src="img/h4-slide01.png" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Motores<!-- <span class="primary"><strong>Plus</strong></span>-->
                            </h2>
                            <h4 class="caption subtitle">Toda marca</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Mas detalles</a>
                        </div>
                    </li>

                <?php
                   // }
                ?>
					<li>
						<img src="img/h4-slide01.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Motores<!-- <span class="primary"><strong>Plus</strong></span>-->
							</h2>
							<h4 class="caption subtitle">Toda marca</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Mas detalles</a>
						</div>
					</li>
					<li><img src="img/h4-slide02.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Transmision <!--<span class="primary">50% <strong>off</strong></span>-->
							</h2>
							<h4 class="caption subtitle">Sistema de transmision</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Mas detalles</a>
						</div>
					</li>
					<li><img src="img/h4-slide03.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Tren de Fuerza<!-- <span class="primary">Store <strong>Ipod</strong></span>-->
							</h2>
							<h4 class="caption subtitle">Selecciona las partes</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Mas detalles</a>
						</div>
					</li>
					<li><img src="img/h4-slide04.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Hidraulica <!--<span class="primary">Store <strong>Ipod</strong></span>-->
							</h2>
							<h4 class="caption subtitle">Sistema hidraulico</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Mas detalles</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

<img border="0" src="admin/thumb/phpThumb.php?src=../../img/backSlide.png&w=1163&h=365&fltr[]=wmi%7C../../img/h4-slide01-1.png%7C420x180%7C100%7C500%7C500%7C0&hash=409a4ffdd42231edff0421f096d750ab" alt="">

<?php
 $strQuery = "SELECT r.name, f.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name) ORDER BY (r.dateReg) DESC limit 0,10";
 $query = $db->Execute($strQuery);
?>

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Ultimos Repuestos</h2>
                        <div class="product-carousel">
                        <?php
                            while( $reg = $query->FetchRow() ){
                        ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($reg[1]);?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    <div class="product-hover">
                                        <!-- <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                        <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> Mas detalles</a>
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
    </div> <!-- End main content area -->

<div id="principal">
	<div id="pers"></div>
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand01.png" alt="">
                            <img src="img/brand02.png" alt="">
                            <img src="img/brand04.png" alt="">
                            <img src="img/brand05.png" alt="">
                            <img src="img/brand06.png" alt="">
                            <img src="img/brand01.png" alt="">
                            <img src="img/brand02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

</div><!--end principal-->
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Tractorepuestos CAT</span></h2>
                        <p>Tambien nos puedes encontrar en nuestras redes sociales</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                    $strQuery = "SELECT * FROM categoria ORDER BY (name)";
                    $query = $db->Execute($strQuery);
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categorias</h2>
                        <ul id="enlace">
                            <?php
                            while( $reg = $query->FetchRow() ){
                            ?>
                                <li><a href=""><?=$reg['name'];?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Menu principal</h2>
                        <ul id="enlace">
                            <li><a href="">Inicio</a></li>
                            <li><a href="">Quienes somos</a></li>
                            <li><a href="">otro enlace</a></li>
                            <li><a href="">Contactos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 Tractorepuestos CAT. Derechos Reservados. <a href="http://www.web.negociosaig.net" target="_blank">Technogroup</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="js/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="js/bootstrap.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>

    <!-- AutoComplete - Buscador -->
    <script type="text/javascript" src="js/typeahead.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        /*$('#enlace ul li a').click(function(){
            $.post($(this).attr("href"),function(datos){
                $('#principal').fadeOut(function(){
                    $('#principal').html(datos).fadeIn();
                });
            });
            return false;*
        });*/

        $('#buscar').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
                    data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });
</script>
<style>
    .typeahead {
        border: 1px solid #FFF;
        border-radius: 1px;
        padding: 8px 12px;
        /*max-width: 80%;
        min-width: 290px;*/
        background: rgba(66, 52, 52, 0.5);
        color: #FFF;
    }
    .tt-menu {
        /*width:50%;*/
    }
    ul.typeahead{
        margin:0px;
        padding:0px 0px;
        width: 85%;
    }
    ul.typeahead.dropdown-menu li a {
        padding: 10px !important;
        border-bottom:#CCC 1px solid;
        color:#FFF;}
    ul.typeahead.dropdown-menu li:last-child a {
        border-bottom:0px !important;
    }
    .bgcolor {
        /*max-width: 550px;
        min-width: 290px;*/
        max-height:340px;
        background:url("world-contries.jpg") no-repeat center center;
        padding: 100px 10px 130px;
        border-radius:4px;
        text-align:center;
        margin:10px;
    }
    .demo-label {
        font-size:1.5em;
        color: #686868;
        font-weight: 500;
        color:#FFF;
    }
    .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
        text-decoration: none;
        background-color: #FF8D1C;
        outline: 0;
    }
</style>
  </body>
</html>