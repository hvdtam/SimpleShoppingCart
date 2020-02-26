<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <name>Add Product</name>
    </head>
    <body>
        <?php
        session_start();
        require('config.php');
        $sql = null;
        if (isset($_POST['category']) && isset($_POST['name'])){
        $category = $_POST['category'];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $ProductID = $_POST["ProductID"];
        $connection = new mysqli("localhost", "root", "", "tamk");
        $sql = "UPDATE `products` SET category= '$category', name='$name', description='$description', price='$price', image='$image' WHERE `products`.`ProductID` = $ProductID;";
if ($connection->query($sql) === TRUE) {
    $_SESSION['category'] ="$category";
    echo "Successfully. Please go to index";
} 
else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
     }     
?>
        <h1>Add Product for tamk Shop</h1>
        <form method="POST">
        <a>Category:</a>
        <input type="text" name="category"/> </br></br>
        <a>Product ID:</a>
        <input type="text" name="ProductID"/> </br></br>
        <a>Title: </a>
        <input type="text" name="name"/> </br></br>
        <a>Description: </a>
        <input type="text" name="description"/> </br></br>
        <a>Unit Price: </a>
        <input type="text" name="price"/> </br></br>
        <a>Image: </a>
        <input type="text" name="image" value="img/"/>  </br>
        <button type="submit">Register</button>
          </form>
    </body>
</html>