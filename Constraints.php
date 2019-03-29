<?php

ob_start();
session_start();
?>

<?php
echo '<link href="css/stylec.css" rel="stylesheet">';

	//Page Info
	$page_name = "error 404 - Main page";
	$page_keywords = "Error404";
	$page_description = "Error404";
	$page_author = "Error404";

	//Construct Page
	require_once 'FrontEnd/backendInterface.php';
	include 'PageBuilder/navbar.php';
	include 'FrontEnd/Constraints.php';
	include 'PageBuilder/header.php';
	include 'PageBuilder/footer.php';
	//include 'FrontEnd/usersPage.php';
?>
