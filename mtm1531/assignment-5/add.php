<?php

$errors = array();

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
$released = filter_input(INPUT_POST, 'released', FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (strlen($title) < 1 || strlen($title) > 256) {
$errors['title'] = true;
}

if (strlen($director) < 1 || strlen($director) > 256) {
$errors['director'] = true;
}

if ($released < 1872 || $released > 2012) {
$errors['released'] = true;
}


if (empty($errors)) {
require_once 'includes/db.php';

$sql = $db->prepare('
INSERT INTO movies (title, director, released)
VALUES (:title, :director, :released)
');
$sql->bindValue(':title', $title, PDO::PARAM_STR);
$sql->bindValue(':director', $director, PDO::PARAM_INT);
$sql->bindValue(':released', $released, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php');
exit;
}
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Add New Movie</title>
</head>
<body>
<h1>Add New Movie</h1>
<form method="post" action="add.php">
<div>
<label for="title">
Movie Title
<?php if (isset($errors['title'])) : ?>
<strong class="error">is required</strong>
<?php endif; ?>
</label>
<input id="title" name="title" required value="<?php echo $title; ?>">
</div>
<fieldset>
<legend>
Director
<?php if (isset($errors['director'])) : ?>
<strong class="error">is required</strong>
<?php endif; ?>
</legend>
<input id="director" name="director" required value="<?php echo $director; ?>">
</fieldset>
<div>
<label for="title">
Release date
<?php if (isset($errors['released'])) : ?>
<strong class="error">is required</strong>
<?php endif; ?>
</label>
<input id="released" name="released" required value="<?php echo $released; ?>">
</div>
<button type="submit">Add</button>
</form>
</body>
</html>



