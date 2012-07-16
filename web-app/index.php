<?php
require_once 'includes/db.php';

$text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
$uwords = filter_input(INPUT_POST, 'preferredlang', FILTER_SANITIZE_STRING);
$words = array();
$text_lowered = strtolower($text);
$words = str_word_count($text_lowered, 1);
$wordsnumber = count($words);
$wordslist=array_count_values($words);

//print_r(array_keys($wordslist));

reset($wordslist);

$sql = $db->prepare('
ALTER TABLE wordslist DROP id
');
$sql->execute();

$sql = $db->prepare('
ALTER TABLE wordslist ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST
');
$sql->execute();

$sql = $db->prepare('
DELETE FROM wordslist
WHERE id >= 0
');
$sql->execute();

foreach  (array_keys($wordslist) as $value)
{	
	//echo $value;
	//echo current($wordslist);
	$c_frq = current($wordslist);
	//echo "<br/>";
	next($wordslist);
	
$sql = $db->prepare('
INSERT INTO wordslist (word, frq)
VALUES (:word, :frq)
');
$sql->bindValue(':word', $value, PDO::PARAM_STR);
$sql->bindValue(':frq', $c_frq, PDO::PARAM_INT);
$sql->execute();
//usleep(500000);
//header('Location: C:\wamp\www\webap\index.php');
//exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Ready to read</title>
<link href="css/general.css" rel="stylesheet">
</head>

<h1>Enter text</h1>
<form method="post" action="index.php">
<label for="text">Input text here </label>
<textarea id="text" name="text"></textarea>
<button type="submit">Submit</button>
</form>

<h2>Words entered: <?php echo $wordsnumber;?></h2>
	<form method="post" action="getlist.php">
		<div>
		  <fieldset class="exclusion1">
			<legend>Exclude most used words from the list</legend>
			<input type="radio" id="100words" name="uwords" value="100w"<?php if ($uwords == '100w') { echo ' checked'; } ?>>
			<label for="100words">100 words</label>
			<input type="radio" id="500words" name="uwords" value="500w"<?php if ($uwords == '500w') { echo ' checked'; } ?>>
			<label for="500words">500 words</label>
			<input type="radio" id="1000words" name="uwords" value="1000w"<?php if ($uwords == '1000w') { echo ' checked'; } ?>>
			<label for="1000words">1000 words</label>
		  </fieldset>
		</div>
				
		<div>
			<p>Exclude also</p>
			<input type="checkbox" id="articles" name="articles" value="1">
			<label for="articles">Articles</label>
			<input type="checkbox" id="pronouns" name="pronouns" value="1">
			<label for="articles">Pronouns</label>
		</div>
			<button type="submit">Get list</button>
	</form>
</body>
</html>