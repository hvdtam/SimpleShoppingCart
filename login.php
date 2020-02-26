<html>
<head>
    <title>Login to tamK Shop</title>
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
    .signin 
    {
      background: #fff;
      width: 275px;
      border-radius: 6px;
      margin: 2 auto 2 auto;
      border: #ff9800 2px solid; 
    }
</style>
</head>
<body>
<?php
session_start();
require_once("config.php");
$sql = null;
if (isset($_POST['username']) && isset($_POST['password'])){
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
if (!$connection->query($sql)->num_rows == 1) {
    echo "<p>Invalid username/password combination</p>";
} else {
    if(!isset($_SESSION["username"])){
    $_SESSION["username"] ="$username";
    header("Location: index.php");
    }
    else {}
}}
?>
  <form class="signin" method="post">
    <h2 align="center">Please sign in</h2>
    <table>
    <tr><td>Username: </td><td> <input type="username" name="username" /></td></tr>
    <tr><td>Password: </td><td> <input type="password" name="password" /></td></tr>
    <tr><td></td><td><input class="button" type="submit" name="submit" value="Login" /></td></tr></form></table>
</body>
</html>
