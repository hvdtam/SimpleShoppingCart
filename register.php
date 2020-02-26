<head>
    <meta charset="UTF-8">
    <title>Register </title>
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
    .signup
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
        $connection = null;
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = md5($_POST["password"]);
        $zname = $_POST["zname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $connection = new mysqli("localhost", "root", "", "tamk");
        $sql = "INSERT INTO `users` (username, password, name, email, address)
        VALUES ('$username', '$password', '$zname', '$email', '$address')";
    if ($connection->query($sql) === TRUE) {
        $_SESSION['username'] ="$username";
        header('location: index.php');
}
else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
     }
?>
        <form class="signup" method="POST">
        <h2 align="center">Register </h2>
        <table>
        <tr><td>Username: <a style="color:red;">*</a></td><td>
        <input type="text" name="username"/></td></tr>
        <tr><td>Password: <a style="color:red;">*</a></td><td>
        <input type="password" name="password"/></td></tr>
        <tr><td>Your Name: <a style="color:red;">*</a></td><td>
        <input type="text" name="zname"/></td></tr>
        <tr><td>E-mail: <a style="color:red;">*</a></td><td>
        <input type="text" name="email"/></td></tr>
        <tr><td>Address: <a style="color:red;">*</a></td><td>
        <input type="text" name="address" /></td></tr>
        <tr><td><button class="button" type="submit">Register</button></td></tr></table>
        </form>
</body>