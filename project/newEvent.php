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
      <form method="post">
    Event name : <input type="text" name="event" required><br>
    Place : <input type="text" name="place"required>  <br>
    Type : <input type="text" name="type"required>  <br>
    Date : <input type="date" name="date">  <br>
    <input type ="submit" name="create" value="Create!">
  </form>
      <?php
      $link = mysqli_connect("localhost", "root", "", "project");
      $email = $_SESSION['emeil'];
if(isset($_POST["create"]))
{
  $user_id = "SELECT id FROM user where email = '$email'";
  $result = mysqli_query($link,$user_id);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $userid = $row["id"];
      if (isset($_POST["event"]) && isset($_POST["place"]) && isset($_POST["type"]) && isset($_POST["date"]))
      {
      $event = $_POST["event"];
      $place = $_POST["place"];
      $type = $_POST["type"];
      $date = $_POST["date"];

      $sql = "INSERT INTO event (user_id,name,place,type,eventDate) VALUES ('$userid','$event','$place','$type','$date')";
            if (mysqli_query($link,$sql))
                  {
              echo 'Event creation is succesfull!';
                  $link->close();
        }
      }
    }
  }
}
?>
  </body>
</html>
