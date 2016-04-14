<!DOCTYPE>
<html>

<head>
<title>Contact</title>
  <link rel="stylesheet" href="css/display.css" />
  <link rel="stylesheet" href="css/typography.css" />
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="stylesheet" href="css/grids.css" />
  <link rel="stylesheet" href="css/glyphs.css" />
  <link rel="stylesheet" href="css/dropdown.css" />
  <link rel="stylesheet" href="css/store.css" />
  <link rel="stylesheet" href="css/contact.css" />
  
  <script src="contact.js" rel="stylesheet" type="text/javascript" ></script>
</head>

<body>

<?php
    require_once('header.php');
?>

<?php

	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("contact.xml");
	
	$rootTag = $xml->getElementsByTagName("feedback_db")->item(0);
	
	$feedbackTag = $xml->createElement("feedback");
	
	$userTag = $xml->createElement("user");
	$fullnameTag = $xml->createElement("fullname",$_REQUEST['txtName']);
	$emailTag = $xml->createElement("email",$_REQUEST['emlEmail']);
	
	$subjectTag = $xml->createElement("subject",$_REQUEST['txtSubject']);
	$messageTag = $xml->createElement("message",$_REQUEST['txtMessage']);
	
	$userTag->appendChild($fullnameTag);
	$userTag->appendChild($emailTag);
	
	$feedbackTag->appendChild($userTag);
	$feedbackTag->appendChild($subjectTag);
	$feedbackTag->appendChild($messageTag);
	
	$rootTag->appendChild($feedbackTag);
	
	$xml->save("contact.xml"); 
?>
	
	
	
	

	
 
	<div class="jumbotron">
      <div class="container">
        <h1>Contact</h1>
      </div>
    </div>
 <div class="c_sidebar" >
  <h3>Need a cake?</h3>
  <p>Call today</p>
 </div>
	<article class="">
	<div class="location">
	<label><h3 class="label">Store Location:</h3></label>
	<p>5,Avenue Murphy,Quatres-Bornes</br></p>
	</div>
	
	<div class="hours">
	<label><h3 class="label">Store Hours:</h3></label>
	<p>Monday-Friday 8 A.M.-6 P.M <br/> Saturday 10 A.M.-4 P.M</br></p>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
	
	Phone: 4272565 or 57985211 </br>
	Email: <a href="epi@gmail.com">epi@gmail.com</a></br>
	
	
	
	
	<p><strong>Leave your feedback here:</strong></p>
	<p>If you have found an issue in our customer service,please contact us so that
		we can resolve it as soon as possible. Your satisfaction is our priority.</p>
		
	<br/>
	
	To order a cake, please use the custom <a href="">cake order form</a>.
	
	
	<form method="POST" action="#" id="contactForm">
	<table>
	
	<tr>
	<td><label>Name<em>*</em></label></td>
	<td><input type="text" id="txtName" name="txtName" required="required" placeholder="Full Name" /></td>
	</tr>
	
	<tr>
	<td><label>Email<em>*</em></label></td>
	<td><input type="email" id="emlEmail" name="emlEmail" required="required"  /></td>
	</tr>
	
	<tr>
	<td><label>Subject<em>*</em></label></td>
	<td><input type="text" id="txtSubject" name="txtSubject" required="required"  /></td>
	</tr>
	
	<tr>
	<td><label>Message<em>*</em></label></td>
	<td><textarea cols="25" rows="5" type="text" id="txtMessage" name="txtMessage" required="required"  ></textarea></td>
	</tr>
	
	<tr>
	<td><input type="submit" value="Submit Form" onclick="validateAll()" /></td>
	</tr>
	
	</table>
	</form>
	</article>
	
	</body>
	</html>