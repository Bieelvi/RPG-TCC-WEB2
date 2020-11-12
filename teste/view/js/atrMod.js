function calculaAtr(atr, mod){
	var atributo = document.getElementById(atr).value;

	var retorno = testaModificador(atributo);

	if(retorno == -20){
		document.querySelector(atr).value = null;
	} else {
		document.querySelector('[id='+mod+']').value = retorno;		
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
	else if(mod == 20) output = 5;
	else output = -20;

	return output;
}