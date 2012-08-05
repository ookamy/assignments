<?php
$tab = '';

if(isset($_GET['tab'])) {
	$tab = strtolower($_GET['tab']);
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Progrssive Enhancements Tabs JS+PHP</title>
    <link href = "css/general.css" rel="stylesheet">
</head>

<body>
	<nav>
    	<ul>
        	<li<?php if ($tab != 'blue' && $tab != 'red' && $tab != 'green') { ?> class="ctab" <?php } ?>><a id="yellow" href="?tab=yellow">Yellow</a></li>
            <li<?php if ($tab == 'red') { ?> class= "ctab" <?php } ?>><a id="red" href="?tab=red">Red</a></li>
            <li<?php if ($tab == 'green') { ?> class="ctab" <?php } ?>><a id="green" href="?tab=green">Green</a></li>
            <li<?php if ($tab == 'blue') { ?> class="ctab" <?php } ?>><a id="blue" href="?tab=blue">Blue</a></li>
        </ul>
	</nav>
    <article id="tabs">
    <?php
		switch($tab) {
			case 'red' :
				include 'includes/red.php';
			break;
			case 'blue' :
				include 'includes/blue.php';
			break;
			case 'green' :
				include 'includes/green.php';
			break;
			default:
				include 'includes/yellow.php';
			break;
		}
	?>
    </article>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="js/general.js"></script>
</body>
</html>
