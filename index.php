<?php
require_once("connect.php");
require_once("function-new.php");
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

$thisPagename = array_pop($uriSegments);
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
  <title><?php // makeTitle($conn, $thisPagename); ?></title>
</head>
<body>
  <nav>
    <?php
      makeNav($conn);
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
