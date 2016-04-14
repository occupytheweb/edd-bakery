<?php

require_once('./../auth.class.php');

$uid    = $_POST['uid'];

$auth   = new auth($uid);

$status = $auth->validate_user();

echo json_encode($status);
