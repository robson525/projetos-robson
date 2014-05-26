// JavaScript Document

/* ---------------- FUNÇÕES DO MENU ---------------- */

function MouseOver(id){
	document.getElementById(id).style.border = "none";
}
function MouseOut(id){
	document.getElementById(id).style.border = "1px solid #CCCCCE";
}
function normalBotao (){
	
	 var td = document.getElementsByClassName('td_menu');
	 
	 for (var i=0; i<td.length; i++){	 
	 	td[i].style.borderRadius = "3px";
		td[i].style.boxShadow = "0 3px 0 rgba(0, 0, 0, .3), 0 2px 7px rgba(0, 0, 0, 0.2)";
		td[i].style.color = "#000000";
	 }

}
function clickBotao (id){
	document.getElementById(id).style.borderRadius = "5px";
	document.getElementById(id).style.boxShadow = "inset 0 0 7px rgba(0, 0, 0, .2)";
	document.getElementById(id).style.color = "#575758";
}
/* --------------------------------------------------------------------------------------- */





/* ----------------------------------------------------------------------------------------- */

// Função do Contador de Logout
	var inicio = new Date();
	var YY = inicio.getFullYear();
	var MM = inicio.getMonth()+1;
	var DD = inicio.getDate();
	var HH = inicio.getHours() + 3;
	var MI = inicio.getMinutes();
	var SS = inicio.getSeconds();

	function atualizaContador() {
		var hoje = new Date();
		var futuro = new Date(YY,MM-1,DD,HH,MI,SS);
		
		var ss = parseInt((futuro - hoje) / 1000);
		var mm = parseInt(ss / 60);
		var hh = parseInt(mm / 60);
		var dd = parseInt(hh / 24);
		
		ss = ss - (mm * 60);
		mm = mm - (hh * 60);
		hh = hh - (dd * 24);
		
		var faltam = 'Sua sessão expira em ';
		faltam += (dd && dd > 1) ?dd+'dias, ' : (dd==1 ? '1 dia, ' : '');
		faltam += (hh && hh > 0) ? hh+' hs, ' : '';
		faltam += (toString(mm).length) ? mm+' min e ' : '';
		faltam += ss+' seg';
		
		if (dd+hh+mm+ss > 0) {
			document.getElementById('div_contador').innerHTML = faltam;
			setTimeout(atualizaContador,1000);
		} else {
			location.href = "sair.php";
		}
	}