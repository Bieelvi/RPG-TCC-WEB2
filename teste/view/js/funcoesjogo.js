function musica(diretorio){
	att_dois(diretorio);
	refreshDiv_teste_dois();
}

function att_dois(diretorio){
	$.get("lib/manda_audio.php?dir="+diretorio, function(){
	})
}

function imagem(diretorio){
	att(diretorio);
}

function att(diretorio){
	$.get("lib/manda_img.php?dir="+diretorio, function(){
	})
}

function dado(min, max, nome) {
    var valor = Math.floor(Math.random() * (max - min + 1)) + min;
    document.querySelector("[id='valorDado']").value = valor;

    console.log(nome);
    console.log(valor);
}

$(document).ready(function(){
	$("#formTeste").on('submit',function(event) {
		event.preventDefault();
		var dados=$(this).serialize();			  
		$.ajax ({
		  	url: 'lib/insereChat.php',
		    type: 'post',
		    dataType: 'html',
		    data: dados,
		    success:function(dados){
		    	document.querySelector("[name='mensagem']").value = "";
		   	}
		})
	});
});

window.setInterval("refreshDiv_teste()", 500);

function refreshDiv_teste_dois(){
	$.get("lib/atualizaAudio.php", function(resultado){
     	$("#jogo-audio").html(resultado);
	})
}

function refreshDiv_teste(){
	$.get("lib/atualizaImagem.php", function(resultado){
     	$("#jogo-img").html(resultado);
	})
}


window.setInterval("refreshDiv()", 500);

function refreshDiv(){
	$.get("lib/atualizaMensagem.php", function(resultado){
     	$("#dados-chat").html(resultado);
	})
}

function mostrar(){
	for(var i = 1; i < 5; i++){
		document.getElementById("div"+i).hidden = true;
	}
		var obj = event.target.dataset.nome;
		document.getElementById(obj).hidden = false;
	}

function inicia(){
	for(var i = 1; i < 5; i++){
		document.getElementById("div"+i).hidden = true;
	}
	document.getElementById("btn1").addEventListener("click", mostrar);
	document.getElementById("btn2").addEventListener("click", mostrar);
	document.getElementById("btn3").addEventListener("click", mostrar);
	document.getElementById("btn4").addEventListener("click", mostrar);
}

window.addEventListener("load", inicia);
//window.addEventListener("load", carregaMod);

function mostra_oculta(atr){
    var x = document.getElementById(atr);
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}