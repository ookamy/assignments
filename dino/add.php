<?php

$dino_name = filter_input(INPUT_POST, 'dino_name', FILTER_SANITAZE_STRING);
$loevs_meat = filter_input (INPUT_POST, 'loves_meat', FILTER_SANITAZE_NUMBER_INT);
$in_jurassic_park = (isset($_POST['in_jurasic_park'])) ? 1 : 0 ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($dino_name) < 1 || strlen('dino_name') > 256) {
		$errors['dino_name'] = true;
	}
	if (!in_array($loevs_meat)) {
		$errors['loves_meat'] = true;
	}
	if (empty($errors)){
		require_once 'includes/db.php';
		$sql= $db ->prepare ('
		INSERT INTO dinosaurs (dino_name, loves_meat, in_jurasic_park)
		VALUES (:dino_name, :loves_meat, :in_jurasic_park)
		');
	$sql -> bindValue(':dino_name',$dino_name, PDO::PARAM_STR);
	$sql -> bindValue(':loves_meat',$loves_meat, PDO::PARAM_INT);
	$sql -> bindValue(':in_jurasic_park',$in_jurasic_park, PDO::PARAM_INT);
	
	
	
	
	};
	






?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Add dinosaurs</title>
</head>


<body>
	<h1>Add new Dino</h1>
		<form method="post" action="add.php">
		
		<div>
			<label for="dino_name"> Dino name <?php 
						if (isset($errors['dino_name'])) : ?> 
						<strong>is required 1-256 chars</strong> 
						<?php endif; ?></label>
			<input id="dino_name" name="dino_name" required>
		</div>
		
		<fieldset>
			<legend> Eat meat  <?php 
						if (isset($errors['loves_meat'])) : ?> 
						<strong>must be checked !</strong> 
						<?php endif; ?></legend>
			<input type="radio" id="love" name="loves_meat" value="1">
			<label for="love"> loves meat</label>
			<input type="radio" id="hate" name="loves_meat" value="0">
			<label for="hate">Hates meat</label>
		</fieldset>

			

</body>
</html>