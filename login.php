<?php
	session_start();
	if (isset($_POST['quitter']))
		session_destroy();
?>
<!doctype html>
<html>
	<head lang="fr">
		<title>Course</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<form method="post" action="course.php">
			Pseudo
			<select name="pseudo">
				<option>Sevla</option>
				<option>Raizen</option>
				<option>Lolo</option>
				<option>Harpogrine</option>
			</select>
			<input type="submit" name="connection" value="connection">
		</form>
	</body>
</html>