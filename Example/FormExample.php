<?php
 echo "<a pref=\"./FormExample.php?id=1\">test</a>";
 echo "<form metod=\"POST\" action=\"FormExample.php\">";
 echo "id:<input type = \"text\" name =\"id\" size =\"2\">";
 echo "<input type = \"submit\" value =\"run\">";
 echo "</form>";
 if(isset($_GET['id']))
  {
   echo "GET:id = ".$_GET['id']."</br>";
  }
 else if(isset($POST['id']))
      {
        echo "POST:id = ".$_POST['id']."</tr>";
      }else
         {
            echo "id не передано!";
         }
?>