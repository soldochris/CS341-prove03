<?php
  session_start();
  $_SESSION["address"] = clean_input($_POST["address"]);

  function clean_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation Page</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php require_once("modules/navbar.php") ?>  
  <main class="container container-fluid mb-5">
  <div class="card mt-5 mb-5">
    <div class="card-header">Confirmation</div>
    <div class="card-body">
      <h5 class="card-title">Shipping Information:</h5>
      <form >
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION["address"] ?>" disabled>
        </div>
        <legend>List of Products:</legend>
        <ul class="list-group">
          <?php
            $string = file_get_contents("products.json");
            $products = json_decode($string);
            $total = 0;
            for($i = 0;$i < count($_SESSION["cart"]);$i++){
              $id = $_SESSION["cart"][$i]-1;
              echo "
              <li class='list-group-item d-flex justify-content-between align-items-center'>
                {$products[$id]->name}
                <span class='badge badge-warning badge-pill'>
                  \${$products[$id]->price}
                </span>
              </li>
              ";
              $total += $products[$id]->price;
            }
            echo "
              <li class='list-group-item d-flex justify-content-between align-items-center'>
                <legend>Total</legend>
                <span class='badge badge-success badge-pill'>
                  \${$total}
                </span>
              </li>
            ";
          ?>
        </ul>
        <a href="cart.php" class="btn btn-secondary my-3">Back to my Cart</a>
      </form>
  </div>
  </main>
  <?php require_once("modules/footer.php") ?>
  <script src="https://kit.fontawesome.com/2bdc0b59cd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  
</body>
</html>