<?php
echo '<link href="css/style.css" rel="stylesheet">';

if (session_status() == PHP_SESSION_ACTIVE)
	session_destroy();

session_start();


//Page Info
$page_name = "error 404 - Main page";
$page_keywords = "Error404";
$page_description = "Error404";
$page_author = "Error404";

//Construct Page
include 'PageBuilder/navbar.php';
include 'FrontEnd/index.php';
include 'PageBuilder/header.php';
include 'PageBuilder/footer.php';
//include 'FrontEnd/usersPage.php';
?>
