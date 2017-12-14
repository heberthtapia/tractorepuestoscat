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
    <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico" />
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
    <link rel="stylesheet" type="text/css" href="css/cinta.css">
    <script src="js/cargareloj.js"></script>
    <script src="js/ajax.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link href="admin/assets/css/square/blue.css" rel="stylesheet">
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
                <div class="col-sm-8">
                    <div class="logo">
                        <h1><a href="index.php"><img src="img/logo.jpg" width="613" height="53"></a></h1>
                    </div>
                </div>
                <div class="col-sm-4">
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
                        <li><a href="aboutus.php">Quienes Somos</a></li>
                        <li><a href="machine.php">Maquinaria y Equipos</a></li>
                        <!--<li><a href="#">Empresa</a></li>
                        <li><a href="#">Puntos de Venta</a></li>-->
                        <!--<li><a href="#">Category</a></li>-->
                        <li><a href="cotiza.php">Cotizacion <span id="cot" class="badge badge-secondary"></span></a></li>
                        <li><a href="contacts.php">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <div class="sliderarea">
        <div class="nivoslider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="img/h4-slide01.jpg" data-thumb="img/h4-slide01.jpg" alt="" title="Motor Basico" />
                <img src="img/h4-slide02.jpg" data-thumb="img/h4-slide02.jpg" alt="" title="Sistema de transmision" />
                <img src="img/h4-slide03.jpg" data-thumb="img/h4-slide03.jpg" alt="" title="Tren de Fuerza" />
                <img src="img/h4-slide04.jpg" data-thumb="img/h4-slide04.jpg" alt="" title="Sistema hidraulico" />
                <img src="img/h4-slide05.jpg" data-thumb="img/h4-slide05.jpg" alt="" title="Implementos" />
                <img src="img/h4-slide06.jpg" data-thumb="img/h4-slide06.jpg" alt="" title="Sistema de Combustible" />
                <img src="img/h4-slide07.jpg" data-thumb="img/h4-slide07.jpg" alt="" title="Sistema de Enfriamiento"/>
                <img src="img/h4-slide08.jpg" data-thumb="img/h4-slide08.jpg" alt="" title="Sistema de Entrada de Aire y Escape" />
                <img src="img/h4-slide09.jpg" data-thumb="img/h4-slide09.jpg" alt="" title="Sistema de Lubricacion"/>
                <img src="img/h4-slide10.jpg" data-thumb="img/h4-slide10.jpg" alt="" title="Sistema Electrico y de Arranque" />
            </div>
        </div>
            <!-- Slider -->
            <!-- ./Slider -->
    </div> <!-- End slider area -->
<!--<img border="0" src="admin/thumb/phpThumb.php?src=../../img/backSlide.png&w=1163&h=365&fltr[]=wmi%7C../../img/h4-slide01-1.png%7C420x180%7C100%7C500%7C500%7C0&hash=409a4ffdd42231edff0421f096d750ab" alt="">-->
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand01.png" alt="">
                            <img src="img/brand02.png" alt="">
                            <img src="img/brand03.png" alt="">
                            <img src="img/brand04.png" alt="">
                            <img src="img/brand05.png" alt="">
                            <img src="img/brand06.png" alt="">
                            <img src="img/brand07.png" alt="">
                            <img src="img/brand08.png" alt="">
                            <img src="img/brand09.png" alt="">
                            <img src="img/brand10.png" alt="">
                            <img src="img/brand11.png" alt="">
                            <img src="img/brand12.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
<?php
 //$strQuery = "SELECT r.name, f.name FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto GROUP BY (r.name) ORDER BY (r.dateReg) DESC limit 0,10";
 //$query = $db->Execute($strQuery);
?>
<div id="principal">
    <div class="product-big-title-area1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><b>Nuestros Repuestos</b></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div id="container" class="container">
        </div>
    </div>
</div><!--end principal-->
    <!--<div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Ultimos Repuestos</h2>
                        <div class="product-carousel">
                        <?php
                            //while( $reg = $query->FetchRow() ){
                        ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img class="thumb" src="admin/thumb/phpThumb.php?src=../modulo/repuesto/uploads/files/<?=($reg[1]);?>&amp;w=195&amp;h=243&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> Mas detalles</a>
                                    </div>
                                </div>
                                <h2><a href="single-product.html"><?//=$reg[0]?></a></h2>
                            </div>
                        <?php
                            //}
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
<div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand21.png" alt="">
                            <img src="img/brand22.png" alt="">
                            <img src="img/brand23.png" alt="">
                            <img src="img/brand24.png" alt="">
                            <img src="img/brand25.png" alt="">
                            <img src="img/brand26.png" alt="">
                            <img src="img/brand27.png" alt="">
                            <img src="img/brand28.png" alt="">
                            <img src="img/brand29.png" alt="">
                            <img src="img/brand30.png" alt="">
                            <img src="img/brand31.png" alt="">
                            <img src="img/brand32.png" alt="">
                            <img src="img/brand33.png" alt="">
                            <img src="img/brand34.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> <!-- End brands area -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog modal-sm">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulario de Contacto</h4>
      </div>
      <div class="modal-body">
        <div >
            <form role="form" id="Formulario" action="javascript:sendEmail('sendEmail.php');">
                <div class="form-group">
                    <label class="control-label" for="Nombre">Nombres</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca su nombre" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono celular" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Motivo">Motivo de Contacto</label>
                    <select name="Motivo" class="form-control">
                        <option value="Consulta General">Consulta General</option>
                        <option value="Realizar Pedido">Realizar Pedido</option>
                        <option value="Informe un problema">Informe de un problema</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Empresa">Empresa</label>
                    <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Introduzca el nombre de su empresa" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                    <input type="email" class="form-control" id="Correo" name="Correo" placeholder="Introduzca su correo electrónico" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="Mensaje" name="Mensaje" placeholder="Introduzca su mensaje" required ></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </div>
                <div id="respuesta" style="display: none;"></div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    <div class="product-big-title-area"><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h1>¿No encuentras los recambios que está buscando?</h1>
                        <h3>¡Contactate con nosotros y te lo conseguimos!</h3>
                        <a><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">CONTACTO</button></a>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</div><!--end principal-->
<section class="address-agileits">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
<div id="reg">
                    <div class="footer-about-us">
                        <h2 class="footer-wid-title"><b>Tractorepuestos CAT</b></h2>
                        <p>Tambien nos puedes encontrar en nuestras redes sociales</p>
                        <div>
                            <a href="#" target="_blank"><img src="img/face.png" width="35" height="35"></a>
                            <a href="https://api.whatsapp.com/send?phone=59176280881" target="_blank"><img src="img/wachap.png" width="35" height="35"></a>
                            <a href="#" target="_blank"><img src="img/youtube.png" width="35" height="35"></a>
                        </div>
                        <br><br><br>
                    </div>
</div>
                </div>
<?php
 $strQuery = "SELECT * FROM categoria ORDER BY (name)";
 $query = $db->Execute($strQuery);
?>
                <div class="col-md-4 col-sm-6">
<div  id="reg">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"><b>Categorias</b></h2>
                        <ul id="enlace">
                            <?php
                                while( $reg = $query->FetchRow() ){
                            ?>
                                <li><a href="assets/category.php?id='.$cat.'"><?=$reg['name'];?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
</div>
                </div>
                <div class="col-md-4 col-sm-6">
<div id="reg">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"><b>Menu principal</b></h2>
                        <ul id="enlace">
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="aboutus.php">Quienes somos</a></li>
                            <li><a href="machine.php">Maquinaria y Equipos</a></li>
                            <li><a href="cotiza.php">Cotizacion</a></li>
                            <li><a href="contacts.php">Contacto</a></li>
                        </ul>
                    </div>
</div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
</section>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; 2017 Tractorepuestos CAT. Derechos Reservados. <a href="http://www.web.negociosaig.net" target="_blank">Technogroup</a></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div align="center" class="copyright">
                        <p>Eres la visita N°</p>
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
    <script type="text/javascript" src="js/script.js"></script>
    <!--icheck-->
    <script type="text/javascript" src="admin/assets/js/icheck.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    load(1);
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
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect: 'random',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){},
            lastSlide: function(){},
            afterLoad: function(){}
        });
    });
    var num = sessionStorage.getItem("num");
    var numG = sessionStorage.getItem("numG");
    if(num == null){
        sessionStorage.setItem("num", 0);
        sessionStorage.setItem("numG", 0);
    }
    $('span#cot').text(num);
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
