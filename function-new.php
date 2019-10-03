<?php
function makeNav($conn){
    $sql = "SELECT pagename, pagetitle FROM test.navigation";
    $result = $conn->query($sql);
    echo "<ul>";
    while ( $row = $result->fetch_assoc() ) {
      echo "<li><a href='" . $row['pagename'] . "'>" .$row['pagetitle']. "</a></li>";
    }
    echo "</ul>";
  } // end of makeNav function

  function makeContent($conn, $thisPagename){
    $sql = "SELECT * FROM test.content WHERE pagename = '$thisPagename'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      echo $row['contenttitle'];
      echo $row['content'];
    }
  } // end of makeContent

  function makeTitle($conn, $thisPagename){
    $sql = "SELECT * FROM test.content WHERE pagename = '$thisPagename'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['pagename'];
  }
