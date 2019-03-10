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
  Repeat Password : <input type="password" name="password2"required>  <br>
    <input type ="submit" name="clicked" value="register">
  </form>
  <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <form action="index.php" method="get">
<input type ="submit" name="back" value="back">
  </form>
  <?php
if (isset($_POST["email"]))
{
$email_a = $_POST['email'];
if (!filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$email_a' is invalid.\n";
  }
}
?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
$link = mysqli_connect("localhost", "root", "", "Projcet");
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {
  $table1 =  "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(256) NOT NULL,
    password varchar(256))";
    $create1 = mysqli_query($link, $table1);
}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"]))
{
$checking = $_POST["password2"];
$mail = $_POST["email"];
$pass = $_POST["password"];
if($checking !== $pass)
{
  echo 'Passwords do not match';
}
else
{
   if (strlen($_POST["password"]) <= 5) {
           echo "Your Password Must Contain At Least 6 Characters! <br>";
       }
       elseif(!preg_match("#[0-9]+#",$pass)) {
           echo "Your Password Must Contain At Least 1 Number! <br>";
       }
       elseif(!preg_match("#[A-Z]+#",$pass)) {
           echo "Your Password Must Contain At Least 1 Capital Letter! <br>";
       }
       elseif(!preg_match("#[a-z]+#",$pass)) {
          echo "Your Password Must Contain At Least 1 Lowercase Letter! <br>";
       }
         $check = "SELECT * FROM `user` WHERE email ='$mail'";
         $results = mysqli_query($link,$check);
             if ($results->num_rows > 0){
              echo "This email already exist! Try another one.";
           }
           else {
    $hashed = hash('sha512', $pass);
    if (isset($_POST['clicked']))
    {
      $sql = "INSERT INTO user (email,password) VALUES ('$mail','$hashed')";

      if ((mysqli_query($link,$sql)))
            {
        echo 'Registration succesfull!';
        }
      }
    }
  }
}
?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
  </body>
</html>
