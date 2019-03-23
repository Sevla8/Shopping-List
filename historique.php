<?php
	include('control.php');

	$historic = getHistoric();
?>
<html>
	<head lang="fr">
		<title>Historic</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
		foreach ($historic as $bill) {
			echo '<ul><li> Acheteur : ' . $bill['pseudo'] . '<br>article : ' . $bill['article'] . '<br>price : ' . $bill['price'] . '<br>date : ' . $bill['dateAchat'] . '</li></ul>';
		}
		?>
		<a href="course.php">Retour Courses</a>
	</body>
</html>