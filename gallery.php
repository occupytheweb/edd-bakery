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
</head>

<body>

  <?php
    require_once('header.php');
 ?>

 <div class="main">
<h2 class="g_h2">Gallery</h2>



<div class="msg">
<p >Choose your section</p>
</div>

<div class="img" align="left">
  <a target="_blank" href="breads.php">
    <img src="res/breads/b6.jpg" alt="breads" width="300" height="200">
  </a>
	<div class="desc">Breads</div>
</div

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


<div class="slideshow">
    <div class="header">
        <img class="headerImg"
             src="cakes/c11.jpg"
             data-slideshow='cakes/c2.jpg|cakes/c3.jpg|cakes/c1.jpg|cakes/c4.jpg|cakes/c5.jpg|cakes/c6.jpg|cakes/c7.jpg|cakes/c8.jpg|cakes/c9.jpg|cakes/c10.jpg|cakes/c12.jpg'>
    </div>

</div>

</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="utils.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="header.js"></script>

<script type="text/javascript" src="./res/slideshow/jquery.hammer-full.min.js"></script>
<script type="text/javascript" src="./res/slideshow/plugin.js"></script>
<script type="text/javascript" src="./res/slideshow/slideshow.js"></script>
<link rel="stylesheet" type="text/css" href="./res/slideshow/plugin.css">



</body>
</html>
