<?php
<<<<<<< HEAD
?>
	  <header class="navbar" role="navigation">
  <div class="container">
    <div class="navbar-header">

      <a id=="navbar-brand" href="/">
        <!-- edd logo -->
      </a>
      </div><!-- ./navbar-header -->

    <div id="contact">

    </div>

    <div class="nav-menu">
      <ul class="nav navbar-nav">
        <li>
          <a href="/">Home</a>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            Cakes
=======

require_once('persistence.class.php');

$right_drop_type = persistence::user()->authenticated() ? "profile" : "login";
$username        = persistence::user()->username;


$login = <<<LOGIN
<li class="nav-login dropdown" id="{$right_drop_type}">
  <a>Login</a>

  <ul class="dropdown-menu">
    <li>
      <span>
        <form action="login.php" method="POST" id="nav-form">
         <input type="email" placeholder="e-mail" name="alias"/>
        </form>
      </span>
    </li>
    <li id="pass">
      <input type="password" placeholder="password" name="password"/>
      <button type="button" id="register_btn">Register</button>
      <button type="button" id="login_btn">Login</button>
    </li>
  </ul>
</li>
LOGIN;

$profile = <<<PROFILE
<li class="nav-login dropdown" id="{$right_drop_type}">
  <a>{$username}</a>

  <ul class="dropdown-menu">
    <li><a>Profile</a></li>
    <li><a>Sign Out</a></li>
  </ul>
</li>
PROFILE;


$header = <<<HEAD
<header class="navbar" role="navigation">
  <div id="bg">
  </div>

  <div class="container">
    <div class="navbar-header">

      <a id="nav-logo" href="/">
        <!-- edd logo -->
      </a>
      </div>

    <div id="contact">

    </div>

    <nav id="sticky-menu" class="nav-menu">
      <ul class="nav navbar-nav">
        <li>
          <a class="tab" href="">Home</a>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle tab">
            Cakes
            <span class="glyphicon glyphicon-menu-down"></span>
>>>>>>> refs/remotes/origin/nesh
          </a>
          <!--TODO:: glyph here-->
          <ul class="dropdown-menu">
            <li>
              <a href="#">Wedding Cakes</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#">Birthday Cakes</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#">Cupcakes</a>
            </li>
            <li class="divider"></li>
            <li>
<<<<<<< HEAD
              <a href="#">Treats & Flavours</a>
=======
              <a href="#">Treats &amp; Flavours</a>
>>>>>>> refs/remotes/origin/nesh
            </li>
          </ul>
        </li>

        <li>
<<<<<<< HEAD
          <a href="#">Bread</a>
        </li>

        <li>
          <a href="#">Prices & Portions</a>
        </li>

        <li>
          <a href="#">About</a>
        </li>

        <li>
          <a href="#">FAQ</a>
        </li>

        <li>
          <a href="#">Contact</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right dropdown">
        <li class="nav-login">
          <a href="#">Login</a>

          <ul class="dropdown-menu">
            <li>
            <span class="invisble">
              <form action="login.php" method="POST" id="nav-form">
               <input type="email" placeholder="e-mail" name="alias"/>
              </form>
            </span>
            </li>
            <li id="pass">
              <input type="password" placeholder="password" name="password"/>
              <button type="button">Register</button>
              <button type="button">Login</button>
            </li>
    </ul><!-- /.dropdown-menu -->
        </li><!-- /.nav-login -->
      </ul><!-- /.nav navbar-nav navbar-right dropdown -->
    </div><!-- /.nav-menu -->
  </div><!-- /.container -->
</header><!-- /.navbar -->
=======
          <a class="tab">Bread</a>
        </li>

        <li>
          <a class="tab">Store</a>
        </li>

        <li>
          <a class="tab">About</a>
        </li>

        <li>
          <a class="tab">FAQ</a>
        </li>

        <li>
          <a class="tab">Contact</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        {${$right_drop_type}}
      </ul>
    </nav>
  </div>
</header>
HEAD;

echo $header;
>>>>>>> refs/remotes/origin/nesh
