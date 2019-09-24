<?php
require_once('nav.php');
require_once('content.php');
require_once('functions.php');
$loggedin = False;
?>
<html>
<head></head>
<body>
  <nav>
    <?php makeNav($myNav, $loggedin); ?>
  </nav>
  <section>
    <div>
        <?php makeContent($myContent,0); ?>
    </div>
  </section>
</body>
</html>
