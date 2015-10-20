<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['type']);
	unset($_SESSION['id']);
	header('Location: login.php');
?>