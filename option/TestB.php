<?php
//connect tables Buildings & Teachers
function GetVal($table, $id, $cont)
{
	if($table == "Building")
	{
		$sql = mysql_query("SELECT name FROM Building where id=".$id, $cont);
    	while($arr = mysql_fetch_array($sql))
    	{
    		return $arr['name'];
        }
    }else if($table == "Teachers")
    {
        $res = mysql_query("SELECT firstname FROM Teachers where id=".$id, $cont);
        while($arr = mysql_fetch_array($res)){
        	return $arr['firstname'];
    	}
	}
}
//print main table (Courses table)
function PrintTable ($id, $cont)
{
	if($id == 0){
		$sql = mysql_query("SELECT * FROM Courses", $cont);
	}else if($id > 0){
		$sql = mysql_query("SELECT * FROM Courses WHERE id=".$id, $cont);
	}
	echo "<TABLE border = \"2\">";
	echo '<h2>Courses Table</h2>';
	echo "<TR><TD>id</TD><TD>name</TD><TD>description</TD><TD>ifActive</TD><TD>Building</TD><TD>Teacher</TD><TD>Edit</TD><TD>Detete</TD></TR>"; 
	while ($arr = mysql_fetch_array($sql)) //
	{
		echo "<TR>
		<TD>".$arr['id']."</TD>
		<TD>".$arr['name']."</TD>
		<TD>".$arr['description']."</TD>
		<TD>".$arr['ifActive']."</TD>
		<TD>".GetVal("Building", $arr['idBuilding'],$cont )."</TD>
		<TD>".GetVal("Teachers", $arr['idTeachers'],$cont )."</TD> 
		<TD><a href='upd={$arr['id']}'>Edit</a></TD> 
		<TD><a href='del={$arr['id']}'>Detete</a></TD></TR>";
	}
	echo "</TABLE>";
}

//delete item
function DeleteItem($cont, $id) 
{
	$id = '".$id."';
	$sql = mysqli_query($cont, "DELETE FROM Courses WHERE id='.$id'");
	if ($sql)
    	{
    		echo "<p>Not exist</p>";
    	}else echo '<p>Error: ' . mysqli_error($cont) . '</p>';

}

// Updates one item (id == $id)
function EditItem($cont, $id, $name, $description, $ifActive, $idBuilding, $idTeachers) {
    $name = '".$name."';
    $description = $description == '' ? 'NULL' : '".$description."';
    $ifActive = $ifActive == '1' ? 1 : 0;
    $idBuilding = '".$idBuilding."';
    $idTeachers = '".$idTeachers."'; 
    /**$sql = mysqli_query($cont,"UPDATE Courses SET name='.$name.', description='.$description.', ifActive='.$ifActive.','idBuilding' ='.$idBuilding.', 'idTeachers'='.$idTeachers.'  WHERE id='.$id' ");*/
    //$sql = mysqli_query($cont, "UPDATE Courses SET name =  '".$_POST['name']."', description = '".$_POST['description']."', ifActive ='".$_POST['ifActive']."', idBuilding = '".$_POST['idBuilding']."', idTeachers = '".$_POST['idTeachers']."' WHERE id ='".{$_GET['red']."'");
    if ($sql)
    {
    	echo "<p>Successfully!</p>";
    }else echo '<p>Error: ' . mysqli_error($cont) . '</p>';
}

// Add new item 
function AddItem($cont, $name, $description, $ifActive, $idBuilding, $idTeachers) {
    $name = '".$name."';
    $description = $description == '' ? 'NULL' : '".$description."';
    $ifActive = $ifActive == '1' ? 1 : 0;
    $idBuilding = '".$idBuilding."';
    $idTeachers = '".$idTeachers."'; /**
    $sql = mysqli_query($conn,"INSERT INTO Courses (name, description, ifActive, idBuilding, idTeachers) VALUES ('.$name.', '.$description.', '.$ifActive.', '.idBuilding.', '.idTeachers.')");*/
    $sql = mysqli_query($cont, "INSERT INTO Courses (name, description, ifActive, idBuilding, idTeachers) VALUES ('".$_POST['name']."', '".$_POST['description']."', '".$_POST['ifActive']."', '".$_POST['idBuilding']."','".$_POST['idTeachers']."'");
    if ($sql)
    {
    	echo "<p>Successfully!</p>";
    }else echo '<p>Error: ' . mysqli_error($cont) . '</p>';
}
/**
function Main($id1, $id2)
{
    if (isset($_POST[$id1]))
   	{
   		UpdateItem($cont, $_POST['upd'], $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['idTeachers']);
  		AddItem($cont, $_POST['name'], $_POST['description'], $_POST['act'], $_POST['idBuilding'], $_POST['idTeachers']);
  	}
    if (isset($_GET[$id2]))
    {
    	DeleteItem($cont,$_GET[$id2]);
    }
}*/
?>