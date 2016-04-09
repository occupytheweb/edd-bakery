<?php

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
              <a href="#">Treats &amp; Flavours</a>
            </li>
          </ul>
        </li>

        <li>
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
