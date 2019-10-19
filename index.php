<!doctype html>
	<html lang="ru">
	<head>
  		<title>admin</title>
	</head>
	<body>
  <?php
    $host = 'localhost';  // переменная с именем сервера
    $user = 'crm';    // переменная с логином БД
    $pass = '6QjgPjxQ'; // переменная, содержащая пароль к БД
    $db_name = 'crm';   // переменная с названием БД
    $link = mysqli_connect($host, $user, $pass, $db_name); //переменная (является дискриптором), в которую кладем результат функции, которая создает доступ к БД

    echo "<meta charset=\"utf8\">";
    header('Content-Type: text/html; charset = utf-8');
   
    mysqli_query($link, 'SET NAMES utf8');


    //Если не удалось войти в БД, то выводим сообщение об ошибке.
    if (!$link) {
      echo 'Can not connect with DB. : code of mistake' . mysqli_connect_errno() . ', mistake: ' . mysqli_connect_error();
      exit;
    }

    /* с помощью функции isset определяем, была ли установлена переменная со значением, отличным от NULL при вызове метода POST (ользователь не видит данные, которые передают) */
    if (isset($_POST["name"])) {
      //проверяем не ноль ли результат передачи метода GET (данные видны при передаче)
     if (isset($_GET['red'])) {
        // пишем sql запрос и кладем результат в переменную
        $sql = mysqli_query($link, "UPDATE `Courses` SET `name` = '{$_POST['name']}',`description` = '{$_POST['description']}',`idBuilding` = '{$_POST['isBuilding']}',`idTeachers` = '{$_POST['idTeachers']}' WHERE `id`={$_GET['red']}");
      } else {
        //если результат обеих функций с методами NULL, то создаем новый sql апрос, куда передаеем всё, что нам требуется из таблицы
        $sql = mysqli_query($link, "INSERT INTO `Courses` (`name`, `description`,`idBuilding`,`idTeachers` ) VALUES ('{$_POST['name']}', '{$_POST['description']}','{$_POST['isBuilding']}', '{$_POST['idTeachers']}')");
      }

      //
      if ($sql) {
        echo '<p>Ð£ÑÐ¿ÐµÑˆÐ½Ð¾! Что-то выведется</p>';
      } else {
        echo '<p> ÐžÑˆÐ¸Ð±ÐºÐ°: и тут то что-то будет ' . mysqli_error($link) . '</p>';
      }
    }

    //
    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `Building` WHERE `id` = {$_GET['del']}");
      if ($sql) {
        echo "<p>ÐÐµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚ какое-то предложение</p>";
      } else {
        echo '<p>ÐžÑˆÐ¸Ð±ÐºÐ°: Описание???' . mysqli_error($link) . '</p>';
      }
    }

    //
    if (isset($_GET['red'])) {
      $sql = mysqli_query($link, "SELECT `id`, `name`, `description`, `addres` FROM `Building` WHERE `id`={$_GET['red']}");
      $product = mysqli_fetch_array($sql);
    }

  ?>

  
  <?php
  //
  $sql = mysqli_query($link, 'SELECT `id`, `name`, `description`,`addres` FROM `Building`');
  echo '<h2>Ð¢Ð°Ð±Ð»Ð¸Ñ†Ð° Ð·Ð´Ð°Ð½Ð¸Ð¹ ÐŸÐ¡Ð¢Ð“Ð£ всё еще не понятно</h2>';
  echo '<table border="2">';
    while($result = mysqli_fetch_array($sql)) //
    {
      echo "<tr>
     <td> {$result['name']} </td> <td> {$result['description']}</td><td> {$result['idBuilding']} </td><td> {$result['idTeachers']} </td>
     <td> <a href='?del={$result['id']}'> Delete</a></td> 
     <td><a href='?red={$result['id']}'>Edit</a> </td>";
    }
    echo "</TABLE>";

    echo "<p></p> <p>Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð½Ð¾Ð²ÑƒÑŽ Ð·Ð°Ð¿Ð¸ÑÑŒ тут пока тоже не понятно что....</p>";

  // while ($result = mysqli_fetch_array($sql)) {
  //   echo "<p>{$result['id']}) {$result['name']} - {$result['description']}  - {$result['addres']} -
  //   <a href='?del={$result['id']}'> Delete
  //   </a> - <a href='?red={$result['id']}'>Edit</a></p>";
  // }
  ?>

  <p></p>
  <form action="" method="post">
    <table>
      <tr>
        <td>ÐÐ°Ð·Ð²Ð°Ð½Ð¸Ðµ: Name:</td>
        <td><input type="text" name="name" value="<?= isset($_GET['red']) ? $product['name'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ: Description:</td>
        <td><input type="text" name="description" value="<?= isset($_GET['red']) ? $product['description'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>ÐÐ´Ñ€ÐµÑ: idBuilding: </td> 
        <td><input type="text" name="idBuilding" value="<?= isset($_GET['red']) ? $product['idBuilding'] : ''; ?>"></td>
      </tr>
      <tr>
      <tr>
        <td>idTeachers: </td>
        <td><input type="text" name="idTeachers" value="<?= isset($_GET['red']) ? $product['idTeachers'] : ''; ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <p><a href="?add=new">Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð½Ð¾Ð²ÑƒÑŽ Ð·Ð°Ð¿Ð¸ÑÑŒ don't understand</a></p>
</body>
</html>