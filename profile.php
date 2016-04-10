<?php
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/display.css" />
  <link rel="stylesheet" href="./css/grids.css" />
  <link rel="stylesheet" href="./css/glyphs.css" />
  <link rel="stylesheet" href="./css/dropdown.css" />
  <link rel="stylesheet" href="./css/typography.css" />
  <link rel="stylesheet" href="./css/profile.css" />
</head>
<body>

  <?php
  require_once('header.php');
  ?>

  <div class="page-content">
    <div class="user-pane">
      <img class="avatar" alt="avatar" height="230" width="230">
      <h1 class="user-name">
        <div class="user-name-full">Alan Jean</div>
        <div class="user-name-handle">occupytheweb</div>
      </h1>
      <ul class="user-details">
        <li class="user-location">
          <div>Rose-Hill</div>
          <div>Plaine-Wilhems</div>
        </li>

        <li class="user-joined">Joined on 12-02-16</li>
      </ul>
    </div>
    <div class="panel">
      <nav class="nav-tabs">
        <a class="tab active">Message Log</a>
        <a class="tab">Cart</a>
        <a class="tab">Profile</a>
        <button type="button">Edit Profile</button>
      </nav>

      <ul class="nav-vert">
        <li class="vert-tab">M</li>
        <li class="vert-tab">C</li>
        <li class="vert-tab">P</li>
      </ul>

      <div class="">

      </div>
    </div>
  </div>
  <script src="./handler.js"></script>
</body>
</html>
