// JavaScript Document
function maiuscula(lstr){
	var str=lstr.value; //obtem o valor
	lstr.value=str.toUpperCase(); //converte as strings e retorna ao campo
}



function minuscula(lstr){
	var str=lstr.value; //obtem o valor
	lstr.value=str.toLowerCase(); //converte as strings e retorna ao campo
}

function mostrarQual(muda, mostra){
	
	if (document.getElementById(muda).value == "OUTRO"){
		document.getElementById(mostra).style.display = 'table-row';
	}
	else{
		document.getElementById(mostra).style.display = 'none';
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
	if((dia=="" && mes!="") || (dia=="" && ano!="") || (mes=="" && dia!="") || (mes=="" && ano!="") || (ano=="" && dia!="") || (ano=="" && mes!="") || (dia=="31" && (mes==("02")||mes==("04")||mes==("06")||mes==("09")||mes==("11")) || (dia=="30" && mes=="02") )){
		document.getElementById('dia').focus();
		document.getElementById('dia').style.boxShadow = "0.1px 0.1px 3px red";
		document.getElementById('mes').style.boxShadow = "0.1px 0.1px 3px red";
		document.getElementById('ano').style.boxShadow = "0.1px 0.1px 3px red";
		
		alert("Favor preencher a Data de Nasciemento Corretamente.");
		return false;
	}
	
	if (document.getElementById('inep').value.length < 8) {
 		document.getElementById('inep').focus();
		document.getElementById('inep').style.boxShadow = "0.1px 0.1px 3px red";
		
		alert("Favor fornecer um Código INEP válido.");
		return false;
	}	
}

function tirarShadow(id){

	document.getElementById(id).style.boxShadow = "none";

}