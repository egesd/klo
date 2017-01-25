<?php

require_once "init.php";

$todosQuery = $db->prepare("
		SELECT id, name, done
		FROM todos
		WHERE user = :user
	");

$todosQuery->execute([
	'user' => $_SESSION['user_id']
]);
	
$items = $todosQuery->rowCount() ? $todosQuery : [];


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Index</title>
		
		
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="main.css">

		<meta name="viewport" content="width=decive-width, initial-scale=1.0">

	</head>
	<body>
		<div class="list">
			<a class="menubutton" href="info.php"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
			<h1 class="header">To do.</h1>
		
			<?php if(!empty($items)): ?>
			<ul class="items">
				<?php foreach($items as $item): ?>
				<li>
					<span class="item<?php echo $item['done'] ? ' done' : ''?>"> 
						<?php echo $item['name']; ?>
					</span>
					<a class="delete-button" href="mark.php?as=delete&item=<?php echo $item['id']; ?>">Delete</a>
					<?php if(!$item['done']): ?> 
						<a class="done-button" href="mark.php?as=done&item=<?php echo $item['id']; ?>">Mark as done</a>
					<?php else: ?>
						<a class="undone-button" href="mark.php?as=undone&item=<?php echo $item['id']; ?>">Mark as undone</a>						
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php else: ?>
				<p>You haven't added any items yet.</p>
			<?php endif; ?>

			
			<form class="item-add" action="addtodo.php" method="POST">
				<input type="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off" required>
				<input type="submit" value="Add" class="submit">
			</form>





		</div>
	</body>
</html>