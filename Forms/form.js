"use strict";

function selectedFrosting() {
		var frostType     = document.getElementById('frosting').value;
		var frostSelected = document.getElementById('frostingIm');
		var imgs          = "";

		switch(frostType) {
				case "no_frost":
						imgs = "No Frosting";
						break;
				case "choco_buttercream":
						imgs = "<img src='Frosting_type/chocolate_buttercream.jpg'></img>";
						break;
				case "mocca_buttercream":
						imgs = "<img src='Frosting_type/mocca.jpg'></img>";
						break;
				case "lemon_buttercream":
						imgs = "<img src='Frosting_type/lemon.jpg'></img>";
						break;
				case "vanilla":
						imgs = "<img src='Frosting_type/Whipped_Vanilla_Buttercream_Frosting.jpg'></img>";
						break;
				case "orange":
						imgs = "<img src='Frosting_type/orange.jpg'></img>";
						break;
				case "white_chocolate":
						imgs = "<img src='Frosting_type/white_chocolate_whipped_cream.jpg'></img>";
						break;
				case "strawberry":
						imgs= "<img src='Frosting_type/Strawberry.jpg'></img>";
						break;
				case "raspberry":
						imgs= "<img src='Frosting_type/raspberry.jpg'></img>";
						break;
				case "peach":
						imgs= "<img src='Frosting_type/peach.jpg'></img>";
						break;
	  		case "strawberry":
						imgs= "<img src='Frosting_type/Strawberry.jpg'></img>";
						break;
				case "caramel":
						imgs= "<img src='Frosting_type/caramel.jpg'></img>";
						break;
				default:
						imgs = "Please choose a frosting";
		}

		frostSelected.innerHTML = imgs;
}

function selectedFilling() {
	var fillingType				= document.getElementById('filling').value;
	var fillingSelected		=	document.getElementById('fillingIm');
	var	img							="";

	switch(fillingType){

		case "No_filling":
			imgs= "No filling";
			break;
		case "coconut":
			img= "<img src='Filling/coconutpecan.jpg'></img>";
			break;
		case "oreo":
			img= "<img src='Filling/oreomousse.jpg'></img>";
			break;
		case "lemoncurd":
			img= "<img src='Filling/lemoncurd.jpg'></img>";
			break;
		case "pastrycream":
			img= "<img src='Filling/pastrycream.jpg'></img>";
			break;
		case "peachjam":
			img= "<img src='Filling/peachejam.jpg'></img>";
			break;
		case "peachmousse":
			img= "<img src='Filling/peachmousse.jpg'></img>";
			break;
		case "raspberryjam":
			img= "<img src='Filling/Raspberryjam.jpg'></img>";
			break;
		case "strawberrymousse":
			img= "<img src='Filling/strawberrymousse.jpg'></img>";
			break;
		case "whitechoco":
			img= "<img src='Filling/white.jpg'></img>";
			break;
		default:
			img= "Please choose a Filling";
	}
	fillingSelected.innerHTML	=	img;
}
