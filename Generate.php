<style type="text/css">
  body {height: 100%;


  }

</style>

<body>
    <div id="wrapper">
<?php

if(!isset($_SESSION))
 session_start();

if(!isset($_SESSION['loggedin'])){
  if($_SESSION['dispEng'])
    echo "Login please.";
  else
    echo "Inscrivez-vous s'il vous plait.";
  header('Refresh: 2; URL = index.php');
}
else{

echo '<link href="css/bgstyling.css" rel="stylesheet"/>';
//Page Info
$page_name = "error 404 - Main page";
$page_keywords = "Error404";
$page_description = "Error404";
$page_author = "Error404";

//Construct Page
include 'PageBuilder/navbar.php';
include 'FrontEnd/Generate.php';
include 'PageBuilder/header.php';
include 'PageBuilder/footer.php';
//include 'FrontEnd/usersPage.php';
}
?>
