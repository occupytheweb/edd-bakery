<?php

require_once('Store.class.php');
require_once('Product.class.php');


$productSharedID = $_POST['sharedID'];
$idpattern       = "/^(\w+)-(\d+)$/";
preg_match($idpattern, $productSharedID, $match);

$section = $match[1];

$store   = new Store($section);
$product = $store->pull_product($productSharedID);

$data    = $product->data_encode();

/*
$xml = <<<XML
<?php version="1.0" encoding="UTF-8" ?>
<product>
  <name>
</product>
XML;
*/

echo json_encode($data);
