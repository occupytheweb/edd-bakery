<?php

require_once('./../dbinterface.php');


$dbh = new dbinterface\db_handle();
$dbh->set_target("users");

$dbh->push("1 2 3", "MyFirstName MyLastName username");

$udata = $dbh->pull("*");
print_r($udata);

$dbh = null;
