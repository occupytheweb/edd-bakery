<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<script type="text/javascript" src="form.js"></script>
		<title>EdD Bakery and Pastry Shop</title>
		<link rel="stylesheet" href="css/customizeC.css"/>



	<link rel="stylesheet" href="css/display.css" />
	<link rel="stylesheet" href="css/typography.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<link rel="stylesheet" href="css/grids.css" />
	<link rel="stylesheet" href="css/glyphs.css" />
	<link rel="stylesheet" href="css/dropdown.css" />

	</head>

	<body>
		<div class="whole-page">
			<?php
			require_once('header.php');
			?>
			<h1 class="title"> Custom cake order </h1>
			<div class="form" >
				<form method="POST" id="custom_form" action="#" >

					<label for="customername">Customer Name:<em>*</em> </label>
					<input type="text" name="customername" id="customername" maxlength="20" required/><br><br />

					<label for="phone">Phone Number:<em>*</em> </label>
					<input type="text" name="phone" id="phone" maxlength="8" required/> <br><br/ >

					<label for="email">Email:<em>*</em> </label>
					<input type="text" name="email" id="email" required/> <br><br />

					<label for="pickupdate">Pick-Up Date:<em>*</em> </label>
					<input type="date" name="pickupdate" id="pickupdate"  required/> <br><br />
					<p>Pickup date must be at least 48 hours AFTER order submission. If not, please call us directly at (230) xxx xxxx.</p><br />

					<label for="pickuptime">Pick-Up Time:<em>*</em> </label>
					<input type="time" name="pickuptime" id="pickuptime" step="900" required/> <br><br />

					<label for="frostings">Frosting Type:<em>*</em></label>
					<select id="frosting" onchange="selectedFrosting()">
						<option value="">Pick a Frosting</option>
						<option value="no_frost">No Frosting</option>
						<option value="choco_buttercream">Chocolate Buttercream</option>
						<option value="white_chocolate">White Chocolate Whipped cream</option>
					</select>
					<span id="frostingIm"></span>
					<h2>Special Instructions:</h2>
					<label for="theme_cake">Theme:</label>
					<input type="text" name="theme_cake" id="theme_cake"/> <br><br />
				</form>

			</div>
		</div>
	</body>
</html>
