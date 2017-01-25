<?php
	
	# Tietokannan asetukset
	$url = parse_url(getenv("CLEARDB_DATABASE_URL: mysql://be3796d849fded:57df9d26@eu-cdbr-west-01.cleardb.com/heroku_19bff8193126863?reconnect=true"));

	$server = $url["host"];
	$username = $url["be3796d849fded"];
	$password = $url["57df9d26"];
	$db = substr($url["path"], 1);
	
	# Aloitetaan istunto
	session_start();

	# Asetetaan käyttäjä ID
	$_SESSION['user_id'] = 1;
	
	# Muodostetaan yhteys tietokantaan
	$db = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . '', $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	if(!isset($_SESSION['user_id'])) {
		die('You\'re not signed in!');
	}


?>