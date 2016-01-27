<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

require_once('dbinterface.php');

$unsafe_un = isset( $_POST['u_n'] ) ? $_POST['u_n'] : false;
$exists = false;

if($unsafe_un) {
  $db_handle = new dbinterface\PDO_handle();
  
  $record = ($db_handle->pull("3", ['Username' => "$unsafe_un"], $exists))[0];
  $res = [
    'fname' => $record['FirstName'],
    'lname' => $record['LastName'],
  ];
  $exists = json_encode($res);
  $record = null;
  $db_handle = null;
}

echo $exists;
