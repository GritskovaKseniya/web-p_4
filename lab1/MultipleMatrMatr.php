<?php
  $A[0][0] = 1; $A[0][1] = 1; $A[0][2] = 1; 
  $A[1][0] = 1; $A[1][1] = 1; $A[1][2] = 1; 
  $A[2][0] = 1; $A[2][1] = 1; $A[2][2] = 1; 
  
  $B[0][0] = 1; $B[0][1] = 1; $B[0][2] = 1; 
  $B[1][0] = 1; $B[1][1] = 1; $B[1][2] = 1; 
  $B[2][0] = 1; $B[2][1] = 1; $B[2][2] = 1; 
  
  $C[0][0] = 0; $C[0][1] = 0; $C[0][2] = 0; 
  $C[1][0] = 0; $C[1][1] = 0; $C[1][2] = 0; 
  $C[2][0] = 0; $C[2][1] = 0; $C[2][2] = 0; 
  
 function echo_matrix ($A) 
  {
     $contant = "<table border = \"1\">";
     for( $i = 0; $i < sizeof($A); $i++)
     {
         $contant.= "<tr>";
         for( $j = 0; $j < sizeof($A); $j++)
         {
             $contant.= "<td>".$A[$i][$j]."</td>";      
         }
     $contant.= "</tr>";
     }
  $contant.= "</table>"; 
  return $contant;
  }

 function multipleMM ($A, $B, $C) { 
     $contant = "<table border = \"1\">";
     for($i = 0; $i < sizeof($C); $i++)
     {
        $contant.= "<tr>";
        for($j = 0; $j < sizeof($C); $j++)
        {
           for($k = 0; $k < sizeof($C); $k++)
           {               
               $C[$i][$j] += $A[$i][$k] * $B[$k][$j];              
           }
           $contant.= "<td>".$C[$i][$j]."</td>";         
        }
        $contant.= "</tr>";
     }
   #return $C;
   $contant.= "</table>";
   return $contant;
 }



echo "<table border = 0><tr><td>"."matrA"."</td><td>".echo_matrix($A)."</td><td>"." * "."</td><td>"."matrB"."</td><td>".echo_matrix($B)."</td><td>"." = "."</td><td>"."matrC"."</td><td>".multipleMM($A, $B, $C)."</td></tr></table>";
?>

       


