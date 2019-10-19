<?php
/** Returns array of all records in DB */
function getTypes($conn) {
    $res = mysqli_query($conn, 'SELECT * FROM Courses');
    $result = array();
    while($record = mysqli_fetch_array($res)) {
        $result[] = $record;
    }
    return $result;
}
/** Adds new record into DB */
function addType($conn, $name, $description, $active) {
    $name = '"'.$name.'"';
    $ifActive = $ifActive == 'true' ? 1 : 0;
    $description = $description == '' ? 'NULL' : '"'.$description.'"';
    $idBuilding = '"'.$idBuilding.'"';
    $idTeachers = '"'.$idTeachers.'"';

    mysqli_query(
        $conn,
        'INSERT INTO Courses (name, description, ifActive, idBuilding, idTeachers) VALUES
        ('.$name.', '.$description.', '.$ifActive.', '.$idBuilding.', '.$idTeachers.')'
    );
}
/** Returns one record from DB with id == $id */
function getTypeInfo($conn, $id) {
    $res = mysqli_query(
        $conn,
        'SELECT * FROM Courses WHERE id='.$id    
    );
    
    return mysqli_fetch_array($res);
}
/** Updates one record in DB with id == $id */
function updateType($conn, $id, $name, $description, $active) {
    $name = '"'.$name.'"';
    $ifActive = $ifActive == 'true' ? 1 : 0;
    $description = $description == '' ? 'NULL' : '"'.$description.'"';
    $idBuilding = '"'.$idBuilding.'"';
    $idTeachers = '"'.$idTeachers.'"';

    mysqli_query(
        $conn,
        'UPDATE Courses SET name='.$name.', description='.$description.', ifActive='.$ifActive.', idBuilding='.$idBuilding.', idTeachers='.$idTeachers.' WHERE id='.$id
    );
}
/** Deletes one record from DB with id == $id */
function deleteType($conn, $id) {
    mysqli_query(
        $conn,
        'DELETE FROM Courses WHERE id='.$id
    );
}
?>