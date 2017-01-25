<?php
	# Vaihtoehdot done, undone ja delete -napeille
	require_once 'init.php';
	if(isset($_GET['as'], $_GET['item'])) {
		$as    = $_GET['as'];
		$item  = $_GET['item'];
	}
	switch($as) {
		case 'done':
			$doneQuery = $db->prepare("
				UPDATE todos 
				SET done = 1
				WHERE id = :item
				AND user = :user
			");
			$doneQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
		case 'undone':
			$undoneQuery = $db->prepare("
				UPDATE todos
				SET done = 0
				WHERE id = :item
				AND user = :user
			");
			$undoneQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
		case 'delete':
			$deleteQuery = $db->prepare("
				DELETE FROM todos
				WHERE id = :item
				AND user = :user
			");
			$deleteQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
	}
header('Location: index.php');
?>