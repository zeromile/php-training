<?php
require_once('nav.php');
require_once('content.php');
require_once('functions.php');
$loggedin = False;
?>
<html>
<head></head>
<body>
<div><?php makeNav($myNav, $loggedin); ?></div>
<div>
  <?php makeContent($myContent,0); ?>
</div>
</body>
</html>
