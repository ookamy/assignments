<?php

$display_thanks = false;
$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password1 = filter_input(INPUT_POST, 'password1', FILTER_UNSAFE_RAW);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_UNSAFE_RAW);
$preferredlang = filter_input(INPUT_POST, 'preferredlang', FILTER_SANITIZE_STRING);
$notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($name))
    $errors['name'] = true;

  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors['email'] = true;

  if (strlen($username) < 1 || strlen($username) > 25)
    $errors['username'] = true;

  if (empty($password1))
    $errors['password1'] = true;

  if ($password2 != $password1)
    $errors['nomatch'] = true;

  if (!in_array($preferredlang, array('en', 'fr', 'es')))
    $errors['preferredlang'] = true;

  if (!isset($_POST['acceptterms']))
    $errors['acceptterms'] = true;

  if (empty($errors)) {
    $display_thanks = true;
    mail($email, 'Thanks for registering', 'Thanks for registering', "From: Thomas J Bradley <bradlet@algonquincollege.com>\r\n");
  }
}

?>