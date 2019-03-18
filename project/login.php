<?php
session_start();{}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <form method="post">
  Your Email : <input type="text" name="email" required>    <br>
  Password :   <input type="password" name="password"required>  <br>
    <input type ="submit" name="clicked" value="login">
  </form>
</form>
<form action="index.php" method="get">
<input type ="submit" name="back" value="back">
</form>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php

$link = mysqli_connect("localhost", "root", "", "Project");
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//==================================================================================================================================
if (isset($_POST["email"]) && isset($_POST["password"]))
{
$password = $_POST["password"];
$email = $_POST["email"];
if(isset($_POST['clicked'])){
  $hashed = hash('sha512', $password);
  $check = "SELECT * FROM user where email ='$email' and password ='$hashed'";
  $results = mysqli_query($link,$check);
      if ($results->num_rows === 1){
        $_SESSION['emeil'] = $email;
        ?>
        Log in succesfull, your options :
        <form action="NewEvent.php" method="post">
           Create new event : <input type ="submit" name="NewEvent" value="New Event">
      </form>
      <form action="myEvents.php" method="post">
           Check your created events : <input type ="submit" name="check" value="My Events">
    </form>
<?php
  }
    else {
      echo "Wrong data inserted :-(";
      }
    }
    $link->close();
  }

?>
  </form>
  </body>
</html>
