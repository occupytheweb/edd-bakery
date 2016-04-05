function selectedFrosting(){
	if(document.getElementById('frosting').value==""){
		document.getElementById('frostingIm').innerHtml="Please Choose a frosting";	
	}
	if(document.getElementById('frosting').value=="no_frost"){
		document.getElementById('frostingIm').innerHtml = "No Frosting";	
	}
	if(document.getElementById('frosting').value=="choco_buttercream"){
		document.getElementById('frostingIm').innerHtml = "Chocolate Buttercream";	
	}
	
	
}