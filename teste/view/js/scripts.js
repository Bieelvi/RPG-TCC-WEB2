function calculaForca(){
	var mod = document.getElementById("atrForca").value;

	var output;

	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrForca']").value = 1;
		alert("Digite um valor entre 0 e 30");			
	}
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modForca']").value = output;
}

function calculaDestreza(){
	var mod = document.getElementById("atrDestreza").value;

	var output;

	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrDestreza']").value = 1;
		alert("Digite um valor entre 0 e 30");	
	}		
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modDestreza']").value = output;
}

function calculaConstituicao(){
	var mod = document.getElementById("atrConstituicao").value;

	var output;
		
	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrConstituicao']").value = 1;
		alert("Digite um valor entre 0 e 30");	
	}		
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modConstituicao']").value = output;
}

function calculaInteligencia(){
	var mod = document.getElementById("atrInteligencia").value;

	var output;
		
	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrInteligencia']").value = 1;
		alert("Digite um valor entre 0 e 30");	
	}		
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modInteligencia']").value = output;
}

function calculaSabedoria(){
	var mod = document.getElementById("atrSabedoria").value;

	var output;
		
	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrSabedoria']").value = 1;
		alert("Digite um valor entre 0 e 30");	
	}	
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modSabedoria']").value = output;
}

function calculaCarisma(){
	var mod = document.getElementById("atrCarisma").value;

	var output;
		
	if(mod < 1 || mod > 30){
		document.querySelector("[id='atrCarisma']").value = 1;
		alert("Digite um valor entre 0 e 30");	
	}		
	if(mod == 1) output = -5;
	if((mod == 2) || (mod == 3)) output = -4;
	if((mod == 4) || (mod == 5)) output = -3;
	if((mod == 6) || (mod == 7)) output = -2;
	if((mod == 8) || (mod == 9)) output = -1;
	if((mod == 10) || (mod == 11)) output = 0;
	if((mod == 12) || (mod == 13)) output = 1;
	if((mod == 14) || (mod == 15)) output = 2;
	if((mod == 16) || (mod == 17)) output = 3;
	if((mod == 18) || (mod == 19)) output = 4;
	if((mod == 20) || (mod == 21)) output = 5;
	if((mod == 22) || (mod == 23)) output = 6;
	if((mod == 24) || (mod == 25)) output = 7;
	if((mod == 26) || (mod == 27)) output = 8;
	if((mod == 28) || (mod == 29)) output = 9;
	if(mod == 30) output = 10;

    document.querySelector("[id='modCarisma']").value = output;
}