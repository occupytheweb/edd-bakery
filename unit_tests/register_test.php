<?php

require_once('./../persistence.class.php');
require_once('./../auth.class.php');


$uid      = "eddadmin";
$pass     = "root";

$userData = [
              'FirstName'=> 'dont',
              'LastName' => 'fail',
              'Username' => 'this',
              'Email'    => 'unit',
              'Gender'   => 'test'
            ];


$auth   = new auth($uid);
$user   = $auth->register($uid, $pass, $userData);

$status = $user->authenticated() ? "Sucess" : $user->fail_reason();

echo $status;
