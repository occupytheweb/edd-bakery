<?php

require_once('./../persistence.class.php');
require_once('./../Store.class.php');
require_once('./../Product.class.php');


$user = persistence::user();
$un   = $user->authenticated() ? $user->username : "not logged in";

$cart = $user->cart;

echo "user: {$un}<br />";

print_r($cart);
