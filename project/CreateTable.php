<?php
Class CreateTable{
public function __construct($link){
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {
  $table1 =  "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(256) NOT NULL,
    password varchar(256))";
    mysqli_query($link, $table1);
    }
    $link -> close();
  }
}
?>
