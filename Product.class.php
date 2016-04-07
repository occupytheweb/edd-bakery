<?php

require_once('dbinterface.php');

class Product
{
    private $type;
    private $id;
    private $name;
    private $details;
    private $price;
    private $imageBasePath;
    private $active;


    private function data_encode() {
        $data = [
                  'id'      => $this->id,
                  'name'    => $this->name,
                  'details' => $this->details,
                  'price'   => $this->price
                ];

        return json_encode($data);
    }


    public function __construct($type, $productData) {
        $this->type          = $type;
        $this->id            = $productData['ID'];
        $this->name          = $productData['Name'];
        $this->details       = $productData['Details'];
        $this->price         = $productData['Price'];
        $this->imageBasePath = $productData['ImageBasePath'];
        $this->active        = true;//$productData['ActiveStatus'];
    }


    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }


    /**
     * Resolves the path of one of the current's product image
     * @param  int $imgID  the level of the required image (1 = Main Product Image)
     * @return string      the resolved image's path
     */
    public function image_source($imgID = 1) {
        $src  = "res/products/$this->imageBasePath/$imgID";
        $src .= file_exists("$src.jpg") ? ".jpg" : ".png";
        return $src;
    }

    /**
     * Prints the current product's HTML representation
     */
    public function write() {
        $img_src       = self::image_source(1);

        $productMarkup = <<<MARKUP
                            <li class="store-item">
                              <div>
                                <img alt="$this->name" class="tile" src="$img_src" />
                              </div>
                              <div class="hover_actions">
                                  <div>Details</div>
                                  <div>Add to Cart</div>
                              </div>
                              <div>
                                <span class="item-name">$this->name</span>
                                <span class="item-price">$this->price</span>
                              </div>
                            </li>
MARKUP;

        echo $productMarkup;
    }
}
