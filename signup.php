

<!DOCTYPE html>
<html lang="en">
<?php require_once('header.php'); ?>
<head>
	<title>EdD Bakery and Pastry Shop</title>
	<link rel="stylesheet" href="css/register.css" />
	<link rel="stylesheet" href="css/register.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' />
	<link rel="stylesheet" href="css/display.css" />
	<link rel="stylesheet" href="css/typography.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<link rel="stylesheet" href="css/grids.css" />
	<link rel="stylesheet" href="css/glyphs.css" />
	<link rel="stylesheet" href="css/dropdown.css" />
</head>
<body>
<h1>Registration</h1>

<p>Please enter your personal details and click on <strong>next</strong></p>
<div class="container">

<div class="right">
<form action="#" method="post" id="register_form" onsubmit="">
	<table cellpadding="0" cellspacing="0" border="0" class="table_insert">
<!-- add field: address,email(use validation Js), -->

		<tr>
			<th>
			<label for="first_name">First name <em>*</em> : </label>
			</th>
			<td>
				<input type="text" name="first_name" id="first_name" maxlength="15" required/>
			</td>
		</tr>

			<tr>
			<th>
			<label for="last_name">Last name <em>*</em> : </label>
			</th>
			<td>
				<input type="text" name="last_name" id="last_name"  maxlength="25" required/>
			</td>
		</tr>

		<tr>
			<th>
			<label for="date">Date of Birth <em>*</em>:</label>
			</th>
			<td>
				<input type="date" name="date" id="date" />
			</td>
		</tr>
		<tr>
			<th>
			<label for="gender">Gender <em>*</em> : </label>
			</th>
			<td>
				 <input type="radio" name="gender" value="male" checked>  <font color="black">Male</font>
				<input type="radio" name="gender" value="female"> <font color="black">Female</font><br>
			</td>
		</tr>
		<tr>
			<th>
			<label for="last_name">Username <em>*</em> : </label>
			</th>
			<td>
				<input type="text" name="last_name" id="last_name" maxlength="25" />
			</td>
		</tr>
		<tr>
			<th>
			<label for="password">Password <em>*</em> : </label>
			</th>
			<td>
				<input type="password" name="password" id="password" maxlength="25" />
			</td>
		</tr>
		<tr>
			<th>
			<label for="cpassword">Con. Password <em>*</em> : </label>
			</th>
			<td>
				<input type="password" name="cpassword" id="cpassword" maxlength="25"/>
			</td>
		</tr>
		<tr>
			<th>
			<label for="email">Email <em>*</em> : </label>
			</th>
			<td>
				<input type="text" name="email" id="email" maxlength="50" />
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td>
				<label for="btn"></label>
				<input type="submit" id="btn" class="btn" value="Next"/>
			</td>
		</tr>
</table>
</form>
</div>
<div class="left"><img src="register.jpg" class="img"></div>
<div class="clear"></div>
</div>
<script type="text/javascript" src="signupval.js"></script>
</body>

<!-- Enter footer here -->
</html>
