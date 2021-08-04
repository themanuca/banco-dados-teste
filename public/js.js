
var btn = document.getElementById('logoff');

function off() { 
	document.location.href = "logout"; 
	
}

btn.addEventListener('click', off);


$('#aqui').on('change', function(){

	console.log($(this))
	var x = $("#aqui :selected").val();
		console.log(x);
	$.get( "/categoria/", { id:x} )
  		.done(function( data ) {
			
		$("select[name='subcategoria']").html("");
		$.each(data,function(index,value){
			$("select[name='subcategoria']").append('<option value='+ value.id + '>' + value.categoria+'</option>');
		
		$("div[name='resultado']").html("");
		$.each(data,function(intedx,value){
			console.log(data);
			$("div[name='resultado']").append('<ul class=list-group><li class=list-group-item>' + value.categoria + '</li></ul>')	
		})
		
			
	
	
	})
	
		
	
	})
	
	


	


});











