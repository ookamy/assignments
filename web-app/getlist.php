<?php
require_once 'includes/db.php';

$sql = $db->query('
SELECT id, word, frq
FROM wordslist
ORDER BY frq DESC
');

// Display the last error created by our database
//var_dump($db->errorInfo());

$results = $sql->fetchAll();
$num = 1;

?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>List of the words</title>
	</head>

<body>

<h1>List of words used in the text</h1>
	<table border="1">
		<tr>
			<td>#</td>
			<td>Word</td>
			<td>Used</td>
		</tr>
<?php foreach ($results as $list) : ?>
		<tr>
			<td><?php echo $num ?></td>
			<td><?php echo $list['word']; ?></td>
			<td><?php echo $list['frq']; $num++; ?></td>
		</tr>
<?php endforeach; ?>
	</table>
</body>
</html>