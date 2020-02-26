<head>
    <meta charset="UTF-8">
    <title>Delete Product from tamk Shop</title>
    <link href="style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://www.stellar.org/wp-content/themes/stellar/favicon/rocket-96x96.png" sizes="96x96">
</head>
    <body>
        <?php
        session_start();
        $sql = null;
        $connection = new mysqli("localhost", "root", "", "tamk");
        //Select Product
        $sqlz = "SELECT * FROM products";
        $res = mysqli_query($connection, $sqlz);
        if (isset($_POST['ProductID'])){
        $ProductID = $_POST["ProductID"];
        $sql = "DELETE FROM `products` WHERE `products`.`ProductID` = $ProductID";
        if ($connection->query($sql) === TRUE) {
        $_SESSION['ProductID'] ="$ProductID";
        echo "Successfully. Please go to index"; 
        header("Location:delproduct.php");
        } 
        else {}
     }     
?>
<div class="products">
<?php while($r = mysqli_fetch_assoc($res)){ ?>
<div class="product">
<div class="name"><?php echo $r['name'] ?></div>
<div class="image"><img src="<?php echo $r['image']; ?>"></div>
<div class="description"><?php echo $r['description'] ?></div>
<div class="product-addtocart"><div class="price"><small>from</small> <strong> $<?php echo $r['price'] ?></strong></div>
<form method="POST">
<button name="ProductID" class="button" value="<?php echo $r['ProductID']; ?>" type="submit">Delete Now!</button>
</form>
</div>
</div>
<?php } ?>
	</div>
</body>