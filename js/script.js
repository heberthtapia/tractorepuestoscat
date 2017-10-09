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

function removeCotizar(id){
    var num = sessionStorage.getItem("num");
        num--;
        n = sessionStorage.getItem("numG");
        for (var i = 0; i <= n; i++) {
            var pro = sessionStorage.key(i);
            cotId = sessionStorage.getItem(pro);
            if(id == cotId){
                var j = i;
                j++;
            }
        }
        sessionStorage.removeItem("cot"+j);
        sessionStorage.setItem("num", num);
        $('span#cot').text(num);
    }