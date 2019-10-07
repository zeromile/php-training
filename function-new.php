<?php
function makeNav($conn, $loggedIn){
    // This creates the navigation from the navigation table
    $sql = "SELECT pagename, pagetitle FROM test.navigation";
    $result = $conn->query($sql);
    echo "<ul>";
    while ( $row = $result->fetch_assoc() ) {
      echo "<li><a href='" . $row['pagename'] . "'>" .$row['pagetitle']. "</a></li>";
    }
    if ($loggedIn == "not logged in"){
      echo "<li><a href='login.php'>Log In</a></li>";
    } else {
      echo "<li><a href='logout.php'>Log Out</a></li>";
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
