<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

  <title>EdD Bakery and Pastry Shop</title>
  <meta name="description" content="EdD Ltd: Bakery and Pastry Shop = Landing Page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' />
  <link rel="stylesheet" href="css/display.css" />
  <link rel="stylesheet" href="css/typography.css" />
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="stylesheet" href="css/grids.css" />
  <link rel="stylesheet" href="css/glyphs.css" />
  <link rel="stylesheet" href="css/dropdown.css" />
  <link rel="stylesheet" href="css/store.css" />
</head>

<body>


  <?php
  require_once('header.php');
  ?>

  <div id="page-content">

    <div class="stores">
      <a class="store-type">Cakes</a>
      <a class="store-type">Cupcakes</a>
      <a class="store-type">Pastries</a>
      <a class="store-type">Bread</a>
      <a class="store-type">Birthday Cakes</a>
      <a class="store-type">Wedding Cakes</a>
    </div>

    <div id="product-type">
      <h1>Cakes</h1>
    </div>

    <ul class="showcase">

<?php
    require_once('Store.class.php');

    $store = new Store("cakes");
    $store->print_products();

    $store->print_encoded_products_data();
?>
    </ul>
  </div>

  <div id="product-expanded" class="modal">
    <div class="images-container">
      <img id="product-image" />
    </div>

    <div class="description-container">
      <div>
        <h3 id="product-name">Description</h3>
        <p id="product-description">This is text</p>
      </div>

      <div class="actions-container">
        <button type="button">Add to Cart</button>
      </div>
    </div>
  </div>

  <div id="cart-button-container">
    <button type="button">
      <div id="cart-counter">0</div>
      <svg xmlns="http://www.w3.org/2000/svg" id="cart-icon-svg" viewBox="0 0 25 25">
        <g>
          <path d="M24.6 3.6c-.3-.4-.8-.6-1.3-.6h-18.4l-.1-.5c-.3-1.5-1.7-1.5-2.5-1.5h-1.3c-.6 0-1 .4-1 1s.4 1 1 1h1.8l3 13.6c.2 1.2 1.3 2.4 2.5 2.4h12.7c.6 0 1-.4 1-1s-.4-1-1-1h-12.7c-.2 0-.5-.4-.6-.8l-.2-1.2h12.6c1.3 0 2.3-1.4 2.5-2.4l2.4-7.4v-.2c.1-.5-.1-1-.4-1.4zm-4 8.5v.2c-.1.3-.4.8-.5.8h-13l-1.8-8.1h17.6l-2.3 7.1z"></path>
          <circle cx="9" cy="22" r="2"></circle>
          <circle cx="19" cy="22" r="2"></circle>
        </g>
      </svg>
    </button>
  </div>

  <div id="cart-preview-pane">
    <div id="section-top">
      <h2>Your sweet jar</h2>
      <button id="close-cart-preview" class="close seamless">x</button>
    </div>

    <div id="preview-form">
        <div id="items">

          <div class="cart-item">
            <?php
              $cartItem = $store->pull_product(1);
            ?>
            <div class="product-image" style="background-image: url( <?php echo $cartItem->image_source(); ?> );"></div>

            <div class="product-content">
              <div class="details">
                <span> <?php echo $cartItem->name; ?> </span>
              </div>

              <div class="cart-item-actions">
                <div class="item-quantity-container">
                  <button class="item-quantity-decrement seamless" type="button">-</button>
                  <input class="item-quantity-value" type="number" value="1"/>
                  <button class="item-quantity-increment seamless" type="button">+</button>
                </div>
                <span class="cart-item-price">Rs 450.00</span>
              </div>
            </div>
        </div>


        </div>
        <div id="section-bottom">
          <div id="cart-info">
            <div id="pricing-label">Total</div>
            <div id="pricing-value">
              <span class="currency-prefix">MUR</span>
              <span class="total-price">Rs 450.00</span>
            </div>
          </div>

          <div id="cart-actions-container">
            <div id="notice">Shipping and discounts are added at checkout.</div>
            <div id="cart-actions">
              <button type="button">Checkout</button>
            </div>
          </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="utils.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="header.js"></script>
  <script type="text/javascript" src="store.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
</body>
</html>
