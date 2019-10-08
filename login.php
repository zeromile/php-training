<?php
session_start();
require_once('connect.php');

if (!empty($_POST)){
  // if not logged in then check if login was submitted
  $userName = $_POST["username"];
  $passWord = $_POST["password"];
  $sql = "SELECT username, password, realname FROM test.users WHERE username = '$userName' LIMIT 1";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if ($userName == $row["username"] &&
    md5($passWord) == $row["password"])
    {
      $_SESSION["`loggedin`"] = "logged in";
      $_SESSION["realname"] = $row["realname"];
      $loggedIn = $_SESSION["loggedin"];
    } else {
      echo "Try again";
      $loggedIn = $_SESSION["loggedin"] ?? "not logged in";
    }
} else {
  $loggedIn = $_SESSION["loggedin"] ?? "not logged in";
}

if ($loggedIn == "logged in") {
  // if "logged in" then redirect to index
  header("Location: http://192.168.33.10/index");
} else {
  // if not logged in show login form
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <h1>Login Page</h1>
    <form action="login.php" method="post">
      Username: <input type="text" name="username"> </br>
      Password: <input type="password" name="password"> </br>
      <input type="submit" value="login">
    </form>
  </body>
  </html>
<?php }
