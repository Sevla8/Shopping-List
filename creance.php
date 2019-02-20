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
			$query = 'SELECT pseudo, sum(solde) as sumSolde FROM dette GROUP BY pseudo';
			$requete = mysqli_query($link, $query);
			if ($requete) {
				while ($dette = mysqli_fetch_assoc($requete)) {
					echo '<ul><li> pseudo : ' . $dette['pseudo'] . '<br>somme : ' . $dette['sumSolde'] . '</li></ul>';
				}
			}
		?>
		<a href="course.php">Retour Courses</a>
	</body>
</html>