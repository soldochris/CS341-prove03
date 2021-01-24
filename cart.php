<?php
  session_start();
  if(isset($_POST["del"])){
    $id = (int)$_POST["del"];
    array_splice($_SESSION["cart"], $id, 1);
    header("Refresh:0");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My cart</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php require_once("modules/navbar.php") ?>  
  <main class="container container-fluid mb-5">

  <div class="card mt-5 mb-5">
    <div class="card-header">My cart</div>
    <div class="card-body">
      <h5 class="card-title">List of Products:</h5>
      <div class="table-responsive">
      <table class="table table-striped table-hover table-sm border-primary">
        <thead class="thead-light">
          <tr>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php
            $string = file_get_contents("products.json");
            $products = json_decode($string);

            for($i = 0;$i < count($_SESSION["cart"]);$i++){
              $id = $_SESSION["cart"][$i]-1;
              echo "
              <tr>
                <th scope='row'>{$products[$id]->name}</th>
                <td>
                  <img src='{$products[$id]->img}' alt='{$products[$id]->name}' class='img-fluid img-thumbnail'>
                </td>
                <td>\${$products[$id]->price}</td>
                <td>
                  <form method='POST' action='cart.php' >
                    <input type='hidden' name='del' value='$i' >
                    <input type='submit' value='Delete' class='btn btn-danger mt-2'>
                  </form>
                </td>
              </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <a href="browse.php" class="btn btn-secondary my-3">Continue Shopping</a>
      <a href="checkout.php" class="btn btn-warning my-3">Check Out</a>
    </div>
  </div>
  </main>
  <?php require_once("modules/footer.php") ?>
  <script src="https://kit.fontawesome.com/2bdc0b59cd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  
</body>
</html>