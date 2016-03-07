<?php
include('config.php');
	try {
		$dbh->exec("CREATE TABLE content(
			id INTEGER PRIMARY KEY,
			content text
			)"
		);

		$content = $_POST['content'];
		$stmt = $dbh->prepare("update content set content = :content where id = 1");
		$data = array(
			':content' => $content
		);
		$stmt->execute($data);

		$stmt = $dbh->prepare('select content from content where id = 1');
		$stmt->execute();
		$items = $stmt->fetchAll();

		$dbh = NULL;

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Radio</title>
<style>
body{font-size:1em; }
</style>
</head>
<body>
<div id="container">
<form method="post" action="">
	<textarea name="content" rows="" cols=""><?php echo $items[0]['content']?></textarea>
</form>
</div>
</body>
</html>