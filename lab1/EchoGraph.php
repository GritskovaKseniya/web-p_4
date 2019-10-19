<?php
 
 $struct[0][0] = 1; $struct[0][1] = 0; $struct[0][2] = "A"; 
 $struct[1][0] = 2; $struct[1][1] = 0; $struct[1][2] = "B";
 $struct[2][0] = 3; $struct[2][1] = 0; $struct[2][2] = "C";
 $struct[3][0] = 4; $struct[3][1] = 1; $struct[3][2] = "D";
 $struct[4][0] = 5; $struct[4][1] = 1; $struct[4][2] = "E";
 $struct[5][0] = 6; $struct[5][1] = 1; $struct[5][2] = "F";
 $struct[6][0] = 7; $struct[6][1] = 3; $struct[6][2] = "G";
 $struct[7][0] = 8; $struct[7][1] = 3; $struct[7][2] = "J";
 $struct[8][0] = 9; $struct[8][1] = 3; $struct[8][2] = "K";

   function DeepGraph($count)
       { 
         for($i = 0; $i < $count; $i++)
            {
              echo "_";
            } 
       }

 function Get_Children($id, $struct, $count) 
 { 
  for( $i = 0; $i < sizeof($struct); $i++)
  { 
    if($struct[$i][1] == $id)
    {   
      DeepGraph($count); 
      echo $struct[$i][2];
      echo "</br>"; 
      $count += 1;
      Get_Children($struct[$i][0], $struct, $count);
      $count -= 1;
    }
  }
 }
 
 $count = 0;
 $id = 0;
 Get_Children($id, $struct, $count);


?>