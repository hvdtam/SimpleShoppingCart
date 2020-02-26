<html>
    <head>
    <meta charset="UTF-8">
    <title>Welcome tamk Shop</title>
    <link href="style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://www.stellar.org/wp-content/themes/stellar/favicon/rocket-96x96.png" sizes="96x96">
</head>
    <body>
    <?php
    session_start();
    //error_reporting(0); // Disable all errors.
    $connection = new mysqli("localhost", "root", "", "tamk");
    $sql = "SELECT * FROM products";
    $res = mysqli_query($connection, $sql);
    include 'menu.php';
    ?>
<div class="products">
<?php
if (isset($_POST["Add"]))
    {
        $intId = $_POST["intId"];
        if (isset($_SESSION["strItems"]))
    		$strItems = $_SESSION["strItems"];
        if (isset($_SESSION["strNumberItems"]))
    		$strNumberItems = $_SESSION["strNumberItems"];
        $arrItems = explode (" ", $strItems);
        $arrNumberItems = explode (" ", $strNumberItems);

        $intKey = array_search($intId, $arrItems);
        if ($intKey == true)
            $arrNumberItems[$intKey] += 1;
        else {
            $arrItems[] = $intId;
            $arrNumberItems[] = 1;
        }
        $strItems = implode (" ", $arrItems);
        $strNumberItems = implode (" ", $arrNumberItems);
        $_SESSION["strItems"] = $strItems;
        $_SESSION["strNumberItems"] = $strNumberItems;
        }
        displayProducts($connection);
        function displayProducts($connection) {
    $dbConnect = $connection->query("SELECT * FROM Products")
        or die("Problem reading table: " . $mysqli->error);
    while ($arrData = $dbConnect->fetch_array()) {
        $intId  = $arrData["ProductID"];
        $strName = $arrData["name"];
        $strDescription = $arrData["description"];
        $strImage = $arrData["image"];
        $intCost = $arrData["price"];
?>

<div class="product">
<div class="image"><img src="<?php echo "$strImage"; ?>"></div>
<div class="name"><strong><?php echo "$strName" ?></strong></div>
<div class="description"><?php echo "$strDescription" ?></div>
<div class="product-addtocart"><div class="price"><small>from</small> <strong>$<?php echo "$intCost" ?></strong></div> 
    <?php
    echo "<form action='" . $_SERVER["PHP_SELF"] . "' method='post'>";
    echo "<input type='hidden' name='intId' value='$intId'/>";
    echo "<input type='submit' name='Add' value='Add to Cart' class='button'/></form>";
    ?></div>
</div>
<?php
} }
?>
</div>
   </body>
</html>
