<?php
	global $db;

	try {
		$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $exception) {
		die('Erreur : '.$exception->getMessage());
	}

	function getMembers() {
		global $db;
		$query = $db->query('SELECT * FROM member');
		$fetch = $query->fetchAll();
		return $fetch;
	}

	function getShoppingList() {
		global $db;
		$query = $db->query('SELECT s.id, s.name, s.amount, m.name AS id_member FROM shopping_list s INNER JOIN member m ON s.id_member = m.id');
		$fetch = $query->fetchAll();
		return $fetch;
	}

	function addArticle($article, $amount, $member) {
		global $db;
		$query = $db->prepare('INSERT INTO shopping_list (name, amount, id_member) VALUES (?, ?, ?)');
		$query->execute(array($article, $amount, $member));
	}

	function remove($id_member, $price, $id_article) {
		global $db;
		$query = $db->prepare('INSERT INTO bill (id_member, price) VALUES (?, ?)');
		$query->execute(array($id_member, $price));
		
		$query = $db->prepare('DELETE FROM shopping_list WHERE id = ?');
		$query->execute(array($id_article));
	}

	function getHistoric() {
		global $db;
		$query = $db->query('SELECT b.id, m.name AS pseudo, b.price, b.dateAchat FROM bill b INNER JOIN member m ON b.id_member = m.id');
		$fetch = $query->fetchAll();
		return $fetch;
	}

	function getBill() {
		global $db;
		$query = $db->query('SELECT m.name AS pseudo, sum(price) AS sumSolde FROM bill b INNER JOIN member m ON b.id_member = m.id GROUP BY pseudo');
		$fetch = $query->fetchAll();
		return $fetch;
	}
?>