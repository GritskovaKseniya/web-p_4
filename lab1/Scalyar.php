<?php
 
 $a[0] = 1; $a[1] = 1; $a[2] = 3;
 $b[0] = 1; $b[1] = 1; $b[2] = 1;
 $c = 0;

 function scalyar($a, $b)
 {
  $c = 0; 
  for($i = 0; $i < sizeof($a); $i++){
    $c+=$a[$i]*$b[$i];
  }
  return $c;
 }
 function echoVector($a) 
 { 
   $content = "<table border =\"1\">"; 
   for($i = 0; $i < sizeof($a); $i++) 
      { 
        $content.="<tr><td>".$a[$i]."</td></tr>"; 
      } 
 $content.="</table>"; 
 return $content; 
 } 

$c = scalyar($a, $b);
echo"<table border = 0><tr><td>"."vectorA"."</td><td>".echoVector($a)."</td><td>"." * "."</td><td>"."vectorB"."</td><td>".echoVector($b)."</td><td>"." = "."</td><td>".$c."</td></tr>";


?>