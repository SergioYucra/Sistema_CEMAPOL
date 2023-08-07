<?php

session_start();

$conex = @mysqli_connect("localhost","root","","dbcemapol"); 
if (!$conex) {
	echo "error grave wey";
}

?>