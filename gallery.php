<!DOCTYPE>
<html>

<head>
<title>Gallery</title>
  <link rel="stylesheet" href="css/display.css" />
  <link rel="stylesheet" href="css/typography.css" />
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="stylesheet" href="css/grids.css" />
  <link rel="stylesheet" href="css/glyphs.css" />
  <link rel="stylesheet" href="css/dropdown.css" />
  <link rel="stylesheet" href="css/store.css" />
  <link rel="stylesheet" href="css/gallery.css" />
  <link rel="stylesheet" type="text/css" href="slideshow/jQuery-slideshow-plugin/plugin.css">
</head>

<body>

  <?php
    require_once('header.php');
 ?>
 <div class="main">
<h2 class="g_h2">Gallery</h2>


<div class="slideshow">
    <div class="header">
        <img class="headerImg"
             src="cakes/c11.jpg"
             data-slideshow='cakes/c2.jpg|cakes/c3.jpg|cakes/c1.jpg|cakes/c4.jpg|cakes/c5.jpg|cakes/c6.jpg|cakes/c7.jpg|cakes/c8.jpg|cakes/c9.jpg|cakes/c10.jpg|cakes/c12.jpg'>
    </div>

</div>
<div class="msg">
<p >Choose your section</p>
</div>

<div class="img" align="left">
  <a target="_blank" href="breads.php">
    <img src="res/breads/b6.jpg" alt="breads" width="300" height="200">
  </a>
	<div class="desc">Breads</div>
</div>


<div class="img" align="center">
  <a target="_blank" href="cakes.php">
    <img src="res/cakes/c8.jpg" alt="cakes" width="300" height="200">
  </a>
  <div class="desc">Cakes</div>
</div>


<div class="img" align="right">
  <a target="_blank" href="pastries.php">
    <img src="res/pastries/millefeuille.jpg" alt="pastries" width="300" height="200">
  </a>
  <div class="desc">Pastries</div>
</div>
</div>

 <footer>
					<div class="col-sm-12">
				  	<div class="col-md-offset-2 col-md-3">

						</div>

						<div class="col-md-offset-0 col-md-3">

						</div>



						<div class="col-md-offset-0 col-md-3">
							<div class="vcard">
								<h4 class="coral"><a href="contact/">Contact <span class="fn org">Epi de Dieu Ltd</span></a></h4>
								<p class="tel">465 1001</p>

								<div class="adr">
									<p>
										<span class="street-address">Rémi Ollier Street</span><br />
										<span class="locality">Quatre-Bornes</span>, <span class="region">PW</span>, <span class="postal-code">0000</span>
									</p>
								</div>

								<p><span class="tel"><span class="type">F<span class="d">ax</span></span>: <span class="value">(+230) 465 1001</span></span></p>
								<p class="e">E<span class="d">mail</span>: <a href="&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64; &#108;&#111;&#99;&#97;&#108;&#104;&#111;&#115;&#116;" class="email that-thing"><span class="that-thing" style="unicode-bidi: bidi-override; direction: rtl;"> &#116;&#115;&#111;&#104;&#108;&#97;&#99;&#111;&#108;&#64;&#116;&#99;&#97;&#116;&#110;&#111;&#99; </span></a></p>
							</div><!-- /.vcard -->
						</div>
					</div>
					<div style="clear: both; height: 25px; width: 100%; bottom: 0px; background-image: url(res/ft.png);">
					</div>
				</footer>



        <script type="text/javascript" src="jquery.js"></script>
         <script type="text/javascript" src="utils.js"></script>
         <script type="text/javascript" src="ajax.js"></script>
         <script type="text/javascript" src="header.js"></script>
         <script src="slideshow/js/jquery-1.11.1.min.js"></script>
<script src="slideshowjs/jquery.hammer-full.min.js"></script>
<script src="slideshow/jQuery-slideshow-plugin/plugin.js"> </script>
<script src="slideshow/js/slideshow.js"></script>




</body>
</html>
