<?php
# Функция соединения otd, dolj с db. 

  function get_val($table, $id, $cont) 
  {
  
    if($table == "otd")
    {
      $res = mysql_query("SELECT name FROM otd where id=".$id, $cont); 
    }
    else if($table == "dolj")
    {
      $res = mysql_query("SELECT name FROM dolj where id =".$id, $cont); 
    }
    
    # $res = mysql_query("SELECT name FROM ".table." where id_".$table."= ' ".$id." ' ", $cont); 

    while($arr = mysql_fetch_array($res)) 
    {
      return $arr['name']; 
    }
  }
  
# Функция вывода основной таблицы db. 

  function  get_main_table($id, $cont) 
  {
    if($id == 0)
    {
      $res = mysql_query("SELECT * from db" , $cont); 
    }
    else if($id > 0)
    {
      $res = mysql_query("SELECT * from db where id=".$id, $cont); 
    }
    echo '<table border="1">';
    while($table = mysql_fetch_array($res)) 
    {
      echo "<tr><td>".$table['F']."</td><td>".$table['I']. "</td><td>".$table['O']. "</td><td>".get_val("otd", $table['id_otd'], $cont)."</td><td>".get_val("dolj", $table['id_dolj'], $cont)."</td></tr>";
    }
    echo "</TABLE>";
  }
 
  # Коннект с сетью.
  #include("./lib.php");
  $cont = mysql_connect("localhost", "yakovleva", "73Cmw7tb");
  echo "<meta charset=\"utf8\">";
  header('Content-Type: text/html; charset = utf-8');
  mysql_set_charset('utf8');
  
  if(!mysql_select_db("yakovleva", $cont))
  {
    die(); # не выполняется скрипт
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