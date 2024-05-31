<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>

  <body>

    <h1>Login</h1>

    <form action="/login.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="submit" name="createuser" value="CreateUser">
    </form>

    <?php
    if (isset($_POST['createuser'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
    
      require_once 'user.php';
      $user = new User();
    
      $user->create_user($username, $password);
    
      if ($user->create_user($username, $password) === "User created") {
        echo "<p>User created successfully.</p>";
      } else {
        echo "<p>Error creating user. Please try again.</p>";
      }
    }
    ?>

  </body>
</html>