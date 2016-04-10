<?php

require_once('./../persistence.class.php');
require_once('./../Store.class.php');
require_once('./../Product.class.php');


$productSharedID = $_POST['sharedID'];
$idpattern       = "/^(\w+)-(\d+)$/";
preg_match($idpattern, $productSharedID, $match);

$section = $match[1];

$store   = new Store($section);
$product = $store->pull_product($productSharedID);


$user    = persistence::user();

$user->cart->add($product);
