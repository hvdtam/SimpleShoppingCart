<?php
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    ?>
<div class="header">
      <h3 class="header-left"><a href="index.php">tamK Shop</a></h3>
      <div class="header-right">
      <ul>
      Welcome <?php print_r($_SESSION['username']); ?></a>
      <li><a href="cart.php"><img src="img/shopping.png" height="35" weight="35"/></a></li>
      <li><a href="logout.php">Logout</a></li> </ul>
    </div>
</div>
<h3 align="center">Apple Product</h3>
<p align="center">Discover the innovative world of Apple and shop for everything iPhone, iPad, Apple Watch, Mac and Apple TV</p>
<br>
        <?php
    }
    else {
     ?>
     <div class="header">
      <h3 class="header-left"><a href="index.php">tamK Shop</a></h3>
      <div class="header-right">
        <ul>
          <li><a href="cart.php" ><img src="img/shopping.png" height="40" weight="40"/></a></li>
        </ul>
    </div>
    </div>
        <h3 class="container" align="center">
          <p class="lead text-muted">You are not logged <br>You need to <a href="login.php" class="btn btn-primary my-2">Login</a> or <a href="register.php" class="btn btn-secondary my-2">Register</a> to  add to cart</p>
    </h3>
        <?php
    }