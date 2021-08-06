
var btn = document.getElementById('logoff');

function off() { 
	document.location.href = "logout"; 
	
}
if (btn){
	btn.addEventListener('click', off);
};

$('#aqui').on('change', function(){

	//console.log($(this))
	var x = $("#aqui :selected").val();
	var s = $("#aqui :selected").text();
		
	$.get( "/categoria/", { id:x} )
  		.done(function( data ) {
		
		$("select[name='subcategoria']").html("");
		$.each(data,function(index,value){
			
			$("select[name='subcategoria']").append('<option value='+ value.id + '>' + value.categoria+'</option>');
		});
		
		var js = '{"nome":"Sergio", "idade":30}';

		console.log(js);

		// $.get("/teste/",{categoria:s},function(dados){
		// 	console.log(js);
			
		// 	// $.each(dados, function(key, val){
		// 	// 	$("div[name='resultado']").append('<ul class=list-group><li class=list-group-item>' + val + key + '</li></ul>');
		// 	// });
		// 	// // mjs = JSON.parse(dados.responseText);
			
			
		// 	// $("div[name='resultado']").append('<ul class=list-group><li class=list-group-item>' + json_decode + '</li></ul>')
		// })


		
		

		// $("div[name='resultado']").html("");
		// $.each(data,function(intedx,value){
		// 	console.log(data);
				
		// })
		
			
		//VALORES JÁ APARECEM NO CONSOLE E LA NA TELA, PRECISANDO SER TRATADO !
	
	})

	


	$.get("/teste/",{categoria:s})
		.done(function(dados){
			console.log(js);
	});	
	
})
	
	


	














