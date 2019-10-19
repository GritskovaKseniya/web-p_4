<?php
   $a[0] = 1; $a[1] = 2; $a[2] = 3; 
function echoVector($a) 
{ 
  $content = "<table border =\"1\">"; 
  for($i=0; $i<sizeof($a); $i++) 
     { 
       $content.="<tr><td>".$a[$i]."</td></tr>"; 
     } 

$content.="</table>"; 
return $content; 
} 
?>