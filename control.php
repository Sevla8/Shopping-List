<?php
	session_start();

	include('db.php');

	if (isset($_POST['connection']) && isset($_POST['pseudo']) ) {
		$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
		$members = getMembers();
		foreach ($members as $member) {
			if ($_POST['pseudo'] == $member['name']) {
				$_SESSION['pseudo'] = $member['name'];
				$_SESSION['id'] = $member['id'];
				setcookie('pseudo', $_SESSION['pseudo']);
			}
		}
	}

	if (!isset($_SESSION['pseudo'])) {
		header('Location: login.php');
		exit();
	}

	if (isset($_POST['nomArticle']) && isset($_POST['quantite']) && isset($_POST['submit'])) {
		$_POST['nomArticle'] = htmlspecialchars($_POST['nomArticle']);
		$_POST['quantite'] = filter_var($_POST['quantite'], FILTER_VALIDATE_INT);
		addArticle($_POST['nomArticle'], $_POST['quantite'], $_SESSION['id']);
	}

	if (isset($_POST['achete']) && isset($_POST['id']) && isset($_POST['prix'])) {
		$_POST['prix'] = filter_var($_POST['prix'], FILTER_VALIDATE_INT);
		$_POST['id'] = filter_var($_POST['id'], FILTER_VALIDATE_INT);
		remove($_SESSION['id'], $_POST['prix'], $_POST['id']);
	}
?>