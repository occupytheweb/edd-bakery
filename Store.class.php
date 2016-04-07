<?php

require_once('dbinterface.php');
require_once('Product.class.php');

class Store
{
    private $dbh;
    private $section;
    private $products;


    private function pull_products() {
        $this->products = $this->dbh->pull();
        return $this->products;
    }


    public function __construct($target) {
        $this->section = $target;
        $target        = "store-$target";
        $this->dbh     = new dbinterface\db_handle();
        $this->dbh->set_target($target);
    }


    /**
     * Instantiates a Product object from the product data referenced by a given index
     * @param  int     $id  the index of the required product data from $this->product
     * @return Product      the instantiated Product
     */
    public function pull_product($id) {
        $productData = isset($this->products) ? $this->products[$id] : self::pull_products()[$id];
        return new Product($this->section, $productData);
    }


    /**
     * Prints the current store's products' markup
     */
    public function print_products() {
        self::pull_products();
        $i = count($this->products);

        while ($i--) {
            $thisProduct = self::pull_product($i);

            if ($thisProduct->active) {
                $thisProduct->write();
            }
        }
    }


    public function __destruct() {
        $this->dbh = null;
    }
}
