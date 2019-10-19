<?php

  $A[0][0] = 1; $A[0][1] = 1; $A[0][2] = 1; 
  $A[1][0] = 1; $A[1][1] = 1; $A[1][2] = 1; 
  $A[2][0] = 1; $A[2][1] = 1; $A[2][2] = 1; 

  function echo_matrix ($A) 
  {
     echo "<table border = \"1\">";
     for( $i = 0; $i < sizeof($A); $i++)
     {
         echo "<tr>";
         for( $j = 0; $j < sizeof($A); $j++)
         {
             echo "<td>".$A[$i][$j]."</td>";      
         }
     echo "</tr>";
     }
  echo "</table>"; 
  }
 
echo_matrix($A);
?>