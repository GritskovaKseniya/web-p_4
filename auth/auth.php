<?
session_start();
if(isset($_POST['login']))
  {
   $_SESSION['login']=$_POST['login'];
  }

if(isset($_SESSION['login']))
  {
   echo "session val:".$_SESSION['login']."<br>";
  }
echo "session id:".session_id();
echo "<a href=\"test.php\">test</a><br>";
echo "<a href=\"destroy.php\">destroy</a><br>";
?>
