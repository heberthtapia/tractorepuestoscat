<?php

    include '../admin/adodb5/adodb.inc.php';

    include '../admin/inc/function.php';



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

    <link rel="stylesheet" href="../css/bootstrap.min.css">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="../css/font-awesome.min.css">



    <!-- Custom CSS -->

    <link rel="stylesheet" href="../css/owl.carousel.css">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/responsive.css">

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

    <script src="../js/cargareloj.js"></script>



	<script src="../js/ajax.js"></script>

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

                            <li><a href="#" title=""><i class="fa fa-user"></i> Mi cuenta</a></li>

                            <li style="padding: 10px;"><i class="fa fa-phone"></i>Tel No. (+591) 762-808-81 / 725-907-62</li>

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

                        <h1><a href="index.php"><img src="../img/logo.jpg" height="64"></a></h1>

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

                        <li><a href="../index.php">Inicio</a></li>

                        <li><a href="../aboutus.php">Quienes Somos</a></li>

                        <li><a href="machine.php">Maquinaria y Equipos</a></li>

                        <!--<li><a href="#">Empresa</a></li>

                        <li><a href="#">Puntos de Venta</a></li>-->

                        <!--<li><a href="#">Category</a></li>-->

                        <li><a href="#">Cotizacion</a></li>

                        <li><a href="../contacts.php">Contacto</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div> <!-- End mainmenu area -->



<div id="principal">



    <div class="product-big-title-area">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="product-bit-title text-center"><br>

                        <h1>Titulo de la Categoria</h1>

                    </div>

                </div>

            </div>

        </div>

    </div>

<div class="container">

      <div class="row">

              <div class="col-md-6">

                <img src="../img/h4-slide2.png">

              </div>

              <div class="col-md-6"><br><br><br>

                <img src="../img/h4-slide3.png">

              </div>

	   </div>

</div><!--end principal-->



	<div class="product-big-title-area"><br><br>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="product-bit-title text-center">

                        <h1>¿No encuentras los recambios que está buscando?</h1>

                        <h3>¡Contacta con nosotros y te lo conseguimos!</h3>

                        <a href="contacts.php"><button type="button" class="btn btn-info">CONTACTOS</button></a>

                    </div>

                </div>

            </div>

        </div>

        <br><br>

    </div>



</div><!--end principal-->

    <div class="footer-top-area">

        <div class="zigzag-bottom"></div>

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-6">

                    <div class="footer-about-us">

                        <h2>Tractorepuestos CAT</span></h2>

                        <p>Tambien nos puedes encontrar en nuestras redes sociales</p>

                        <div>

                            <a href="#" target="_blank"><img src="../img/face.png" width="35" height="35"></a>

                            <a href="#" target="_blank"><img src="../img/wachap.png" width="35" height="35"></a>

                            <a href="#" target="_blank"><img src="../img/youtube.png" width="35" height="35"></a>

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

                            <li><a href="../index.php">Inicio</a></li>

                            <li><a href="../aboutus.php.php">Quienes somos</a></li>

                            <li><a href="">Maquinaria y Equipos</a></li>

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

    <script src="../js/jquery-2.1.4.min.js"></script>



    <!-- Bootstrap JS form CDN -->

    <script src="../js/bootstrap.js"></script>



    <!-- jQuery sticky menu -->

    <script src="../js/owl.carousel.min.js"></script>

    <script src="../js/jquery.sticky.js"></script>



    <!-- jQuery easing -->

    <script src="../js/jquery.easing.1.3.min.js"></script>



    <!-- Main Script -->

    <script src="../js/main.js"></script>



    <!-- Slider -->

    <script type="text/javascript" src="../js/bxslider.min.js"></script>

	<script type="text/javascript" src="../js/script.slider.js"></script>



    <!-- AutoComplete - Buscador -->

    <script type="text/javascript" src="../js/typeahead.js"></script>

    <script type="text/javascript" src="../js/script.js"></script>



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