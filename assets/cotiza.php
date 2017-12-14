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
	<script type="text/javascript" src="../js/VentanaCentrada.js"></script>
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
                <div class="col-sm-12">
                    <div class="logo">
                        <h1><a href="index.php"><img src="../img/logo.jpg" height="64"></a></h1>
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
                        <li class="active"><a>Cotización</a></li>
                        <li><a href="../contacts.php">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
<div class="container">
		  <div class="row-fluid">
			<div class="col-md-12"><br><br>
			<h2><span class="glyphicon glyphicon-edit"></span> Nueva Cotización</h2>
			<hr>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				<div class="form-group row">
				  <label for="atencion" class="col-md-1 control-label">Nombre:</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control" id="atencion" placeholder="Nombre completo" required>
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Teléfono:</label>
							<div class="col-md-2">
								<input type="text" class="form-control" id="tel1" placeholder="Teléfono movil" required>
							</div>
				</div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Empresa:</label>
							<div class="col-md-3">
								<input type="text" class="form-control" id="empresa" placeholder="Nombre de la empresa">
							</div>
							<label for="tel2" class="col-md-1 control-label">Teléfono:</label>
							<div class="col-md-2">
								<input type="text" class="form-control" id="tel2" placeholder="Teléfono empresa">
							</div>
							<label for="email" class="col-md-1 control-label">Email:</label>
							<div class="col-md-3">
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-plus"></span> Agregar productos
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>
			<br><br>
		<div id="resultados" class='col-md-12'></div>
	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>
			
			</div>	
		 </div>
	</div>


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

<script>
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_cotizacion.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
	</script>
	<script>
	function agregar (id)
		{
			var precio_venta=document.getElementById('precio_venta_'+id).value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "./ajax/agregar_cotizador.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "./ajax/agregar_cotizador.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
		$("#datos_cotizacion").submit(function(){
		  var atencion = $("#atencion").val();
		  var tel1 = $("#tel1").val();
		  var empresa = $("#empresa").val();
		  var tel2 = $("#tel2").val();
		  var email = $("#email").val();
		  var condiciones = $("#condiciones").val();
		  var validez = $("#validez").val();
		  var entrega = $("#entrega").val();
		 VentanaCentrada('./pdf/documentos/cotizacion_pdf.php?atencion='+atencion+'&tel1='+tel1+'&empresa='+empresa+'&tel2='+tel2+'&email='+email+'&condiciones='+condiciones+'&validez='+validez+'&entrega='+entrega,'Cotizacion','','1024','768','true');
	 	});
	</script>

  </body>
</html>