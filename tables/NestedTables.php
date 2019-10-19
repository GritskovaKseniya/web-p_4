<?php
#Соединим таблицы Departament и Position c List
 function get_val($table, $id, $cont)
 {
   if($table == "Departament")
   {
     $res = mysql_query("SELECT name FROM Departament where id=".$id, $cont);
   }else if($table == "Position")
         {
           $res = mysql_query("SELECT name FROM Position where id=".$id, $cont);
         }
   while($arr = mysql_fetch_array($res))
   {
     return $arr['name'];
   }
 }
 
#Выведем основную таблицу

 function get_main_table($id, $cont)
 {
   if($id == 0)
   {
     $res = mysql_query("SELECT * FROM List", $cont);
   }else if(id > 0)
         {
           $res = mysql_query("SELECT * FROM List where id=".$id, $cont);
         }
   echo '<TABLE border = "1">';
   while($table = mysql_fetch_array($res))
   {
     echo "<tr><td>".$table['surname']."</td><td>".$table['name']."</td><td>".$table['patronymic']."</td><td>".get_val("Departament", $table['departament'],$cont)."</td><td>".get_val("Position", $table['position'], $cont)."</td></tr>";
   }
   echo "</TABLE>";
 }

#connect with net
#include("./lib.php");
  $cont = mysql_connect("localhost", "gritskova", "8pn93mUJ");
  echo "<meta charset=\"cp1251\">";
  header('Content-Type: text/html; charset = cp1251');
  mysql_set_charset('cp1251');
  
  if(!mysql_select_db("gritskova", $cont))
  {
    die(); 
# не выполняется скрипт
  }
  // else
  // {
  //   get_main_table("0", $cont);
  // }

  if(isset($_GET['id']))
  {
    get_main_table($_GET['id'], $cont);
  }
  else
  {
    $_GET['id'] = 0;
    get_main_table(0, $cont);
  }
?>
 