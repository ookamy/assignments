<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// ->prepare() allows us to have variables in our SQL
// We can create placeholders and later fill them with some content
// By using prepare we are protecting against SQL injection attacks
// Placeholders are marked with a colon (:) in front of them
$sql = $db->prepare('
SELECT id, title, director, released
FROM 
WHERE id = :id
');

// bindValue(placeholder, variable, datatype)
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Movie: <?php echo $results['title']; ?></title>
</head>
<body>

<h1><?php echo $results['title']; ?></h1>
<dl>
<dt>Director</dt>
<dd><?php echo $results['director']; ?></dd>
<dt>Released</dt>
<dd><?php echo $results['released']; ?></dd>
</dl>

<a href="delete.php?id=<?php echo $id; ?>">Delete</a>
<a href="edit.php?id=<?php echo $id; ?>">Edit</a>

</body>
</html>