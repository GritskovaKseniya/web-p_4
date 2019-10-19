<?php
	$host = 'localhost';  // host
    $user = 'crm';    // user name   
    $pass = '6QjgPjxQ'; // user password 
    $db_name = 'crm';   // DB name
    $cont = mysqli_connect($host, $user, $pass, $db_name); //connect to the database, cont is the connection handle

    echo "<meta charset=\"utf8\">";
    header('Content-Type: text/html; charset = utf-8');
   
    mysqli_query($cont, 'SET NAMES utf8');

	$sql = mysql_query("SELECT * from 'Courses'",$cont);
	while($arr = mysql_fetch_array($sql))
	{
		echo $arr['id'];
		echo get_teacher_name($arr['idTeacher'],$cont);
		echo get_building_val($arr['idBuilding'],$cont);
	}  /*
	function GetDataBuilding($cont){
		$sql = mysqli_query($cont, "SELECT `name`  FROM `Buildings`");
		   
		echo '<table border="2">';
		 while($result = mysqli_fetch_array($sql))
		 { 
			echo "<tr>
			<td> {$result['name']} </td>";
		 }
		echo "</TABLE>";
	}

	function GetDataTeachers($cont){
        $sql = mysqli_query($cont, "SELECT `firstname`, `name`, `surname`  FROM `Teachers`");
		$str = "";

		 while($result = mysqli_fetch_array($sql))
		 {
			$srt.= "<tr><td>{$result['firstname']}</td><td> {$result['name']} </td> <td> {$result['surname']}</td>";
			echo $str;
		 }
	} */

	function  get_teacher_name($id,$cont)
	{
		$sql = mysql_query("SELECT * from Teachers where id='".$id."'",$cont);
		while($arr = mysql_fetch_array($sql))
		{
			return $arr['name'];
		}
	}
 
	function get_building_val($id,$cont)
	{
		$sql = mysql_query("SELECT * from Buildings where id='".$id."'",$cont);
		while($arr = mysql_fetch_array($sql))
		{
			return $arr['name'];
		}
	} 
?>