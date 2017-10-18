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