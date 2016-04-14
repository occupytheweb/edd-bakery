<?php

require_once('persistence.class.php');

$right_drop_type = persistence::user()->authenticated() ? "profile" : "login";
$username        = persistence::user()->username;


$profile = <<<PROFILE
<li class="nav-login dropdown" id="{$right_drop_type}">
  <a>{$username}</a>

  <ul class="dropdown-menu">
    <li id="profile"><a>Profile</a></li>
    <li id="sign_out"><a>Sign Out</a></li>
  </ul>
</li>
PROFILE;

$val_js  = <<<SRC
<script type="text/javascript" src="signupval.js"></script>
SRC;

$register = <<<REGISTER
{$val_js}
<div class="modal" id="register-container">
  <formid="register_form">
    <table cellpadding="5px" cellspacing="5px" border="0" class="table_insert">
      <tr>
        <th>
        <label for="first_name">First name *:</label>
        </th>
        <td>
          <input type="text" name="first_name" id="first_name" maxlength="15" required/>
        </td>
      </tr>
      <tr>
        <th>
          <label for="last_name">Last name *:</label>
        </th>
        <td>
          <input type="text" name="last_name" id="last_name"  maxlength="25" required/>
        </td>
      </tr>
      <tr>
        <th>
          <label for="date">Date of Birth:</label>
        </th>
        <td>
          <input type="date" name="date" id="date" />
        </td>
      </tr>
      <tr>
        <th>
          <label for="gender">Gender: </label>
        </th>
        <td>
          <input type="radio" name="gender" value="male" checked />Male
          <input type="radio" name="gender" value="female" />Female
        </td>
      </tr>
      <tr>
        <th>
          <label for="user_name">Username *: </label>
        </th>
        <td>
          <input type="text" name="user_name" id="user_name" maxlength="25" />
        </td>
      </tr>
      <tr>
        <th>
          <label for="password">Password *: </label>
        </th>
        <td>
          <input type="password" name="password" id="password" maxlength="25" />
        </td>
      </tr>
      <tr>
        <th>
        <label for="cpassword">Confirm Password *: </label>
        </th>
        <td>
          <input type="password" name="cpassword" id="cpassword" maxlength="25"/>
        </td>
      </tr>
      <tr>
        <th>
        <label for="email">Email *:</label>
        </th>
        <td>
          <input type="text" name="email" id="email" maxlength="50" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="button" id="register_submit" onclick="return ValidateAll()">Register</button>
        </td>
      </tr>
  </table>
  </form>
</div>
REGISTER;

$login = <<<LOGIN
<li class="nav-login dropdown" id="{$right_drop_type}">
  <a>Login</a>

  <ul class="dropdown-menu">
    <li>
      <form id="auth_frm">
        <div id="login-inputs">
          <div>
            <input type="email" id="login-uid" placeholder="username | e-mail" required/>
            <span id="uid-status" class="auth-status"></span>
          </div>
          <div>
            <input type="password" id="login-pass" placeholder="password" required/>
            <span id="pass-status" class="auth-status"></span>
          </div>
        </div>
        <div id="login-actions">
          <button type="button" id="login_btn">Login</button>
          <button type="button" id="register_btn">Register</button>
        </div>
      </form>
    </li>
  </ul>
</li>
{$register}
LOGIN;

$header = <<<HEAD
<header id="header-container" class="navbar" role="navigation">
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
