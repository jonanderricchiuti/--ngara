<?php
include("Static/head.php");
include("Static/header.php");
echo '
<!--Menu de Navegaci�n-->

    <!-- COMO USAR MENU DE NAVEGACION 
		Se debe cambiar el codigo que dice class="on", dependiendo
		de la pestania que se quiere seleccionar. Ejemplo:
		
		Trabajo en Estadios, entonces mi codigo se vera asi:
		<li class="on"><a href="_________">Estadios</a></li>
		y debemos quitar la class="on" de donde la teniamos
		(en este ejemplo esta en Inicio).-->
	
        <ul id="navigation">
          <li class="on"><a href="index.php">Inicio</a></li>
          <li><a href="#">Jugadores</a></li>
          <li><a href="#">Equipos</a></li>
          <li><a href="#">Estadios</a></li>
          <li><a href="#">Mi Perfil</a></li>
          <li><a href="#">Roster</a></li>
          <li><a href="#">Ligas</a></li>
          <li><a href="#">Calendario</a></li>
          <li><a href="#">Resultados</a></li>
          <li><a href="#">Reglas</a></li>
          <li><a href="#">Cont&aacutectenos</a></li>
        </ul>
  </div>
  <!--Final del header-->

  
  <!-- Area de trabajo:
	Despues de el Div content, hay un div id="contenido_interno",
	dentro de este ira el codigo php con los formularios o
	lo que se necesite para que se cumpla la funcion determinada.
	
	En caso de que el tamanio no sea suficiente, en style.css
	modificar: 
	#content					 ----  height
	#content #contenido_interno  ----  height
	-->
	   
	<div id="content">
		<div id="contenido_interno">';
		echo '<h2></h2>';
		
		echo "Login o password incorrectos";
		
		
		
echo '</div>';
include("Static/sideBar.php");
include("Static/footer.php");
?>

