<?php
	include('control.php');

	$list = getShoppingList();
?>
<html>
	<head lang="fr">
		<title>Course</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
		foreach ($list as $article) {
			echo '<ul><li> Article : ' . $article['name'] . '<br>quantite : ' . $article['amount'] . '<br>émetteur : ' . $article['id_member'] . '</li></ul>';
			echo 	'<form method="post" action="course.php">
						Prix 
						<input type="number" name="prix" step="0.01">
						<input type="hidden" name="id" value="' . $article['id'] . '">
						<input type="submit" name="achete" value="acheté">
					</form>';
		}
		?>
		<form method="post" action="course.php">
			<label for="nomArticle">Article</label>
			<input type="name" name="nomArticle" id="nomArticle">
			<label for="quantite">quantité</label>
			<input type="number" name="quantite" id="quantite">
			<input type="submit" name="submit" value="ajouter à la liste">
		</form>
			<form method="post" action="login.php">
				<input type="submit" name="quitter" value="quitter" title="quitter">
		</form>
		<a href="creance.php">Creances</a>
		<a href="historique.php">Historique</a>
	</body>
</html>