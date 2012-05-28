<?php
$n1 = 0;
$n2 = 0;
$oper = '+';
$answer = 0;

if (isset($_POST['n1']))
	{
	$n1 = $_POST['n1'];
	}

if (isset($_POST['n2']))
	{
	$n2 = $_POST['n2'];
	}

if (isset($_POST['oper']))
	{
	$oper = $_POST['oper'];
	}

if ($oper == '-') {
	$answer = $n1 - $n2;}
if ($oper == '+') {
	$answer = $n1 + $n2;}
if ($oper == '*') {
	$answer = $n1 * $n2;}
if ($oper == '/') {
	$answer = $n1 / $n2;}

$fm = 'Result: %i';
$result = $answer*1.13;
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Machine for automated calculations</title>
        <link href="css/general.css" rel="stylesheet">
	</head>
	
	<body>
	<h1>High-speed digital electronic machine for automated money calculations</h1>
	<p><strong>Enter values in the fields below and select operation</strong></p>
	<form method="post" action="index.php">
		<label for="n1">Number 1</label>
		<input type="number" id="n1" name="n1" value="">
		<label for="n2">Number 2</label>
		<input type="number" id="n2" name="n2" value="">
		<label for="oper">Operation</label>
		<select id="oper" name="oper">
			<option value="+">+, addition</option>
			<option value="-">-, subtraction</option>
			<option value="*">*, multiplication</option>
			<option value="/">/, division</option>
		</select>
		<button>Start calculation process</button>
		<!--<p><?php if($n1 == '' || $n2 == '') { echo 'Enter values!'; } ?></p> -->
<<<<<<< HEAD
		<h2><?php setlocale(LC_MONETARY, 'en_CA'); echo money_format($fm, $result) . "\n"; ?></h2>
=======
		<h2><?php setlocale(LC_MONETARY, 'en_CAD'); echo money_format($fm, $result) . "\n"; ?></h2>
>>>>>>> origin/master
	</form>
	</body>
</html>