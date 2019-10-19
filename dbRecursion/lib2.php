<?php

	function get_menu($cont, $id, $id_menu) //функция вывода меню на страницу сайта; передаем дискриптор соединения, id и id_menu из таблицы в БД
	{ 
 		$sql = mysql_query("SELECT id, name from menu where pid = '$id' ",$cont); //формируем sql запрос; из таблицы menu берем все значения полей id и name
 		$str = '<ul>'; // тег для отступа

 		while($arr = mysql_fetch_array($sql)) /*условие в цикле: переменной arr присваеваем результат выполнения функции mysql_fetch_array, которая возвращает (в данном случае) численнй массив, который формируется из переменной sql */
     	{
       
         	if($id_menu == $arr['id']) // если id_menu (выбранное имя) совпадает и переменной массива с номером id, то:
         	{
          		$str.= "<li><strong><a href=\"/PSTGU/2019/gritskova/dbRecursion/db.php?id=".$arr['id']."\">".$arr['name']."</a></strong></li></br>";
          		/* кладем в переменную значения id и name из таблицы и выделяем имя с помощью тега strong */
         	}else //иначе
         	 {
          		 $str.= "<li><a href=\"db.php?id=".$arr['id']."\">".$arr['name']."</a></li></br>";
          		 /* кладем в переменную значения id и name из таблицы */
         	 }

     		$str.= get_menu($cont,$arr['id'],$id_menu);
     		// рекурсивно вызываем функцию get_menu вывода подрубрик
        }

		$str.= "</ul>";
		return $str; // возвращаем строку
	}
 


	function get_content($cont, $id) //функция вывода контента на страницу сайта; передаём дискриптор соединения и id
	{
		$sql = mysql_query("SELECT content from menu where id='".$id."'",$cont); /* кладем в переменную sql запрос, по которому из таблицы menu достаем все значения id */
		$str = " "; 
		while($arr=mysql_fetch_array($sql)) //с помощью функции формируем массив и кладем его в переменную arr 
      	{
            $str.= $arr['content']; // кладем в переменную значение из ячейки content 
      	}

   		return $str; // возвращаем строку
	}
?>