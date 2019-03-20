<?php
	include('control.php');

	$bill = getBill();
?>
<html>
	<head lang="fr">
		<title>Bill</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
		foreach ($bill as $deal) {
			echo '<ul><li> pseudo : ' . $deal['pseudo'] . '<br>somme : ' . $deal['sumSolde'] . '</li></ul>';
		}
		?>
		<a href="course.php">Retour Courses</a>
	</body>
</html>