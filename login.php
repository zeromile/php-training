<?php
session_start();
$loggedIn = $_SESSION["loggedin"];
echo "<h1>Login Page</h1>";
echo $loggedIn;
