<?php

class Usuario {
  private $login;
  private $password;
  
  public function fillClass($login, $password)
  {
    $this->login = $login;
    $this->password = $password;
  }

  function getLogin(){
    return $this->login;
  }
  
  function setLogin($login){
    $this->login = $login;
  }
  
  function getPassword(){
    return $this->password;
  }
  
  function setPassword($password){
    $this->password = $password;			
  }

}
?>