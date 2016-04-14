<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache');

require_once('./../persistence.class.php');
require_once('./../auth.class.php');
require_once('./../user.php');

$uid       = $_POST['uid' ];
$pass      = $_POST['pass'];

$auth      = new auth($uid);

$user      = $auth->login($uid, $pass);

$authState = $user->authenticated() ? "true" : "false";
$username  = $user->username;
$reason    = $user->fail_reason();


persistence::persist_user($user);


$status    = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<login_status xmlns="http://edd-bakery.com/auth">
  <username>{$username}</username>
  <status>
    <state>{$authState}</state>
    <reason>{$reason}</reason >
  </status>
</login_status>
XML;

echo $status;
