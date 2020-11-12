function calculaAtr(atr, mod){
	var atributo = document.getElementById(atr).value;

	var retorno = testaModificador(atributo);

	if(retorno == -20){
		document.querySelector(atr).value = null;
	} else {
		document.querySelector('[id='+mod+']').value = retorno;		
	}
}












function calculaForca(){
	var mod = document.getElementById("atrForca").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrForca']").value = null;
		document.querySelector("[id='modForca']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modForca']").value = returnMod;		
	}
}

function calculaDestreza(){
	var mod = document.getElementById("atrDestreza").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrDestreza']").value = null;
		document.querySelector("[id='modDestreza']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modDestreza']").value = returnMod;	
	}
}

function calculaConstituicao(){
	var mod = document.getElementById("atrConstituicao").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrConstituicao']").value = null;
		document.querySelector("[id='modConstituicao']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modConstituicao']").value = returnMod;		
	}
}

function calculaInteligencia(){
	var mod = document.getElementById("atrInteligencia").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrInteligencia']").value = null;
		document.querySelector("[id='modInteligencia']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modInteligencia']").value = returnMod;	
	}
}

function calculaSabedoria(){
	var mod = document.getElementById("atrSabedoria").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrSabedoria']").value = null;
		document.querySelector("[id='modSabedoria']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modSabedoria']").value = returnMod;

		var sabedoriaPassiva = returnMod + 10;

		document.querySelector("[name='sabedoriaPassiva']").value = sabedoriaPassiva;
		document.querySelector("[name='sabPassiva']").value = sabedoriaPassiva;
	}
}

function calculaCarisma(){
	var mod = document.getElementById("atrCarisma").value;

	var returnMod = testaModificador(mod);

	if(returnMod == -20){
		document.querySelector("[id='atrCarisma']").value = null;
		document.querySelector("[id='modCarisma']").value = null;
		alert("Digite um valor entre 1 e 30");
	} else {
		document.querySelector("[id='modCarisma']").value = returnMod;	
	}
}

function testaModificador(mod){
	var output;

	if(mod == 1) output = -5;
	else if((mod == 2) || (mod == 3)) output = -4;
	else if((mod == 4) || (mod == 5)) output = -3;
	else if((mod == 6) || (mod == 7)) output = -2;
	else if((mod == 8) || (mod == 9)) output = -1;
	else if((mod == 10) || (mod == 11)) output = 0;
	else if((mod == 12) || (mod == 13)) output = 1;
	else if((mod == 14) || (mod == 15)) output = 2;
	else if((mod == 16) || (mod == 17)) output = 3;
	else if((mod == 18) || (mod == 19)) output = 4;
	else if((mod == 20) || (mod == 21)) output = 5;
	else if((mod == 22) || (mod == 23)) output = 6;
	else if((mod == 24) || (mod == 25)) output = 7;
	else if((mod == 26) || (mod == 27)) output = 8;
	else if((mod == 28) || (mod == 29)) output = 9;
	else if(mod == 30) output = 10;
	else output = -20;

	return output;
}