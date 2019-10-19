<?php
include("lib.php");
if(isset($_GET['id']))
 {
   $id = $_GET['id'];
 }else $id = 0;

$cont = mysql.content('lockalhost', 'gritskova', ' 8pn93mUJ');
mysql_select_db('gritskova',$cont);
echo "<table border = \"1\"><tr><td>".get_menu($cont)."</td></td>".get_content($cont,$id)."</td></tr></table>";
?>