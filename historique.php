<?php
	session_start();
?>
<?php
	$link = mysqli_connect('dwarves.iut-fbleau.fr', 'dasilvaa', 'dasilvaa', 'dasilvaa');
	if (!$link)
		die('<p>connection impossible</p>');
?>
<!doctype html>
<html>
	<head lang="fr">
		<title>Course</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
			$query = 'SELECT identifiant, pseudo, solde, dateAchat FROM dette';
			$requete = mysqli_query($link, $query);
			if ($requete) {
				while ($dette = mysqli_fetch_assoc($requete)) {
					echo '<ul><li> identifiant : ' . $dette['identifiant'] . '<br>pseudo : ' . $dette['pseudo'] . '<br>solde : ' . $dette['solde'] . '<br>dateAchat : ' . $dette['dateAchat'] . '</li></ul>';
				}
			}
		?>
		<a href="course.php">Retour Courses</a>
	</body>
</html>