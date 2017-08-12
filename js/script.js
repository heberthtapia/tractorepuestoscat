function despliega(p, div, id){
	$.ajax({
		url: p,
		type: 'post',
		cache: false,
		data: 'id='+id,
		beforeSend: function(data){
			$("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){
			
			$("#"+div).html(data);
			
		}
	});
}