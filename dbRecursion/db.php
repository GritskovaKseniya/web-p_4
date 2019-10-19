<?php
	include("lib2.php"); //подкючаем все функции из файла lib2.php

	$cont = mysql_connect('localhost', 'gritskova', '8pn93mUJ'); //создаем дискриптор соединения; получаем доступ к БД
	mysql_select_db("gritskova",$cont); // выбираем БД, для этого передаем в функцию название БД и дискриптор соединения 

	session_start(); /*создает сессию, либо возобновляет существующую, основываясь на идентификаторе сессии, переданном через GET- или POST-запрос, либо переданный через cookie*/
#if(!isset($_SESSION['login']))
#{
#	echo "<meta http-equiv=\"refresh\" content=\"0;../auth/login.php\">";
#}

	if(isset($_GET['id'])) //проверяем значение id
 	{
   		$id=$_GET['id'];
 	}else 
 	 {
  		$id=0;
 	 }
	echo "<link rel='stylesheet' href='style.css'>"; //подключаем файл для верстки
#echo "<center>";
#echo "<table border=\"1\" width=\"900\"><tr><td  width=\"200\">
#"</td>
#<td  width=\"700\" valign=\"top\" align=\"left\">"
	echo "<div class = menu>".get_menu($cont,0,$id)."</div><div class = content>".get_content($cont,$id)."</div>"; //выводим данные из таблицы на экран
#"</td></tr></table>";
#echo "</center>";

#echo "<div

?>