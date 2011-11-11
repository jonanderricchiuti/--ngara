<?php 

class Descripcion_UsuarioFachade {
  
  public function getDescripcion_Usuario($login) {
    require_once("Descripcion_Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
  
    $result  = mysql_query("SELECT * FROM descripcion_usuario where id =".$login);

    if (!$result) {
      echo "false\n" ;
    } else {  
      $row = mysql_fetch_assoc($result);
      $usr = new Descripcion_Usuario();
      $usr->setLogin($row['login']);
      $usr->setFecha_Nacimiento($row['fecha_nacimiento']);
      $usr->setNombre($row['nombre']);
      $usr->setApellido($row['apellido']);
      $usr->setGenero($row['genero']);
      
      return $usr;
    }
  }

  public function addDescripcion_Usuario($login, $fecha_nacimiento, $nombre, $apellido, $genero) {
    
    require_once("Descripcion_Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
    
    $usr = new Descripcion_Usuario();
    $usr->setLogin($login);
    $usr->setFecha_Nacimiento($fecha_nacimiento);
    $usr->setNombre($nombre);
    $usr->setApellido($apellido);
    $usr->setGenero($genero);
    
    $agregar = sprintf("insert into descripcion_usuario  values ('%s','%s','%s','%s','%s');", 
		       mysql_real_escape_string($usr->getLogin()),
               mysql_real_escape_string($usr->getFecha_Nacimiento()),
               mysql_real_escape_string($usr->getNombre()),
               mysql_real_escape_string($usr->getApellido()),
               mysql_real_escape_string($usr->getGenero()));
    
    if(!mysql_query($agregar)) {
      die ('Error:' . mysql_error());
    }
  }

  public function updateDescripcion_Usuario($login, $fecha_nacimiento, $nombre, $apellido,
        $genero) {
    
    require_once("Descripcion_Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
    
    $usr = new Descripcion_Usuario();
    $usr->setLogin($login);
    $usr->setFecha_Nacimiento($fecha_nacimiento);
    $usr->setNombre($nombre);
    $usr->setApellido($apellido);
    $usr->setGenero($genero);

    $modif = sprintf ("UPDATE descripcion_usuario set fecha_nacimiento='%s', nombre='%s', 
                        apellido='%s', genero='%s'
                        where login='%s';",
                mysql_real_escape_string($usr->getTipo()),
                mysql_real_escape_string($usr->getNombre()),
                mysql_real_escape_string($usr->getApellido()),
                mysql_real_escape_string($usr->getGenero()),
                mysql_real_escape_string($jug->getLogin()));
    
    if(!mysql_query($modif)) {
      die ('Error:' . mysql_error());
    }
  }

  public function deleteDescripcion_Usuario($usr) {
    require_once("Descripcion_Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
    
    $borrar = sprintf("DELETE from usuario WHERE login= '%s';",
		      mysql_real_escape_string($usr));
    if(!mysql_query($borrar)) {
      die ('Error:' . mysql_error());
    }
  }
  
  public function listall() {
    require_once("Descripcion_Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
  
    $result  = mysql_query("SELECT * FROM descripcion_usuario");
    $lengths = mysql_num_rows($result);
    if (!$lengths) {
      echo "" ;
    } else {
      $i = 0;
      while($row = mysql_fetch_assoc($result)){
	    $prueba[$i] = new Descripcion_Usuario();
	    $prueba[$i]->setLogin($row['login']);
	    $prueba[$i]->setFecha_Nacimiento($row['fecha_nacimiento']);
        $prueba[$i]->setNombre($row['nombre']);
        $prueba[$i]->setApellido($row['apellido']);
        $prueba[$i]->setGenero($row['genero']);
	    $i = $i + 1;
      }
    return $prueba;
    }
  }
}
?>