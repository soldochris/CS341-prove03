<?php
  session_start();
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
  <div class=" container container-fluid jumbotron mt-5 mb-5">
    <h1 class="display-3">Welcome to the Shopping Cart!</h1>
    <p class="lead">We have the best products at the best price.</p>
    <hr class="my-4">
    <p>Explore all our offers.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="browse.php" role="button">Explore</a>
    </p>
  </div>
  <?php require_once("modules/footer.php") ?>
  <script src="https://kit.fontawesome.com/2bdc0b59cd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>