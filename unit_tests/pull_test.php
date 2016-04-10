<?php

require_once('./../dbinterface.php');


$dbh = new dbinterface\db_handle();
$dbh->set_target("store-cakes");
$record = $dbh->pull("1 2 3", "");

print_r($record);
