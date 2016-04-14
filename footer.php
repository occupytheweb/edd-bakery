<?php

$foot = <<<FOOTER
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<footer class="footer-page">
	<div class="footer-right">
		<a><i class="fa fa-facebook"></i></a>
		<a><i class="fa fa-twitter"></i></a>
		<a><i class="fa fa-linkedin"></i></a>
		<a><i class="fa fa-github"></i></a>
	</div>

	<div class="footer-left">
    <p class="radio">Language:
    <input type="radio" name="language" value="english" checked> English
    <input type="radio" name="language" value="french"> French<br>
    </p>
		<p class="footer-links">
			<a href="home.php">Home</a>
			·
			<a href="gallery.php">Gallery</a>
			·
			<a href="breads.php">Bread</a>
      ·
      <a href="store.php">Store</a>
			·
			<a href="about_us.php">About</a>
			·
			<a href="blog.php">Faq</a>
		</p>
		<p class="compname">EdD- Epi de Dieu &copy; 2016</p>
	</div>
</footer>
FOOTER;

echo $foot;
