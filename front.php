<?php
header('Content-Type: text/html; charset=utf-8');
/** Init DB */
$conn = mysqli_connect('localhost', 'crm', '6QjgPjxQ', 'crm');
mysqli_set_charset($conn, 'utf8');
require_once('./back.php');
/** Processing POST requests*/
if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'create':
            addType($conn, $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['idTeachers']);
            break;
        case 'update':
            updateType($conn, $_POST['id'], $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['idTeachers']);
            break;
        case 'delete':
            deleteType($conn, $_POST['id']);
            break; 
    }
    echo '<p>Success!</p>';
}
/** Set environment */
$page = $_GET['action'];
switch($page) {
    case 'read':
        $title = 'Courses Table';
        break;
    case 'update':
        $title = 'Edit document type';
        break;
    case 'delete':
        $title = 'Delete document type';
        break;
}
/** Retutns html table that contains info from DB */
function renderCoursesTable($conn) { //renderDocumentTable
    $records = getTypes($conn);
    $result = '<table border="2">';
    for ($i = 0; $i < count($records); $i++) {
        $result.=
        '<tr>'.
        '<td>'.$records[$i]['id'].'</td>'.
        '<td>'.$records[$i]['name'].'</td>'.
        '<td>'.$records[$i]['description'].'</td>'.
        '<td>'.$records[$i]['ifActive'].'</td>'.
        '<td>'.$records[$i]['idBuilding'].'</td>'.
        '<td>'.$records[$i]['idTeachers'].'</td>'.
        '<td><a href="./front.php?action=update&id='.$records[$i]['id'].'">Edit</a></td>'.
        '<td><a href="./front.php?action=delete&id='.$records[$i]['id'].'">Delete</a></td>'.
        '</tr>';
    }
    $result.='</table>';
    
    return $result;
}
/** Returns form to add new document type into DB */
function renderAddForm() {
    $result = '<p> Add new note</p>';
    $result.= '<form method="POST" ifAction="./front.php?ifAction=read">';
    $result.= '<input type="hidden" name="ifAction" value="create">';
    $result.= '<table>';
    $result.= '<tr><td>Name:</td><td><input type="text" name="name" required></td></tr>';
    $result.= '<tr><td>Description:</td><td><textarea name="description"></textarea></td></tr>';
    $result.= '<tr><td>ifActive:</td><td><select name="ifActive" required><option>true</option><option>false</option></select></td></tr>';
    $result.= '<tr><td>idBuilding:</td><td><input type="text" name="idBuilding" required></td></tr>';
    $result.= '<tr><td>idTeachers:</td><td><input type="text" name="idTeachers" required></td></tr>';
    $result.= '<tr><td colspan="2"><input type="submit" value="Add"></td></tr>';
    $result.= '</table>';
    $result.='</form>';
    return $result;
}
/** Returns form to edit existing document type */
function renderEditForm($conn, $id) {
    $item = getTypeInfo($conn, $id);
    $result = '<p>Edit note</p>';
    $result.= '<form method="POST" action="./front.php?action=read">';
    $result.= '<input type="hidden" name="ifAction" value="update">';
    $result.= '<input type="hidden" name="id" value="'.$id.'">';
    $result.= '<table>';
    $result.= '<tr><td>Name:</td><td><input type="text" name="name" required value="'.$item['name'].'"></td></tr>';
    $result.= '<tr><td>Description:</td><td><textarea name="description">'.$item['description'].'</textarea></td></tr>';
    $result.= '<tr><td>ifActive:</td><td><select name="active" required>'.
        '<option>'.($item['ifActive'] == 1 ? 'true' : 'false').'</option>'.
        '<option>'.($item['ifActive'] == 1 ? 'false' : 'true').'</option>'.
    '</select></td></tr>';
    $result.= '<tr><td>idBuilding:</td><td><input type="text" name="idBuilding" required></td></tr>';
    $result.= '<tr><td>idTeachers:</td><td><input type="text" name="idTeachers" required></td></tr>';
    $result.= '<tr><td colspan="2"><input type="submit" value="Edit"></td></tr>';
    $result.= '</table>';
    $result.= '</form>';
    return $result;
}
/** Returns form that asks user's confirmation to delete existing document type */
function renderDeleteSubmitionForm($id) {
    $result = '<form method="POST" action="./front.php?action=read">';
    $result.= '<input type="hidden" name="action" value="delete">';
    $result.= '<input type="hidden" name="id" value="'.$id.'">';
    $result.= 'Please, confirm the action <br/>';
    $result.= '<input type="submit" value="Delete">';
    $result.= '</form>';
    return $result;
}
include 'templ.html';
?>