

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
	var x = $("#aqui :selected").val();  //AQUI PEGO O VALOR DA SELECT
	var s = $("#aqui :selected").text(); //AQUI PEGO O NOME DA SELECT
	var k = "Ferrari";

	$.get( "/categoria/", { id:x} ) //AQUI FAÇO UMA REQUISIÇÃO JQUERY PARA PEGAR O VALORES JOGADO PELO LARAVEL NA ROTA, ATRAVES DA CONTROLLERS.
  		.done(function( data ) {
		
		$("select[name='subcategoria']").html("");
		$.each(data,function(index,value){ //LAÇO PARA A CRIAÇÃO DA <SELECTED> COM VALORES DA SUB
			
			$("select[name='subcategoria']").append('<option value='+ value.id + '>' + value.categoria+'</option>'); //AQUI PEGO OS VALORES DA SUBCATEGORIA, VALORES QUE FICA TABELA DE CATEGORIA, ONDE CADA UM SE DIFERENCIA PELO SEU ID, MESMO NA MESMA TABELA. (NESSE CASO NÃO TEM NENHUM VALOR)
		});
		
		$.getJSON("/teste/",{categoria:s}) //AQUI FAÇO UMA REQUISIÇÃO JQUERY PARA PEGAR O VALORES JOGADO PELO LARAVEL NA ROTA, ATRAVES DA CONTROLLERS.
			.done(function(dados){
			//console.log(dados);

			var objstr = JSON.stringify(dados); //Transforma o valor JSON que vem como objeto, para ARRAY
			
			//console.log(objstr);

			var obj = JSON.parse(objstr); //Tratando valor do ARRAY, para ser usado com o jquery
			
			//console.log(obj);
			
			
			
			$.each(obj,function(index,valor){ //LAÇO PARA A CRIAÇÃO DA TABELA <TD> <TR>
				//console.log(obj);
				

				$(".table > tbody").append('<tr><td>'+valor.id+'</td>'+'<td>'+valor.nome+'</td><td>' + valor.textoarea+'</td>'+ '<td ><a href="http://localhost:8000/storage/app/public/'+valor.file_path +  '" '+ ' class="dw" download  > CLIQUE</a>  </td></tr>');
				
				
				$(".dw").on('click', function(){
					
					
					// window.open('http://localhost:8000/teste/download','_blank');
					
					$.post("/teste/download",{_token:$("meta[name='csrf-token']").attr('content'),id:x}).done(function(){ //USANDO O JQERY PARA A REQUISIÇÃO E PARA PASSAR O _TOKEN CSRV.
						
						
						
						
					
					})

					
					
					
				
				})		

				
				
			})
			

			

		
		})

		
	})


})
	


	
	

	
	


	














