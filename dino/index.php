<?php 
require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, dino_name, loves_meat, in_jurasic_park
	FROM dinosaurs
	ORDER BY dino_name ASC
');

$results = $sql->fetchAll();

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>04-06</title>
	</head>

	<body>
	<?php foreach ($results as $dino) : ?>
	
		<h2>
			<a href="single.php?id=<?php echo $dino['id']; ?>"</a> <?php echo $dino['dino_name'] ?>
		</h2>
		<dl>
			<dt>Loves meat</dt>
			<dd><?php echo $dino['loves_meat'] ?></dd>
			<dt>In JP</dt>
			<dd><?php echo $dino['in_jurasic_park'] ?></dd>
		</dl>
	<?php endforeach ?>

	</body>
</html>