<?php

require_once('./../persistence.class.php');
require_once('./../auth.class.php');


$uid  = "eddadmin";
$pass = "root@eddadmin_0x";


$auth = new auth($uid);

$user   = $auth->login($uid, $pass);
$status = $user->authenticated() ? "user logged in: $user->username" : "auth failed<br />reason: {$user->fail_reason()}";


persistence::persist_user($user);


echo "user: $uid, password: $pass <br />";
echo $status;
