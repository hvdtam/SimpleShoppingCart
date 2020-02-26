<head>
    <title>Add Product for tamK Shop </title>
    <link href="style.css" rel="stylesheet">
    <style>
    body {
  height: 100%;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
    }
 
    .addproduct
    {
      background: #fff;
      width: 300px;
      border-radius: 6px;
      margin: 2 auto 2 auto;
      border: #ff9800 2px solid; 
    }
        </style>
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
        $connection = new mysqli("localhost", "root", "", "tamk");
        $sql = "INSERT INTO `products` (category, name, description, price, image)
        VALUES ('$category', '$name', '$description', '$price', '$image')";
    if ($connection->query($sql) === TRUE) {
        $_SESSION['category'] ="$category";
    echo "Successfully. Please go to index"; } 
        else {
        echo "Error: " . $sql . "<br>" . $connection->error; }
    }     
?>
        <form class="addproduct" method="POST">
        <h3 align="center">Add Product for tamk Shop</h3>
        <table>
        <tr><td>Category: </td><td>
        <input type="text" name="category"/> </td></tr>
        <tr><td>Title: </td><td>
        <input type="text" name="name"/> </td></tr> 
        <tr><td>Description: </td><td>
        <input type="text" name="description"/> </td></tr> 
        <tr><td>Unit Price: </td><td>
        <input type="text" name="price"/> </td></tr> 
        <tr><td>Image: </td><td>
        <input type="text" name="image" value="img/"/> </td></tr> 
        <tr><td><button class="button" type="submit">Register</button></td></tr> 
        <table>
        </form>
    </body>
</html>