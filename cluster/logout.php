<?php
	session_start();
	session_destroy();
	unset($SESSION['Usuario']);
	include_once("index.php");
?>
