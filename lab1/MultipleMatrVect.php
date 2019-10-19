<?php
 $c[0] = 0; $c[1] = 0; $c[2] =0;
 $b[0] = 1; $b[1] = 1; $b[2] =1;
 $A[0][0] = 1; $A[0][1] = 1; $A[0][2] = 1; 
 $A[1][0] = 1; $A[1][1] = 1; $A[1][2] = 1; 
 $A[2][0] = 1; $A[2][1] = 1; $A[2][2] = 1; 

 function echo_matrix ($A) 
  {
     $content = "<table border = \"1\";>";
     for( $i = 0; $i < sizeof($A); $i++)
     {
         $content.= "<tr>";
         for( $j = 0; $j < sizeof($A); $j++)
         {
             $content.= "<td>".$A[$i][$j]."</td>";      
         }
     $content.= "</tr>";
     }
  $content.= "</table>"; 
  return $content;
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

 function multipleMandV ($A, $b, $c){
   
   for($i = 0; $i < sizeof($A); $i++){
       
      for($j = 0; $j < sizeof($A); $j++){
          $c[$i] += $A[$i][$j]*$b[$j];
      }     
   }
  return $c;
 }
 $c = multipleMandV ($A, $b, $c);
    $content = "<table border =\"1\">"; 
    for($i = 0; $i < sizeof($c); $i++){
      $content.="<tr><td>".$c[$i]."</td></tr>";
    }
   $content.="</table>"; 
 
echo"<table border = 0><tr><td>"."matrA"."</td><td>".echo_matrix($A)."</td><td>"." * "."</td><td>"."vectorB"."</td><td>".echoVector($b)."</td><td>"." = "."</td><td>"."vectorC"."</td><td>".echoVector($c)."</td></tr>";

?>