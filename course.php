<?php
	session_start();
	if (isset($_POST['connection']) &&
		isset($_POST['pseudo']) &&
		($_POST['pseudo'] == 'Sevla' ||
		$_POST['pseudo'] == 'Raizen' ||
		$_POST['pseudo'] == 'Harpogrine' ||
		$_POST['pseudo'] == 'Lolo')) {
			$_SESSION['pseudo'] = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
	}
?>
<?php
	$link = mysqli_connect('dwarves.iut-fbleau.fr', 'dasilvaa', 'dasilvaa', 'dasilvaa');
	if (!$link)
		die('<p>connection impossible</p>');
?>
<?php
	if (isset($_POST['achete']) && isset($_POST['id']) && isset($_SESSION['pseudo']) && isset($_POST['prix'])) {
		$query = 'INSERT INTO dette (pseudo, solde) VALUES ("' . $_SESSION['pseudo'] . '", ' . $_POST['prix'] . ')';
		mysqli_query($link, $query);
		$query = 'DELETE FROM listeDeCourse WHERE identifiant = ' . $_POST['id'];
		mysqli_query($link, $query);
	}
?>
<?php
	if (isset($_POST['nomArticle']) && isset($_SESSION['pseudo'])) {
		$query = 'INSERT INTO listeDeCourse (nomArticle, quantite, pseudo) VALUES ("' . $_POST['nomArticle'] . '", ' . $_POST['quantite'] . ', "' . $_SESSION['pseudo'] . '")';
		mysqli_query($link, $query);
	}
?>
<!doctype html>
<html>
	<head lang="fr">
		<title>Course</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
			if (isset($_SESSION['pseudo'])) {
				$requete = mysqli_query($link, "SELECT * FROM listeDeCourse");
				if ($requete) {
					while ($listeDeCourse = mysqli_fetch_assoc($requete)) {
						echo '<ul><li> identifiant : ' . $listeDeCourse['identifiant'] . '<br>nomArticle : ' . $listeDeCourse['nomArticle'] . '<br>quantite : ' . $listeDeCourse['quantite'] . '<br>émetteur : ' . $listeDeCourse['pseudo'] . '</li></ul>';
						echo 	'<form method="post" action="course.php">
									Prix 
									<input type="number" name="prix" step="0.01">
									<input type="hidden" name="id" value="' . $listeDeCourse['identifiant'] . '">
									<input type="submit" name="achete" value="acheté">
								</form>';
					}
				}
				else 
					die("<p>Erreur dans l'execution de la requete.</p>");
				echo '
					<form method="post" action="course.php">
						<label for="nomArticle">nomArticle</label>
						<input type="name" name="nomArticle" id="nomArticle">
						<label for="quantite">quantité</label>
						<input type="number" name="quantite" id="quantite">
						<input type="submit" name="submit" value="ajouter à la liste">
					</form>
						<form method="post" action="login.php">
							<input type="submit" name="quitter" value="quitter" title="quitter">
					</form>
					<a href="creance.php">Creances</a>
					<a href="historique.php">Historique</a>';
				}
			else 
				echo "Accès restreint";
		?>
	</body>
</html>