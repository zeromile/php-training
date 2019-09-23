<?php
function makeContent($myContent, $myIndex){
  echo '<h1>'.$myContent[$myIndex][1].'</h1>';
  echo '<p>'.$myContent[$myIndex][2].'</p>';
}

function navitem($myNav, $i)
  {
      echo '<li><a href="'.$myNav[$i][1].'">'.$myNav[$i][0].'</a></li>';
  }

function makeNav($myNav, $loggedin)
{
    echo '<ul>';
    for($i=0;$i<count($myNav);$i++)
      {
        if($myNav[$i][2] == 'errbody' || ($myNav[$i][2] == 'loggedin' && $loggedin == True))
          {
            navitem($myNav, $i);
          }
      }
      echo '</ul>';
}
