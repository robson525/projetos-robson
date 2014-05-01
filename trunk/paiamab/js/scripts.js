// JavaScript Document

function MouseOver(id){
	
	document.getElementById(id).style = "border: none;box-shadow:none;";
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
