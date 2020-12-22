<?php 
	session_start();

	if (!$_SESSION['login']) {
		header('Location: login.php');
    }
    require('./config.php');
    $pageTitle = 'Админ панель магазина';
    $sql = $_POST['sqlquery'];
    $stmt = $db->prepare($sql);
    $stmt->execute();
    echo($sql);
    header('Location: admin.php');
?>