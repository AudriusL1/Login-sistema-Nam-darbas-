<?php
Class userClass
{
  private $email;
  private $password;
  private $repeatPassword;
  /*public function __construct($email, $password, $repeatPassword)
  {
  $this->email = $email;
  $this->password = $password;
  $this->repeatPassword = $repeatPassword;
}*/

  public function __construct()
  {
  //  $link = mysqli_connect("localhost", "root", "", "project");
  }
  public function getEmail()
  {
    return $this->$email;
  }
  public function getRepeated()
  {
    return $this->$repeatPassword;
  }
  public function getPassword()
  {
    return $this->$password;
  }
  public function setEmail($mail)
  {
     $this->$email = $mail;
  }
  public function setRepeated($repeatPass)
  {
     $this->$repeatPassword = $repeatPass;
  }
  public function setPassword($pass)
  {
     $this->$password = $pass;
  }
}
?>
