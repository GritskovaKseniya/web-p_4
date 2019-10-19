<?php
 #http:/PSTGU/Get.php?val=1;
 if(isset($_GET['val']))
   {
    echo $_GET['val'];
   }
  else 
   if(isset($_GET['newval']))
     {
      echo $_GET['newval'];
     }
   else
     echo "пока";