$(function(){

	$("#formCadastro").on('submit',function(event) {
		event.preventDefault();
		var dados=$(this).serialize();
			  
		$.ajax ({
		  	url: 'controller/cadastroController.php',
		    type: 'post',
		    dataType: 'html',
		    data: dados,
		    success:function(dados){
		    	$('.Retorno').show().html(dados);
		   	}
	  	})
	});
});
