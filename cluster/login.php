<?php
	#include_once(Usuario.php);
   	#include_once(UsuarioFachada);
	session_start();
	$auth = 0;	
    if (isset($_SESSION['Usuario'])){
		include_once("index.php");
		echo "Useted esta actualmente logeado";
		echo "</b>";
		echo '<a href="/logout.php"> Logout </a>'; 	
	} else {
   		#include_once(Usuario.php);
   		#include_once(UsuarioFachada);
   		#$auth = funcion();
   		#$auth = UsuarioFachada::funcion($_POST['username']['password']);
		$_SESSION['Usuario'] = 2; # Retorno de la funcion
		include_once("index.php");
		echo "Ingreso satisfactorio su id es ".$_SESSION['Usuario'];
		echo "</b>";
		echo '<a href="/logout.php"> Logout </a>'; 
    }
?>
