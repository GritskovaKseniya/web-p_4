<?
session_start();
echo $_SESSION['login'];
unset($_SESSION['login']);
session_destroy();
echo "<a href=\"auth.php\">back</a>";

?>
