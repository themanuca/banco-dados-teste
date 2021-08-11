
var btn = document.getElementById('logoff');

function off() { 
	document.location.href = "logout"; 
	
}
if (btn){
	btn.addEventListener('click', off);
};


contDW = 0;

$('#aqui').on('change', function(){

	//console.log($(this))
	var x = $("#aqui :selected").val();
	var s = $("#aqui :selected").text();
	var k = "Ferrari";

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
				

				$(".table > tbody").append('<tr><td>'+valor.id+'</td>'+'<td>'+valor.nome+'</td><td>' + valor.textoarea+'</td>'+ '<td class="dw"><a href="http://localhost:8000/storage/app/public/'+valor.file_path +  '" '+ '  download  > CLIQUE</a>  </td></tr>');
				
				
				$(".dw").on('click', function(){
					
					
					// window.open('http://localhost:8000/teste/download','_blank');
					
					$.get("/teste/download").done(function(){
						$.ajax({
							url:"/teste/download",
							type:'POST',
							dataType: 'json',
							
						})

						


					})
					
					
					
					
				})

				
				
			});
			

			

		
		});	

		
	})

	


	
	
})
	
	


	














