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

$articles = filter_input(INPUT_POST, 'articles', FILTER_SANITIZE_STRING);
$pronouns = filter_input(INPUT_POST, 'pronouns', FILTER_SANITIZE_STRING);
$prepos = filter_input(INPUT_POST, 'prepos', FILTER_SANITIZE_STRING);

echo $articles;
echo $pronouns;
echo $prepos;

/*if (!isset($_POST['articles']))
 {
 
 $errors['articles'] = true;
 echo "articles excluded"; 
 }
*/

?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>List of the words</title>
	</head>

<body>

<h1>List of words used in the text</h1>
<p>Total words used in text: <?php //echo $wordsnumber;?></p>
<p>Excluded: 
	<?php if (isset($articles)){echo "Articles ";}; 
		  if (isset($pronouns)){echo "Pronouns ";};
		  if (isset($prepos)){echo "Prepositions";}; ?></p>
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