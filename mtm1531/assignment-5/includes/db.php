<?php

$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$data_source = getenv('DATA_SOURCE');

//PDO -> php data objects
$db = new PDO("mysql:host=localhost;dbname=sant0125", $username, $password);
//$db = new PDO($data_source, $user, $pass);
$db->exec('SET NAMES utf8');
