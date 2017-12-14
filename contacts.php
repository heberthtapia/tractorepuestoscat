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
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="aboutus.php">Quienes Somos</a></li>
                        <li><a href="machine.php">Maquinaria y Equipos</a></li>
                        <!--<li><a href="#">Empresa</a></li>
                        <li><a href="#">Puntos de Venta</a></li>-->
                        <!--<li><a href="#">Category</a></li>-->
                        <li><a href="cotiza.php">Cotizacion <span id="cot" class="badge badge-secondary"></span></a></li>
                        <li class="active"><a>Contacto</a></li>
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
                        <h1>Ubicacion Tienda Central: SAMO</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .footer-menu li span {
            color:#438FC9;
            margin:10px;
            font-size:18px;
        }
    </style>
    <div class="container">
          <div class="row">
                  <div class="col-md-4">
                    <img src="img/tiendasamo.png">
                  </div>
                  <div class="col-md-4"><br>
                    <h1>Nuestra direccion:</h1>
                    <div class="footer-menu">
                        <ul>
                            <li><span class="glyphicon glyphicon-globe"></span><b>Carretera a Oruro</b></li>
                            <li><span class="glyphicon glyphicon-home"></span><b>Localidad Samo</b></li>
                            <li><span class="glyphicon glyphicon-hand-left"></span><b>Frente a engarrafadora Samo</b></li>
                            <li><span class="glyphicon glyphicon-user"></span><b>Gerente Comercial: Windsor Calle Flores</b></li>
                            <li><span class="glyphicon glyphicon-envelope"></span><b>win_javi@tractorepuestoscat.com</b></li>
                            <li><span class="glyphicon glyphicon-earphone"></span><b>Cel.: 72590762 - 76280881</b></li>
                            <li><span class="glyphicon glyphicon-earphone"></span><b>Corporativo: </b></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="container-fluid"><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.638851516401!2d-68.2207064457032!3d-16.493814715160795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915ede16b9356b8d%3A0x87392ccecc5586a4!2sTractorepuestos+CAT!5e0!3m2!1ses!2sbo!4v1504727266574" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
           </div><br>
    </div>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center"><br>
                        <h1>Ubicacion Sucursal: San Roque</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
          <div class="row">
                  <div class="col-md-4">
                    <div class="container-fluid"><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2274.7954842019417!2d-68.11345426837471!3d-16.488964094042352!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1499229779962" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                  <div class="col-md-4"><br>
                    <h1>Nuestra direccion:</h1>
                    <div class="footer-menu">
                        <ul>
                            <li><span class="glyphicon glyphicon-globe"></span><b>Carretera a Copacabana</b></li>
                            <li><span class="glyphicon glyphicon-home"></span><b>Localidad San Roque</b></li>
                            <li><span class="glyphicon glyphicon-user"></span><b>Gerente Comercial: Windsor Calle Flores</b></li>
                            <li><span class="glyphicon glyphicon-envelope"></span><b>win_javi@tractorepuestoscat.com</b></li>
                            <li><span class="glyphicon glyphicon-earphone"></span><b>Cel.: 72590762 - 76280881</b></li>
                            <li><span class="glyphicon glyphicon-earphone"></span><b>Corporativo: </b></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                      <img src="img/tiendasanroque.png">
                  </div>
           </div><br>
    </div>
</div><!--end principal-->
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
        <div class="row">
            <div class="col-md-12">
                <div id="datos_ajax"></div>
            </div>
        </div>
        <div >
            <form role="form" name="Formulario" id="Formulario" action="javascript:sendEmail('sendEmail.php');">
                <div class="form-group">
                    <label class="control-label" for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduzca su nombre" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="telefono">Telefono:</label>
                    <input type="text" class="form-control" id="fono" name="fono" placeholder="Telefono celular" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Motivo">Asunto:</label>
                    <select name="asunto" class="form-control">
                        <option value="Consulta General">Consulta General</option>
                        <option value="Realizar Pedido">Realizar Pedido</option>
                        <option value="Informe un problema">Informe de un problema</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Empresa">Empresa</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Introduzca el nombre de su empresa" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su correo electrónico" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="message" name="message" placeholder="Introduzca su mensaje" required ></textarea>
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
<div id="reg">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"><b>Categorias</b></h2>
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
                </div>
                <div class="col-md-4 col-sm-6">
<div id="reg">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"><b>Menu principal</b></h2>
                        <ul id="enlace">
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="aboutus.php">Quienes somos</a></li>
                            <li><a href="machine.php">Maquinaria y Equipos</a></li>
                            <li><a>Contacto</a></li>
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
    <!-- Json -->
    <script type="text/javascript" src="js/jquery.json-2.3.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
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
