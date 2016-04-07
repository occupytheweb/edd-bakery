<?php

require_once('./../persistence.php');
require_once('./../user.php');


$user   = persistence::user();
$status = isset($user) ? "logged in: $user->username" : "no user logged in";


print_r($user) && print "<br />";
echo $status;
