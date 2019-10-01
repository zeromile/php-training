<?php
require_once("connect.php");
require_once("function-new.php");
$thisPagename = $_GET["page"] ?? "Home";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php makeTitle($conn, $thisPagename); ?></title>
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
          makeContent($conn, $thisPagename);
        ?>
    </div>
  </section>
</body>
</html>
