// JavaScript Document

function MouseOver(id){
	
	document.getElementById(id).style = "border: none;box-shadow:none;";
}

function normalBotao (){
	
	 var td = document.getElementsByClassName('td_menu');
	 
	 for (var i=0; i<td.length; i++)	 
	 	td[i].style = "border: 1px solid #CCCCCE;box-shadow: 0 3px 0 rgba(0, 0, 0, .3), 0 2px 7px rgba(0, 0, 0, 0.2);";
	
}

function clickBotao (id){
	document.getElementById(id).style = "box-shadow: inset 0 0 7px rgba(0, 0, 0, .2); top: 4px;";
	
}

function botBuscar(){ 
	var display = document.getElementById('div_buscar').style.display;
	if (display == '' || display == 'none'){
		document.getElementById('div_buscar').style.display = 'block';
		document.getElementById('div_menu').style.display = 'none';
		$("#div_principal").html('');
	}
	else{
		document.getElementById('div_buscar').style.display = 'none';
		document.getElementById('div_menu').style.display = 'block';
		$('#div_principal').load('formulario/fichaCadastral.php');
	}
	
}