<?php
?>
  <header class="navbar" role="navigation">
    <div id="bg">
    </div>

    <div class="container">
      <div class="navbar-header">

        <a id="nav-logo" href="/">
          <!-- edd logo -->
        </a>
        </div><!-- ./navbar-header -->

      <div id="contact">

      </div>

      <nav class="nav-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="">Home</a>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle">
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
                <a href="#">Treats & Flavours</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#">Bread</a>
          </li>

          <li>
            <a href="#">Store</a>
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

        <ul class="nav navbar-nav navbar-right">
          <li class="nav-login dropdown" id="login">
            <a>Login</a>

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
      </nav><!-- /.nav-menu -->
    </div><!-- /.container -->
  </header><!-- /.navbar -->
