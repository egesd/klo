<?php
	# Pyydetään init.php
	require_once 'init.php';

	# Jos muuttuja name löytyy
	if(isset($_POST['name'])) {
		# Trimmataan muuttuja (poistetaan turhat välilyönnit)
		$name = trim($_POST['name']);
		
		# Jos muuttuja ei ole tyhjä se lisätään kantaan 
		if(!empty($name)) {
			$addedQuery = $db->prepare("
				INSERT INTO todos (name, user, done, created)
				VALUES (:name, :user, 0, NOW())
			");
			$addedQuery->execute([
				'name' => $name,
				'user' => $_SESSION['user_id']
			]);
		}
	}
	header('Location: index.php');
?>