<?php
include "config.php";

if ($_POST != null) {
        $nombre = pg_escape_string(trim($_POST['nombre']));
        $numero = trim($_POST['numero']);
        $equipo = pg_escape_string(trim($_POST['equipo']));

        $query = "INSERT INTO \"Jugador\" (\"nombre\", \"número\", \"equipo\") SELECT '{$nombre}', '{$numero}', \"Equipo\".\"id\" FROM \"Equipo\" WHERE \"Equipo\".\"nombre\" = '{$equipo}'";
        $result = pg_query($query) or die('Query 1 failed: ' . pg_last_error() . "\n$query\n$nombre\n$numero\n$equipo\n");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Triple Play</title>
                <link href="style.css" rel="stylesheet" type="text/css" />
        </head>

        <body>
                <div id="insert">
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
                                                        <form action="insertar.php" method="post">
                                                                <p>Nombre del jugador:</p>
                                                                <input type="text" name="nombre" />
                                                                <p>Equipo:</p>
                                                                <select name="equipo" />
<?php
$query = 'SELECT "Equipo"."nombre" FROM "Equipo"';
$result = pg_query($query) or die('Query 2 failed: ' . pg_last_error());

while ($row = pg_fetch_row($result, null, PGSQL_ASSOC)) {
        foreach ($row as $col_value) {
                echo "<option value=\"$col_value\">$col_value</option>\n";
        }
}
?>
                                                                </select>
                                                                <p>Número:</p>
                                                                <select name="numero" />
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                        <option value="19">19</option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22">22</option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                        <option value="31">31</option>
                                                                        <option value="32">32</option>
                                                                        <option value="33">33</option>
                                                                        <option value="34">34</option>
                                                                        <option value="35">35</option>
                                                                        <option value="36">36</option>
                                                                        <option value="37">37</option>
                                                                        <option value="38">38</option>
                                                                        <option value="39">39</option>
                                                                        <option value="40">40</option>
                                                                        <option value="41">41</option>
                                                                        <option value="42">42</option>
                                                                        <option value="43">43</option>
                                                                        <option value="44">44</option>
                                                                        <option value="45">45</option>
                                                                        <option value="46">46</option>
                                                                        <option value="47">47</option>
                                                                        <option value="48">48</option>
                                                                        <option value="49">49</option>
                                                                        <option value="50">50</option>
                                                                        <option value="51">51</option>
                                                                        <option value="52">52</option>
                                                                        <option value="53">53</option>
                                                                        <option value="54">54</option>
                                                                        <option value="55">55</option>
                                                                        <option value="56">56</option>
                                                                        <option value="57">57</option>
                                                                        <option value="58">58</option>
                                                                        <option value="59">59</option>
                                                                        <option value="60">60</option>
                                                                        <option value="61">61</option>
                                                                        <option value="62">62</option>
                                                                        <option value="63">63</option>
                                                                        <option value="64">64</option>
                                                                        <option value="65">65</option>
                                                                        <option value="66">66</option>
                                                                        <option value="67">67</option>
                                                                        <option value="68">68</option>
                                                                        <option value="69">69</option>
                                                                        <option value="70">70</option>
                                                                        <option value="71">71</option>
                                                                        <option value="72">72</option>
                                                                        <option value="73">73</option>
                                                                        <option value="74">74</option>
                                                                        <option value="75">75</option>
                                                                        <option value="76">76</option>
                                                                        <option value="77">77</option>
                                                                        <option value="78">78</option>
                                                                        <option value="79">79</option>
                                                                        <option value="80">80</option>
                                                                        <option value="81">81</option>
                                                                        <option value="82">82</option>
                                                                        <option value="83">83</option>
                                                                        <option value="84">84</option>
                                                                        <option value="85">85</option>
                                                                        <option value="86">86</option>
                                                                        <option value="87">87</option>
                                                                        <option value="88">88</option>
                                                                        <option value="89">89</option>
                                                                        <option value="90">90</option>
                                                                        <option value="91">91</option>
                                                                        <option value="92">92</option>
                                                                        <option value="93">93</option>
                                                                        <option value="94">94</option>
                                                                        <option value="95">95</option>
                                                                        <option value="96">96</option>
                                                                        <option value="97">97</option>
                                                                        <option value="98">98</option>
                                                                        <option value="99">99</option>
                                                                </select>
                                                                <input type="submit" value="Enviar" />
                                                        </form>
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
<?php
pg_close($dbconn);
?>
