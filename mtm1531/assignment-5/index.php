<?php

require_once 'includes/db.php';

$sql = $db->query('
SELECT id, title, released, director
FROM movies
ORDER BY id ASC
');

$results = $sql->fetchAll();

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Movie browser</title>
</head>
<body>

<a href="add.php">Add a Movie</a>

<?php foreach ($results as $movie) : ?>
<h2>
<a href="single.php?id=<?php echo $movie['id']; ?>">
<?php echo $movie['title']; ?>
</a>
</h2>
<dl>
<dt>Released</dt>
<dd><?php echo $movie['released']; ?></dd>
<dt>Director</dt>
<dd><?php echo $movie['director']; ?></dd>
</dl>
<?php endforeach; ?>

</body>
</html>