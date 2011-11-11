<?php 

class UsuarioFachade {
  
  public function getUsuario($login) {
    require_once("Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
  
    $result  = mysql_query("SELECT * FROM usuario where login =".$login);

    if (!$result) {
      echo "false\n" ;
    } else {  
      $row = mysql_fetch_assoc($result);
      $usr = new Usuario();
      $usr->setLogin($row['login']);
      $usr->setPassword($row['password']);
      
      return $usr;
    }
  }

  public function addUsuario($login, $password) {
    
    require_once("Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
    
    $usr = new Usuario();
    $usr->setLogin($login);
    $usr->setPassword($password);
    
    $agregar = sprintf("insert into usuario  values ('%s','%s','%s');", 
		       mysql_real_escape_string($usr->getLogin()),
               mysql_real_escape_string($usr->getPassword()),
    
    if(!mysql_query($agregar)) {
      die ('Error:' . mysql_error());
    }
  }

  public function updateUsuario($login, $password) {
    
    require_once("Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
    
    $usr = new Usuario();
    $usr->setLogin($login);
    $usr->setPassword($password);

    $modif = sprintf ("UPDATE usuario set password='%s' where login='%s';",
                mysql_real_escape_string($usr->getPassword()),
                mysql_real_escape_string($jug->getLogin()));
    
    if(!mysql_query($modif)) {
      die ('Error:' . mysql_error());
    }
  }

  public function deleteUsuario($usr) {
    require_once("Usuario.php");
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
    require_once("Usuario.php");
    require_once("Database.php");
    $instancia = Database::getInstance();
    $instancia->connect();
  
    $result  = mysql_query("SELECT * FROM usuario");
    $lengths = mysql_num_rows($result);
    if (!$lengths) {
      echo "" ;
    } else {
      $i = 0;
      while($row = mysql_fetch_assoc($result)){
	    $prueba[$i] = new Usuario();
	    $prueba[$i]->setLogin($row['login']);
	    $prueba[$i]->setPassword($row['password']);
	    $i = $i + 1;
      }
    return $prueba;
    }
  }
}
?>