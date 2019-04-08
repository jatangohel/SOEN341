<?php
echo '<link href="css/fbBtmStyling.css" rel="stylesheet">';
echo '<link href="css/style.css" rel="stylesheet">';


//Page Info
$page_name = "error 404 - Main page";
$page_keywords = "Error404";
$page_description = "Error404";
$page_author = "Error404";

//Construct Page
include 'FrontEnd/sessionfns.php';
if (session_status() != PHP_SESSION_NONE)
{
  //session_destroy();
  session_end();
  unset($_SESSION);
  $_SESSION = array();
  ob_start();
  session_start();
  $_SESSION['dispEng']='1';
}
else
{
  ob_start();
  session_start();
  $_SESSION['dispEng']='1';
}

include 'PageBuilder/navbar.php';
include 'FrontEnd/index.php';
include 'PageBuilder/header.php';
include 'PageBuilder/footer.php';
//include 'FrontEnd/usersPage.php';
?>
