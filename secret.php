<?php
session_start();
$loggedIn = $_SESSION['loggedin'];

if ( $loggedIn == "logged in" ) {
  echo "Welcome to the secret page. K. That's it. Bye.";
} else {
  header("Location: http://192.168.33.10/index");
}
