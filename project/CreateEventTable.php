<?php
Class CreateEventTable{
public function __construct(){
  $link = mysqli_connect("localhost", "root", "", "project");
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {
  $table1 =  "CREATE TABLE event (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6),
    name VARCHAR(64),
    place varchar(32),
    type varchar(32),
    eventDate varchar(32))";
    mysqli_query($link, $table1);
    }
    $link -> close();
  }
}
?>
