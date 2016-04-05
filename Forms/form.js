"use strict";

function selectedFrosting() {
		var frostType     = document.getElementById('frosting').value;
		var frostSelected = document.getElementById('frostingIm');
		var msg           = "";

		switch(frostType) {
				case "no_frost":
						msg = "No Frosting";
						break;
				case "choco_buttercream":
						msg = "Chocolate Buttercream";
						break;
				default:
						msg = "Please choose a frosting";
		}

		frostSelected.innerHTML = msg;
}