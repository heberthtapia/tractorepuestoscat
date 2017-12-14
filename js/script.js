function despliega(p, div, id, pag){
	$.ajax({
		url: p,
		type: 'post',
		cache: false,
		data: {
            id: id,
            pag: pag
        },
		beforeSend: function(data){
			$("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){

			$("#"+div).html(data);

		}
	});
}

function sendEmail(p){
    var dato = JSON.stringify( $('#Formulario').serializeObject() );
    $.ajax({
        url: p,
        type: 'post',
        dataType: 'json',
        async:true,
        data:{res:dato},
        beforeSend: function(data){
           // $("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
        },
        success: function(data){
            $('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Se mensaje, fue enviado correctamente.</strong></div><br>').fadeIn(4000,function (){
                    $('#datos_ajax').fadeOut(2000,function () {
                        $('#myModal').modal('hide').delay(7000);
                    });
                });
        }
    });
}

function removeCotizar(id){
    var num = sessionStorage.getItem("num");
    var cod;
    $.ajax({
        type: "POST",
        async:false,
        url: "./ajax/return_session.php",
        data: {
            id: id
        },
        success: function(datos){
            //alert(datos);
            cod = datos;
            num--;
            sessionStorage.removeItem(cod);
            sessionStorage.setItem("num", num);
            $('span#cot').text(num);
        }
    });
}

function load(page){
    var q = '';//$("#q").val();
    $("#container").fadeIn('slow');
    $.ajax({
        url:'./repuestoPag.php?action=ajax&page='+page+'&q='+q,
        beforeSend: function(objeto){
            $('#container').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
            $("#container").html(data).fadeIn('slow');
            //$('#container').html('');
        }

    })

}