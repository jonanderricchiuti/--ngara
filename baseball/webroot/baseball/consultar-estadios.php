<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Triple Play</title>
                <link href="style.css" rel="stylesheet" type="text/css" />
        </head>

        <body>
                <div id="consult">
                        <div id="logo">
                                <h1><a href="inicio.html"><span class="hidden">Triple Play</span></a></h1>
                        </div>
                        <div id="container">
                                <div id="header"></div>
                                <div id="navigation">
                                        <h2 class="hidden">Navigation</h2>
                                        <ul>
                                                <li><a href="consultar.html"  class="consult"><span class="hidden">Consultar </span></a></li>
                                                <li><a href="insertar.html"   class="insert" ><span class="hidden">Insertar  </span></a></li>
                                                <li><a href="eliminar.html"   class="delete" ><span class="hidden">Eliminar  </span></a></li>
                                                <li><a href="actualizar.html" class="update" ><span class="hidden">Actualizar</span></a></li>
                                        </ul>
                                </div>
                                <div id="content">
                                        <div id="content-left">
                                                <div id="title">
                                                        <h2 class="hidden">Indice</h2>
                                                </div>
                                                <div id="description">
                                                </div>
                                        </div>
                                        <div id="content-right">
                                                <div id="main">
                                                        <p>Estadios:</p>
<?php
$dbconn = pg_connect("host=localhost dbname=Baseball user=Baseball password=klasd864") or die('Could not connect: ' . pg_last_error());

$query = 'SELECT "Estadio"."nombre" AS a, "Estadio"."ciudad" AS b, "Estadio"."estado" AS c, "Estadio" FROM "Estadio", "Equipo" WHERE "Estadio"."equipo" = "Equipo"."id"';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

echo "<table border=\"1\">\n";
echo "<tr><th>Jugador</th><th>Número</th><th>Equipo</th></tr>\n";
while ($row = pg_fetch_row($result, null, PGSQL_ASSOC)) {
        echo "<tr>\n";
        foreach ($row as $col_value) {
                echo "<td>$col_value</td>\n";
        }
        echo "</tr>\n";
}
echo "</table>\n";

pg_free_result($result);
pg_close($dbconn);
?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div id="footer">
                                <p>Un producto de Ñángara, Inc. <img src="images/vendor.png" alt="Una pieza del teclado de un computador, con el simbolo de ñangara." /></p>
                        </div>
                </div>
        </body>
</html>
