<?php
ini_set('default_charset', 'utf-8');
		$mysqli = new MySQLi("localhost", "root","", "fenafh_db");
		$mysqli -> query ("SET NAMES UTF8");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
	//	else
		//	echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>