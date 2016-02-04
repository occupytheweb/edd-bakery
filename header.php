<?php
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
