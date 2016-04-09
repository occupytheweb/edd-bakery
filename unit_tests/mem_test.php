<?php

require_once('./../persistence.class.php');
require_once('./../user.php');


$user   = persistence::user();
$status = $user->authenticated() ? "still logged in: $user->username" : "no user logged in";


echo $status;
