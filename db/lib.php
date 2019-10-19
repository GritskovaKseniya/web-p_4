<?php
 function get_menu($cont){ 
$sql = mysql_query($cont, "SELECT id, name from content");
$str = " ";
while($arr = mysql_fetch_array($sql)){
$str.="<a href=\"erunda.php?id=".$arr['id']."\">".$array['name']."</a></br>";
}
return $str;
}
 
 function get_content($cont, $id){
$sql = mysql_query($cont, "SELECT diser from content where id = '".$id."'");
$arr = mysql_fetch_array($sql);
return $arr['diser'];
}
?>