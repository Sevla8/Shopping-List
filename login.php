<?php
	session_start();

	if (isset($_POST['quitter']))
		session_destroy();

	include('db.php');

	$members = getMembers();
?>
<!doctype html>
<html>
	<head lang="fr">
		<title>Shopping</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<form method="post" action="course.php">
			Pseudo
			<select name="pseudo">
				<?php
				foreach ($members as $member) {
					if (isset($_COOKIE['pseudo']) && $_COOKIE['pseudo'] == $member['name']) 
						echo '<option selected value="'.$member['name'].'">'.$member['name'].'</option>';
					else
						echo '<option value="'.$member['name'].'">'.$member['name'].'</option>';
				}
				?>
			</select>
			<input type="submit" name="connection" value="connection">
		</form>
	</body>
</html>