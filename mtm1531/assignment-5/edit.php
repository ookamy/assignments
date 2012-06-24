<?php

require_once 'includes/users.php';

$_SESSION['referrer'] = $_SERVER['REQUEST_URI'];

if (!user_is_signed_in()) {
header('Location: sign-in.php');
exit;
}

require_once 'includes/db.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);
$released = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

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
$sql = $db->prepare('
UPDATE movies
SET title = :title
, director = :director
, released = :released
WHERE id = :id
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->bindValue(':title', $title, PDO::PARAM_STR);
$sql->bindValue(':director', $director, PDO::PARAM_INT);
$sql->bindValue(':released', $released, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php');
exit;
}
} else {
$sql = $db->prepare('
SELECT title, director, released
FROM movies
WHERE id = :id
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();

$title = $results['title'];
$director = $results['director'];
$released = $results['released'];
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Edit movie</title>
</head>
<body>

<?php if (user_is_signed_in()) : ?>
<a href="sign-out.php">Sign Out</a>
<?php endif; ?>

<h1>Edit Movie</h1>

<form method="post" action="edit.php?id=<?php echo $id; ?>">

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

<button type="submit">Save</button>

</form>

</body>
</html>






