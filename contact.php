<?php
require_once('nav.php');
require_once('content.php');
require_once('functions.php');
$firstname = $_POST["firstname"] ?? "you";
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
        <?php makeContent($myContent,2);
        echo 'Hey '.$firstname.'<br>'; ?>
    </div>
  </section>
  <section>
    <form action="contact.php" method="post">
      First name:<br/>
      <input type="text" name="firstname" value="">
      <br/>
      Last name:<br/>
      <input type="text" name="lastname" value="">
      <br/><br/>
      <input type="submit" value="Submit">
    </form>
  </section>
</body>
</html>
