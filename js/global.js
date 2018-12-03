function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
	document.getElementById(elem).style.display='none';
}

function validerNum(elem){
	var num=document.getElementById(elem).value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && numRegExp.test(num))
		return true;
	return false;
}

function valider(){
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			return true;
	return false;
}

function loginNavItemClicked() {
	$('#navbar').hide();
	$('#view-admin').hide();
	$('#view-login').show();
}

function registerNavItemClicked() {
	$('#navbar').hide();
	$('#view-admin').hide();
	$('#view-register').show();
}

function cancelButtonClicked() {
	$('#navbar').show();
	$('#view-admin').show();
	$('#view-login').hide();
	$('#view-register').hide();
}

lister();

showCategories();
//Cas d'un button
/*
function valider(){
	var formEnreg=document.getElementById('formEnreg');
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			formEnreg.submit();
}
*/