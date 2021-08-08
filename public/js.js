
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
		
		$.getJSON("/teste/",{categoria:s})
			.done(function(dados){
			//console.log(dados);

			var objstr = JSON.stringify(dados); //Transforma o valor JSON que vem como objeto, para ARRAY
			
			//console.log(objstr);

			var obj = JSON.parse(objstr); //Tratando valor do ARRAY, para ser usado com o jquery
			
			//console.log(obj);
			
			
			$.each(obj,function(index,valor){
				//console.log(obj);
				

				$(".table > tbody").append('<tr><td>'+valor.id+'</td>'+'<td>'+valor.nome+'</td><td>' + valor.textoarea+'</td>'+ '<td><a href='+" {{route('download')}}"+'></a>  </td></tr>');
			});
			



		
		});	

		
	})

	


	
	
})
	
	


	














