<?php

require_once('Product.class.php');


class cart
{
    private $products;
    private $quantities;
    private $sharedProductsData;


    private function update_product_quantity($i, $qty) {
        $this->quandtities[$i] = $qty;
    }


    private function is_in_cart(Product $product, &$idx) {
        for ($i=0; $i < $numOfProducts; $i++) {
            $thispID = $this->products[$i]->sharedID;

            if($thispID == $pID) {
                $found  = true;
                break;
            }
        }
        $idx = $i;

        return $found;
    }


    /**
     * Adds a Product to the cart or increment an existing one's quantity counter
     * @param Product  the Product to add
     */
    public function add(Product $product) {
        $numOfProducts = count($this->products);
        $pID           = $product->sharedID;
        $thispID       = "";
        $idx           = 0;

        $found         = self::is_in_cart($product, $idx);

        if ($found) {
            $newQty = $this->quandtities[$idx] + 1;
            self::update_product_quantity($idx, $newQty);
        } else {
            $this->products[      $idx    ] = $product;
            $this->quantities[    $idx    ] = 1;
            $this->sharedProductsData[$idx] = $product->data_encode();
        }
    }


    /**
     * Builds an array of a specified property of the current Cart's Products
     * @param  String  the required property
     * @return Array   array of the properties
     */
    public function get_products_property($property) {
        $numOfProducts = count($this->products);
        $result        = array();

        for ($i = 0; $i < $numOfProducts; $i++) {
            $result[] = $this->products->$property;
        }

        return $result;
    }


    /**
     * Evaluates the total cost of the Products in the cart
     * @return Float  $sum
     */
    public function total() {
        $prices   = self::get_products_property("price");
        $subTotal = array();

        for ($i=0; $i < count($this->products); $i++) {
            $subTotal[] = $prices[$i] * $quantities[$i];
        }

        $sum = array_sum($subTotal);

        return $sum;
    }
}
