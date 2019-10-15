<?php
function makeNav($conn, $loggedIn, $thisPagename){
    // This creates the navigation from the navigation table
    $sql = "SELECT pagename, pagetitle FROM test.navigation";
    $result = $conn->query($sql);

    if($loggedIn == "logged in"){
      $loggedInClass = "loggedin";
    } else {
      $loggedInClass = "notloggedin";
    }

    echo "<ul class='" . $loggedInClass . "'>";

    // outputs the rows of results from the navigation,
    // setting the active variable for the page that is active
    while ( $row = $result->fetch_assoc() ) {
      if ( $thisPagename == $row['pagename']){
        $active = "active";
      } else {
        $active = "";
      }

      echo "<li class='" . $active . "''><a href='" . $row['pagename'] . "'>" .$row['pagetitle']. "</a></li>";
    }

    // Outputs the login links
    if ($loggedIn == "not logged in"){
      echo "<li><a href='login.php'>Log In</a></li>";
    } else {
      echo "<li><a href='logout.php'>Log Out " . $_SESSION["realname"] . "</a></li>";
    }
    echo "</ul>";
  } // end of makeNav function

  function makeContent($conn, $thisPagename){
    /*
     this creates the content from the content
     table based on the supplied $thisPagename variable.
     It will then loop through all the matching content
     records and export those individually.
    */
    $sql = "SELECT * FROM test.content WHERE pagename = '$thisPagename'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      echo $row['contenttitle'];
      echo $row['content'];
    }
  } // end of makeContent

  function makeTitle($conn, $thisPagename){
    /*
     This will echo out the current page title
     from the content table based on the page name
     in $thisPageName
    */
    $sql = "SELECT * FROM test.content WHERE pagename = '$thisPagename'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['pagename'];
  }
