function maiuscula(lstr){

	var str=lstr.value; //obtem o valor

	lstr.value=str.toUpperCase(); //converte as strings e retorna ao campo

}



function minuscula(lstr){

	var str=lstr.value; //obtem o valor

	lstr.value=str.toLowerCase(); //converte as strings e retorna ao campo

}



function mostrarQual(){

	

	if (document.getElementById('cargo_clube').value == "OUTRO"){

		document.getElementById('qual_clube').style.display = 'table-row';

	}

	else{

		document.getElementById('qual_clube').style.display = 'none';

	}

	

	if (document.getElementById('cargo_distrito').value == "OUTRO"){

		document.getElementById('qual_distrito').style.display = 'table-row';

	}

	else{

		document.getElementById('qual_distrito').style.display = 'none';

	}

	

}



function Delegado(){

	

	if (document.getElementById('delegado').value == "SIM"){

		document.getElementById('span_delegado').style.display = 'table-cell';

	}

	else{

		document.getElementById('span_delegado').style.display = 'none';

	}

	

}



function validaForm(){

	

	//Valida CPF

	if (document.getElementById('cpf').value.length < 14) {

 		document.getElementById('cpf').focus();

		document.getElementById('cpf').style.boxShadow = "0.1px 0.1px 3px red";

		alert("Favor fornecer um CPF válido.");

		return false;

	}		

	

	//Valida Data

	var dia = document.getElementById('dia').value;

	var mes = document.getElementById('mes').value;

	var ano = document.getElementById('ano').value;



	if((dia=="" && mes!="") || (dia=="" && ano!="") || (mes=="" && dia!="") || (mes=="" && ano!="") || (ano=="" && dia!="") || (ano=="" && mes!="") ){

		document.getElementById('dia').focus();

		document.getElementById('dia').style.boxShadow = "0.1px 0.1px 3px red";

		document.getElementById('mes').style.boxShadow = "0.1px 0.1px 3px red";

		document.getElementById('ano').style.boxShadow = "0.1px 0.1px 3px red";

		alert("Favor preencher a Data de Nasciemento Corretamente.");

		return false;

	}

}



function tirarShadow(id){

	document.getElementById(id).style.boxShadow = "none";

}









 





