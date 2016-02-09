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

  <div class="page-content">
    <?php
    require_once('header.php');
    ?>

    <div class="jumbotron">
      <div class="container">
        <h1>Store</h1>
      </div>
    </div>


    <ul class="showcase">

    <?php
    require_once('dbinterface.php');
    $db_handle = new dbinterface\PDO_handle();

    $db_handle->set_target("store-cakes");
    $products = $db_handle->pull("1 2 3");
    $db_handle = null;

    function resolve_img($base) {
      $src = "res/products/$base/1";
      $src .= file_exists($src . ".jpg") ? ".jpg" : ".png";
      return $src;
    }

    function print_product($pro_name, $pro_price, $img_res) {
        $pre = '<li class="store-item"><div class=""><a class="" href="#"><div class=""><div class=""><div class="">';
        $mid = '<img alt=' . $pro_name . 'class="tile" src=' . $img_res . ">";
        $mid .= '</div></div><div class="hover_actions"><div class="">Details</div><div class="">Add To Cart</div></div></div><div class="">';
        $mid .= '<div class="">' . $pro_name . '</div><div class="price-container"><div class="price">' . $pro_price;
        $suf = '</div></div></div></a></div></li>';
        printf("%s%s%s", $pre, $mid, $suf);
    }

    $i = count($products);
    while($i) {
        $pro_name = $products[$i - 1]["Name"];
        $pro_price = $products[$i - 1]["Price"];
        $img_src = resolve_img($products[$i - 1]["ImageBasePath"]);
        print_product($pro_name, $pro_price, $img_src);
        $i--;
    }
    ?>

    </ul>
  </div>
</body>
</html>
