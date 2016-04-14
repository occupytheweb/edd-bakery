<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>

  <div class="page-content">


    <?php
    require_once('dbinterface.php');
    $db_handle = new dbinterface\PDO_handle();

    $db_handle->set_target("store-cakes");
    $products = $db_handle->pull("2 3");
    print_r($products);
    $db_handle = null;
    ?>


  </div>
</body>
</html>
