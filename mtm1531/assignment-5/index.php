<?php

require_once 'includes/db.php';
require_once 'includes/users.php';

$sql = $db->query('
SELECT id, title, released
FROM movies
ORDER BY id ASC
');

// Display the last error created by our database
var_dump($db->errorInfo());

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
<dt>Director</dt>
<dd><?php echo $movie['released']; ?></dd>
<dt>Released</dt>
<dd><?php echo $movie['in_jurassic_park']; ?></dd>
</dl>
<?php endforeach; ?>

</body>
</html>