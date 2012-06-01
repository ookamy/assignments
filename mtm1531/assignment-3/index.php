<?php
include 'includes/validator.php';
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>MTM1531 Assignment-3, Form Validation</title>
		<link href="css/general.css" rel="stylesheet">
	</head>

	<body>
		<?php if ($display_thanks == true) : ?>
		<strong>Thanks for registering.</strong>
		<?php else : ?>
			<form method="post" action="index.php">
				<div>
					<div>
						<label for="name">Name <?php 
						if (isset($errors['name'])) : ?> 
						<strong class="error">is required</strong> 
						<?php endif; ?>
						</label>
						<input id="name" name="name" value="<?php echo $name; ?>">
					</div>
					
					<div>
						<label for="email">E-mail
						<?php 
						if (isset($errors['email'])) : ?> 
						<strong class="error">is required</strong> 
						<?php endif; ?>
						</label>
						<input type="email" id="email" name="email" value="<?php echo $email; ?>">
					</div>
					
					<div>
						<label for="username">Username <?php 
						if (isset($errors['username'])) : ?> 
						<strong class="error">is required</strong> 
						<?php endif; ?>
						</label>
						<input id="username" name="username" value="<?php echo $username; ?>">
					</div>
					
					<div>
						<label for="password1">Password <?php 
						if (isset($errors['password1'])) : ?> 
						<strong class="error">is required</strong> 
						<?php endif; ?>
						</label>
						<input id="password1" name="password1" value="<?php echo $password1; ?>">
					</div>
					
					<div>
						<label for="password2">Re-enter password <?php 
						if (isset($errors['nomatch'])) : ?> 
						<strong class="error">Passwords dont match!</strong> 
						<?php endif; ?>
						</label>
						<input id="password2" name="password2" value="<?php echo $password2; ?>">
					</div>
				</div>

				
				<div>
				  <fieldset class="lang">
					<legend>Preferred language</legend>
					<?php if (isset($errors['preferredlang'])) : ?><strong class="error">Select language</strong></br><?php endif; ?>
					<input type="radio" id="lang-en" name="preferredlang" value="en"<?php if ($preferredlang == 'en') { echo ' checked'; } ?>>
					<label for="lang-en">English</label>
					<input type="radio" id="lang-fr" name="preferredlang" value="fr"<?php if ($preferredlang == 'fr') { echo ' checked'; } ?>>
					<label for="lang-fr">Français</label>
					<input type="radio" id="lang-es" name="preferredlang" value="es"<?php if ($preferredlang == 'es') { echo ' checked'; } ?>>
					<label for="lang-es">Espagnol</label>
				  </fieldset>
				</div>
				
				<div>
					<label for="notes">Notes
					<?php
					if (isset($errors['notes'])) : ?> 
					<strong class="error">5-100 letters</strong> 
					<?php endif; ?>
					</label>
					<textarea id="notes" name="notes"><?php echo $notes; ?></textarea>
				</div>
	
				<div>
					<input type="checkbox" id="acceptterms" name="acceptterms" value="1">
					<label for="acceptterms">I agree for everything <?php 
					if (isset($errors['acceptterms'])) : ?> 
					<strong class="error">You must agree for everything!</strong> 
					<?php endif; ?>
					</label>
				</div>

				<button type="submit">Send</button>
			</form>
		<?php endif; ?>
	</body>
</html>