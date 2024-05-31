<?php
session_start();

if (!isset($_SESSSION['logged_in'])) {
header('Location: /login.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>QiuruiWu</title>
  </head>

  <body>
    <h1>COSC4806 - Assignment1</h1>

    <p> Welcome, <?=$_SESSION['username'] ?></p>
    <p><a href ="/logout.php">Logout</a></p>
  </body>
</html>