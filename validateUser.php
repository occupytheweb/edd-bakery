<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

require_once('dbinterface.php');

$unsafe_un = isset( $_POST['u_n'] ) ? $_POST['u_n'] : false;
$result = ['valid' => "false"];

if($unsafe_un) {
  $db_handle = new dbinterface\db_handle();

  $exists = 0;
  $record = $db_handle->pull("1 2 3", ['Username' => "$unsafe_un"], $exists);

  if(!(empty($record))) {
      $result = [
        'valid' => "true",
        'fname' => $record[0]['FirstName'],
        'lname' => $record[0]['LastName'],
      ];
      $record = null;
      $db_handle = null;
  }
}
echo "exists: $exists";
echo json_encode($result);
