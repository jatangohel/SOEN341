<style type="text/css">
  body {height: 100%;}

</style>

<body>
    <div id="wrapper">
<?php
echo '<link href="css/bgstyling.css" rel="stylesheet"/>';
 // echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
//Page Info
$page_name = "error 404 - About us page";
$page_keywords = "Error404";
$page_description = "Error404";
$page_author = "Error404";

//Construct Page
//include 'pagebuilder/navbar.php';
include 'PageBuilder/navbar.php';
include 'FrontEnd/about.php';
include 'PageBuilder/header.php';
include 'PageBuilder/footer.php';
?>
