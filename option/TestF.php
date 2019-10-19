<!doctype html>
<html>
  <head>
    <title>Courses Table</title>
  </head>
<body>
<?php
include ('TestB.php');
/**
function EditItem ($red, $cont)
{
//if value name passed
	if (isset($_POST["name"])) {
    //If this is an update request, then update  
      if (isset($_GET['red'])) {
        //`ifActive` = '{$_POST['ifActive']}';
        // `ifActive` == 'true' ? 1 : 0 ;  
         $sql = mysqli_query($cont, "UPDATE Courses SET name = "'.{$_POST['name']}.'", description = "'.{$_POST['description']}.'", 
        	ifActive = "'.{$_POST['ifActive']}.'", idBuilding = "'.{$_POST['idBuilding']}.'",idTeachers = "'.{$_POST['idTeachers']}.'" WHERE `id`="'.{$_GET['red']}.'"");
      } else {
        //Иначе добаляем данные, подставляя их в запрос
        $sql = mysqli_query($cont, "INSERT INTO `Courses` (`name`, `description`, `ifActive`, `idBuilding`, `idTeachers`) VALUES ("'.{$_POST['name']}.'", "'.{$_POST['description']}.'", "'.{$_POST['ifActive']}.'", "'.{$_POST['idBuilding']}.'", "'.{$_POST['idTeachers']}."');
      }
    }

if ($sql) {
        echo '<p>Successfully!</p>';
      } else {
        echo '<p>Error: ' . mysqli_error($cont) . '</p>';
      }
    }

//delete item
function DeleteItem($del, $cont)
{
	if (isset($_GET['del']))
    {
    	$sql = mysqli_query($cont, "DELETE FROM `Courses` WHERE `id` = "'{$_GET['del']}');
    	if ($sql)
    	{
    		echo "<p>Not exist</p>";
    	}else echo '<p>Error: ' . mysqli_error($cont) . '</p>';
    }
} */


$host = 'localhost';  $login = 'crm'; $namedb = 'crm'; $password = '6QjgPjxQ';
$cont = mysql_connect($host, $login, $password, $namedb);
echo "<meta charset=\"cp1251\">";
header('Content-Type: text/html; charset = cp1251');
mysql_set_charset('cp1251');
if(!mysql_select_db("crm", $cont))
  {
  	//echo 'Can not connect with DB.: code of mistake' . mysqli_connect_errno() . ', mistake: ' . mysqli_connect_error(); exit;
    die();  //don't do skript
  }
/**
if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'create':
        	AddItem($cont, $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
            break;
        case 'update':
        	UpdateItem($cont, $_POST['id'], $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
            break;
        case 'delete':
        	DeleteItem($cont, $_POST['id']);
            break; 
    } */

//$page = $_GET['action'];
//check availability id
if(isset($_GET['id']))
{
	PrintTable($_GET['id'], $cont);
	if (isset($_GET['del']))
    {
    	DeleteItem($cont, $_GET['del']);
    }
    if (isset($_POST["name"]))
    {
    	if (isset($_GET['red']))
    	{ 
    		EditeItem($cont, $_POST['id'], $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
    	}else AddItem($cont, $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
    }
}else
{
    $_GET['id'] = 0;
    PrintTable(0, $cont);
    if (isset($_GET['del']))
    {
    	DeleteItem($cont, $_GET['del']);
    }
    if (isset($_POST["name"]))
    { 
    	if (isset($_GET['red']))
    	{
    		EditeItem($cont, $_POST['id'], $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
    	}else AddItem($cont, $_POST['name'], $_POST['description'], $_POST['ifActive'], $_POST['idBuilding'], $_POST['$idTeachers']);
    }
}
 /**   //Если передана переменная red передана, то обновляем данные. (Достаем их из БД и формируем массив)
    if (isset($_GET['red'])) {
      $sql = mysqli_query($cont, "SELECT *  FROM Courses WHERE id='.{$_GET['red']}'");
      $product = mysqli_fetch_array($sql);
    }
    $id1 = 'upd'; $id2 = 'del'; 
    Main($id1, $id2);*/
?>
<!-- поля для создания новой заметки -->
  <p></p>
  <form action="" method="post">
    <table>
        <tr>
        	 <td>Name:</td>
        	 <td><input type="text" name="name" value="<?= isset($_GET['upd']) ? $product['name'] : ''; ?>"></td>
      	</tr>
      	<tr>
        	 <td>Description:</td>
        	 <td><input type="text" name="description" value="<?=  isset($_GET['upd']) ? $product['description'] : ''; ?>"></textarea></td>
      	</tr>
      	<tr>
      		 <td>ifActive:</td>
      		 <td><select name="ifActive" required><option>1</option><option>0</option></select></td></tr>
        </tr>
      	<tr>
        	 <td>idBuilding:</td>
             <td><input type="text" name="idBuilding" value="<?= isset($_GET['upd']) ? $product['idBuilding'] : ''; ?>"></td>
      	</tr>
      	<tr>
        	 <td>idTeachers:</td>
        	 <td><input type="text" name="idTeachers" value="<?= isset($_GET['upd']) ? $product['idTeachers'] : ''; ?>"></td>
      	</tr>
      	<tr>
        	 <td colspan="2"><input type="submit" value="ADD"></td>
      	</tr>
    </table>
  </form>
  <p><a href="?add=new">Add new note</a></p>
</body>
</html>