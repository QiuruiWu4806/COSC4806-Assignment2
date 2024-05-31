<?php

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

require_once 'database.php';
$db = db_connect();

$statement = $db->prepare("SELECT * FROM users WHERE username = $username");
$statement->execute();

if ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($password == $user['password']) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        header('Location: /index.php');
        exit;
    } else {
        echo "<p>Incorrect password.</p>";
    }
} else {
    echo "<p>Incorrect usernam.</p>";
}

  if (!isset($_SESSION['failed_attempts'])){
    $_SESSION['failed_attempts'] = 1;
  } else {
    $_SESSION['failed_attempts'] ++;
  }

  echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];

}

?>