<!DOCTYPE html>
<?php
session_start();{}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    </form>
Your events :
<br>
      <?php
      $link = mysqli_connect("localhost", "root", "", "project");
      $email = $_SESSION['emeil'];
  $user_id = "SELECT id FROM user where email = '$email'";

  $result = mysqli_query($link,$user_id);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $userid = $row["id"];

}
        $sql = "SELECT id, name, place, type, eventDate FROM `event` where user_id = '$userid'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["id"] . " " .
                $row["name"] . " " .
                $row["place"] . " " .
                $row["type"] . " " .
                $row["eventDate"];
                echo "</br>";
            }
        } else {
            echo "0 results";
            }

      }


?>

  </body>
</html>
