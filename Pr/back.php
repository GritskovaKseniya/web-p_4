<?php 
	$sql = mysql_query("SELECT * from Courses",$cont);

	while($arr = mysql_fetch_array($sql))
	{
	echo $arr['id'];
	echo get_teacher_name($arr['idTeacher'],$cont);
	echo get_building_val($arr['idBuilding'],$cont);

	}
 
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

	
/**	/** Returns array of all records in DB */
    function getTypes($conn, $sql) {
    	$result = array();

    	while($record = mysqli_fetch_array($sql)) {
        	$result[] = $record;
    	}	

    	return $result;
	}

	/** Adds new record into DB */
	function addType($conn, $name, $description, $active, $idBuilding, $idTeachers) {
    	$name = '"'.$name.'"';
    	$active = $active == 'true' ? 1 : 0;
		$description = $description == '' ? 'NULL' : '"'.$description.'"';
		$idBuilding = $idBuilding == ''? 'NULL': '"'.$idBuilding.'"';
		$idTeachers = $idTeachers == ''? 'NULL': '"'.$idTeachers.'"';

    	mysqli_query(
        	$conn,
        	'INSERT INTO Courses (name, description, ifActive, idBuilding, idTeachers) VALUES
        	('.$name.', '.$description.', '.$active.', '.$idBuilding.','.$idTeachers.' )'
    	);
	}
 /**   
	// Returns one record from DB with id == $id
	function getTypeInfo($conn, $id) {
    	$res = mysqli_query(
        	$conn,
        	'SELECT * FROM Courses WHERE id='.$id    
    	);
    
    	return mysqli_fetch_array($sql);
	}

	// Updates one record in DB with id == $id 
	function updateType($conn, $id, $name, $description, $active, $idBuilding, $idTeachers) {
    	$name = '"'.$name.'"';
    	$active = $active == 'true' ? 1 : 0;
		$description = $description == '' ? 'NULL' : '"'.$description.'"';
		$idBuilding = $idBuilding == ''? 'NULL': '"'.$idBuilding.'"';
		$idTeachers = $idTeachers == ''? 'NULL': '"'.$idTeachers.'"';

    	mysqli_query(
        	$conn,
			'UPDATE Courses SET name='.$name.', description='.$description.', 
			ifActive='.$active.', idBuilding='.$idBuilding.', idTeachers='.$idTeachers.' WHERE id='.$id
    	);
	}

	// Deletes one record from DB with id == $id 
	function deleteType($conn, $id) {
    	mysqli_query(
        	$conn,
        	'DELETE FROM Courses WHERE id='.$id
    	);
	} 
	*/
?>




?>