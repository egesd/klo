<?php
	
	# Tietokannan asetukset 
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
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