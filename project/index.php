<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<form action="login.php" method="get">
  If you want to log in press here : <input type ="submit" name="clicked" value="login"><br>
  </form>
 <form action="Register.php" method="get" name = "pressed">
  If you want to register press here :  <input type ="submit" name="clicked1" value="register"><br>
    <br>
  </form>
  <?php
 $link = mysqli_connect("localhost", "root", "", "project");
  include "CreateTable.php";
  new CreateTable($link);
  include "userClass.php";
?>

  </body>
</html>
