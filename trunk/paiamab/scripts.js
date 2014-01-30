// JavaScript Document

function MouseOver(id){
	
	document.getElementById(id).style = "border: none;box-shadow:none;";
}

function MouseOut (id){
	document.getElementById(id).style = "border: 1px solid #CCCCCE;box-shadow: 0 3px 0 rgba(0, 0, 0, .3), 0 2px 7px rgba(0, 0, 0, 0.2);";
	
}

function Click (id){
	document.getElementById(id).style = "box-shadow: inset 0 0 7px rgba(0, 0, 0, .2); top: 4px;";
	
}