<?php 
  session_start();
  if(isset($_SESSION["cart"])){
    if(isset($_POST["product"])){
      array_push($_SESSION["cart"],$_POST["product"]);
    }
  }else{
    $_SESSION["cart"] = [];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php require_once("modules/navbar.php") ?>
  <main class="container container-fluid mb-5">
    <div class="row row-cols-1 row-cols-md-2 mt-4">
      <?php
        $string = file_get_contents("products.json");
        $products = json_decode($string,true);

        foreach ($products as $product){
          echo "
          <div class='col mb-4'>
            <form class='card' method='POST' action='browse.php'>
              <img src='{$product[img]}' class='card-img-top' alt='{$product[name]}'>
              <div class='card-body'>
                <h2 class='card-title'>{$product[name]}</h2>
                <p class='card-subtitle text-success'>Price: \${$product[price]}</p>
                <p class='card-text'>{$product[description]}.</p>
                <input type='hidden' name='product' value='{$product[id]}'>
                <input type='submit' name='add' value='Add to Cart' class='btn btn-primary'>
              </div>
            </form>
          </div>
          ";
        }
      ?>
    </div>
  </main>
  <?php require_once("modules/footer.php") ?>
  <script src="https://kit.fontawesome.com/2bdc0b59cd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>