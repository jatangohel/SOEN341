<?php

if (session_status() != PHP_SESSION_ACTIVE)
{
	ob_start();
	session_start();
}

if(!isset($_SESSION['loggedin'])){
  if($_SESSION['dispEng'])
    echo "Login please.";
  else
    echo "Inscrivez-vous s'il vous plait.";
  header('Refresh: 2; URL = index.php');
}
else {
  //Page Info
  $page_name = "error 404 - Main page";
  $page_keywords = "Error404";
  $page_description = "Error404";
  $page_author = "Error404";

  //Construct Page
  include 'pagebuilder/navbar.php';
  include 'frontend/profilePage.php';
  include 'pagebuilder/header.php';
  include 'pagebuilder/footer.php';
}

?>
