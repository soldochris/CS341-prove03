<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Index.php">Shopping Cart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="browse.php">Browse</a>
      </li>
    </ul>
    <a href="cart.php" class="btn mr-sm-2 btn-primary">
      My Cart
      <i class="fas fa-shopping-cart"></i>
      <?php
        if(isset($_SESSION["cart"])){
          $count =count($_SESSION["cart"]);
          echo "<span class='badge badge-pill badge-danger'>{$count}</span>";
        }
      ?>
    </a>
  </div>
</nav>