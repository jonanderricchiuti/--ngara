<?php

class Descripcion_Usuario {
  private $login;
  private $fecha_nacimiento;
  private $nombre;
  private $apellido;
  private $genero;

  public function fillClass($login, $fecha_nacimiento, $nombre, $apellido, $genero)
  {
    $this->login = $login;
    $this->fecha_nacimiento = $fecha_nacimiento;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->genero = $genero;
  }

  function getLogin(){
    return $this->login;
  }
  
  function setLogin($login){
    $this->login = $login;
  }
  
  function getFecha_Nacimiento(){
    return $this->fecha_nacimiento;
  }
  
  function setFecha_Nacimiento($fecha_nacimiento){
    $this->fecha_nacimiento = $fecha_nacimiento;
  }
  
  function getNombre(){
    return $this->nombre;
  }
  
  function setNombre($nombre){
    $this->nombre = $nombre;			
  }
  
  function getApellido(){
    return $this->apellido;
  }
  
  function setApellido($apellido){
    $this->apellido = $apellido;			
  }
  
  function getGenero(){
    return $this->genero;
  }
  
  function setGenero($){
    $this->genero = $genero;		
  }
}
?>