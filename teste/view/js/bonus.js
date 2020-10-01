function calculaProficiencia() {
	var nivel = document.getElementById("nivel").value;

	var returnBonus = testaProficiencia(nivel);

	if(returnBonus == -20){
		document.querySelector("[id='bonusProficiencia']").value = null;
		document.querySelector("[id='nivel']").value = null;
		alert("Digite um valor entre 1 e 20");
	} else {
		document.querySelector("[id='bonusProficiencia']").value = returnBonus;
		document.querySelector("[name='bonusProficiencia']").value = returnBonus;
	}
}

function testaProficiencia(lvl){
	var bonus;

	if((lvl >= 1) && (lvl <= 4)) 
		bonus = 2;
	if((lvl >= 5) && (lvl <= 8)) 
		bonus = 3;
	if((lvl >= 9) && (lvl <= 12)) 
		bonus = 4;
	if((lvl >= 13) && (lvl <= 16)) 
		bonus = 5;
	if((lvl >= 17) && (lvl <= 20))
		bonus = 6;
	if((lvl > 20) || (lvl < 1)) 
		bonus = -20;

	return bonus;
}

function pegaClasse() {
	var classe = document.getElementById("classe");

    var chooseClasse = classe.options[classe.selectedIndex].text;

    document.querySelector("[name='chooseClasse']").value = chooseClasse;

    return chooseClasse;
}

function pegaRaca() {
	var raca = document.getElementById("raca");

    var chooseRaca = raca.options[raca.selectedIndex].text;

    document.querySelector("[name='chooseRaca']").value = chooseRaca;

    return chooseRaca;
}

function pegaAlinhamento() {
	var alinhamento = document.getElementById("alinhamento");

    var chooseAlinhamento = alinhamento.options[alinhamento.selectedIndex].text;

    document.querySelector("[name='chooseAlinhamento']").value = chooseAlinhamento;

    return chooseAlinhamento;
}