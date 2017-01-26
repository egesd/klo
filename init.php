<?php
	
	# Tietokannan asetukset 
	
	$server = getenv("CLEARDB_SERVER");
	$username = getenv("CLEARDB_USERNAME");
	$password = getenv["CLEARDB_PASSWORD"];
	$db = getenv["CLEARDB_DB");
	
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