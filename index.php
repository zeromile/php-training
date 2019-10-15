<?php
session_start();
require_once("connect.php");
require_once("functions.php");
$loggedIn = $_SESSION['loggedin'] ?? "not logged in";
/*
this pulls the text from after the first / in the
url and sets it to an array
*/
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

/*
this pulls the last item out of the uri array and sets
$thisPagename variabe to that item
*/
$thisPagename = array_pop($uriSegments);

// this sets the pagename if none is provided in the url
if ($thisPagename == ""){
  $thisPagename = "index";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="main.css">
  <title><?php // makeTitle($conn, $thisPagename); ?></title>
</head>
<body>
  <nav>
    <?php
      makeNav($conn, $loggedIn, $thisPagename);
      echo "<p>" . $loggedIn . "</p>";
     ?>
  </nav>
  <section>
    <div>
        <?php
        //echo $thisPagename;
       makeContent($conn, $thisPagename);
        ?>
    </div>
  </section>
</body>
</html>
