<?php
	session_start();
	// remove all session variables
	unset($_SESSION['name']);
	unset($_SESSION['id']);
	
	// destroy the session
	session_destroy();
	header('Location: ../../home');
?>