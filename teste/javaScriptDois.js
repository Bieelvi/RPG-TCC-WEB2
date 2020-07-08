$("#formLogin") .on('submit',function(event) {
	event.preventDefault();
	var dados=$(this).serialize();
  
	$.ajax ({
	  	url: 'controller/loginController.php',
	    type: 'post',
	    dataType: 'html',
	    data: dados,
	    success:function(dados){
	    	$('.RetornoNegativo').show().html(dados);
	   	}
  	})
});