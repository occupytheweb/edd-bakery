<?php

require_once('dbinterface.php');

class Product
{
    private $type;
    private $id;
    private $sharedID;
    private $name;
    private $details;
    private $price;
    private $imageBasePath;
    private $active;


    public function __construct($type, $productData) {
        $this->type          = $type;
        $this->id            = $productData['ID'];
        $this->sharedID      = "{$this->type}-{$this->id}";
        $this->name          = $productData['Name'];
        $this->details       = $productData['Details'];
        $this->price         = $productData['Price'];
        $this->imageBasePath = $productData['ImageBasePath'];
        $this->active        = $productData['ActiveStatus'];
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
        $src  = "res/products/{$this->imageBasePath}/{$imgID}";
        $src .= file_exists("$src.jpg") ? ".jpg" : ".png";
        return $src;
    }

    /**
     * Prints the current Product's HTML representation
     * @return String  this Product's markup
     */
    public function write() {
        $img_src       = self::image_source(1);
        $sharedID      = htmlspecialchars($this->sharedID);
        $name          = htmlspecialchars($this->name    );

        $productMarkup = <<<MARKUP
<li class="store-item" data-product-id="{$sharedID}">
  <div>
    <img alt="{$name}" class="tile" src="{$img_src}" />
  </div>
  <div class="hover_actions">
      <div>Details</div>
      <div>Add to Cart</div>
  </div>
  <div>
    <span class="item-name">{$name}</span>
    <span class="item-price">{$this->price}</span>
  </div>
</li>
MARKUP;

        echo $productMarkup;
    }


    /**
     * Prepares a Product details array ready to be JSON-encoded
     * @return Array  an Array of Product details
     */
    public function data_encode() {
        $data = [
                  'id'      => $this->id,
                  'name'    => htmlspecialchars($this->name   ),
                  'details' => htmlspecialchars($this->details),
                  'price'   => $this->price,
                  'img_src' => self::image_source(1)
                ];

        return $data;
    }
}
