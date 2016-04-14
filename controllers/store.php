<?php

require_once('./../Store.class.php');

$type  = $_POST['store-type'];

$store = new Store($type);

