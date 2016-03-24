<?php

require_once('./../persistence.php');
require_once('./../auth.php');


$uid  = "eddadmin";
$pass = "root@eddadmin_0x";


$auth = new auth($uid);

$auth_result = $auth->login($uid, $pass);

$user        = $auth_result['user'];
$status      = $auth_result['status'] ? "user logged in: $user->username" : "password incorrect";


persistence::persist_user($user);


echo "user: $uid, password: $pass <br />";
echo $status;
