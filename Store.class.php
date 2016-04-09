<?php

require_once('dbinterface.php');
require_once('Product.class.php');

class Store
{
    private $dbh;
    private $section;
    private $products;


    private function pull_products() {
        $this->products = empty($this->products) ? $this->dbh->pull() : $this->products;
        return $this->products;
    }


    public function __construct($target) {
        $this->section = $target;
        $target        = "store-$target";
        $this->dbh     = new dbinterface\db_handle();
        $this->dbh->set_target($target);
    }


    /**
     * Instantiates a Product object from the product data referenced by a given index or sharedProductID
     * @param  mixed     $id  the index or the sharedPID of the required product data from $this->product
     * @return Product        the instantiated Product
     */
    public function pull_product($id) {
        self::pull_products();
        $sharedIDPattern = "/^\w+-(\d+)$/";

        if (preg_match($sharedIDPattern, $id, $pID)) {
            $id = $pID[1];
            $i  = count($this->products);
            while ($i--) {
                if ($this->products[$i]['ID'] == $id) {
                    $productData = $this->products[$i];
                    break;
                }
            }
        } else {
            $productData = $this->products[$id];
        }

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


    /**
     * Prints a script containing a JSON representation of the current Store's public Products details
     * @return String  HEREDOC of the HTML-ready js script tag
     */
    public function print_encoded_products_data() {
        self::pull_products();
        $data = array();
        $i    = count($this->products);

        while ($i--) {
            $thisProduct = self::pull_product($i);

            if ($thisProduct->active) {
                $data[ "{$thisProduct->sharedID}" ] = $thisProduct->data_encode();
            }
        }


        $encodedData = addslashes(json_encode($data));

        $js_var      = <<<JS
<script type="text/javascript">
var products = JSON.parse(' {$encodedData} ');
</script>
JS;
        echo $js_var;
    }


    public function __destruct() {
        $this->dbh = null;
    }
}


