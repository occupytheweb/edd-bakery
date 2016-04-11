function validateAll(){
	if(!checkBlankName()){
		return false;
	}
	if(!checkBlankEmail()){
		return false;
	}
	if(!checkBlankSubject()){
		return false;
	}
	if(!checkBlankMessage()){
		return false;
	}
	return true;
	
}


function checkBlankName(){
	var name = document.getElementById("txtName").value;
	if(name.length == 0){
		alert ( "Enter a name");
		return false;
	}
	return true;
	
}

function checkBlankEmail(){
	var email = document.getElementById("emlEmail").value;
	if(email.length == 0){
		alert ( "Enter an email");
		return false;
	}
	return true;
	
}

function checkBlankSubject(){
	var subject = document.getElementById("txtSubject").value;
	if(subjuct.length == 0){
		alert ( "Enter a subject");
		return false;
	}
	return true;
	
}

function checkBlankMessage(){
	var message = document.getElementById("txtMessage").value;
	if(message.length == 0){
		alert ( "Enter a message");
		return false;
	}
	return true;
	
}