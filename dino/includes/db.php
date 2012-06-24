<?php

// Opens conect to the MySQL DB
// Shared between all the php files in our application

// our username and pass are sotored in env variable so it keep secured and never public in GitHub

$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$data_source = getenv('DATA_SOURCE');
// pdo: PHP Data Source
// Allows us to connect to many diffr kinds of DB
$db = new PDO($data_source, $user, $pass);

// force connection to communicate in utf8
$db->exec('SET NAMES utf8');
