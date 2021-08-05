
var btn = document.getElementById('logoff');

function off() { 
	document.location.href = "logout"; 
	
}
if (btn){
	btn.addEventListener('click', off);
};

$('#aqui').on('change', function(){

	console.log($(this))
	var x = $("#aqui :selected").val();
		
		console.log(x);
	$.get( "/categoria/", { id:x} )
  		.done(function( data ) {
			
		$("select[name='subcategoria']").html("");
		$.each(data,function(index,value){
			$("select[name='subcategoria']").append('<option value='+ value.id + '>' + value.categoria+'</option>');
		
		$.get("/teste/",{id:x},function(response){
			console.log(response)
			$("div[name='resultado']").append('<ul class=list-group><li class=list-group-item>' + response + '</li></ul>')
		})
		$("div[name='resultado']").html("");
		$.each(data,function(intedx,value){
			console.log(data);
				
		})
		
			
		//VALORES JÁ APARECEM NO CONSOLE E LA NA TELA, PRECISANDO SER TRATADO !
	
	})
	
		
	
	})
	
	


	


});











