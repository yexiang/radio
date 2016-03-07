<?php
include('config.php');
	try {
		$dbh = new PDO($dbh);
		$dbh->exec("CREATE TABLE content(
			id INTEGER PRIMARY KEY,
			content text
			)"
		);

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
body{font-size:2em; }
</style>
</head>
<body>
<div id="container">

<?php echo $items[0]['content']?>

</div>
</body>
</html>