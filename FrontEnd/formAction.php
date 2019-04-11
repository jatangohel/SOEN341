<!DOCTYPE html>
<!-- popcorn3.php - Processes the form described in
     popcorn3.html
     -->
<html lang = "en">
  <head>
    <title>
		<?php
			if($_SESSION['dispEng'])
  				echo "SOEN Course Stream";
  			else
  				echo "Sequence des cours SOEN";
  		?>
	</title>
    <meta charset = "utf-8" />
    <style type = "text/css">
      td, th, table {border: thin solid black;}
    </style>
  </head>
  <body>
    <?php
// Get form data values
      $takenCourses = array();
    
//      $PHYS204 = $_POST["PHYS204"];
//      $PHYS205 = $_POST["PHYS205"];
//      
//      $MATH203 = $_POST["MATH203"];
//      $MATH204 = $_POST["MATH204"];
//      $MATH205 = $_POST["MATH205"];
//      
//      $ELEC275 = $_POST["ELEC275"];
//      
//      $ENCS282 = $_POST["ENCS282"];
//      
//      $ENGR201 = $_POST["ENGR201"];
//      $ENGR202 = $_POST["ENGR202"];
//      $ENGR213 = $_POST["ENGR213"];
//      $ENGR233 = $_POST["ENGR233"];
//      $ENGR301 = $_POST["ENGR301"];
//      $ENGR371 = $_POST["ENGR371"];
//      
//      $COMP232 = $_POST["COMP232"];
//      $COMP248 = $_POST["COMP248"];
//      $COMP249 = $_POST["COMP249"];
//      $COMP335 = $_POST["COMP335"];
//      $COMP346 = $_POST["COMP346"];
//      $COMP348 = $_POST["COMP348"];
//      $COMP352 = $_POST["COMP352"];
//      
//      
//      $SOEN228 = $_POST["SOEN228"];
//      $SOEN287 = $_POST["SOEN287"];
//      $SOEN321 = $_POST["SOEN321"];
//      $SOEN331 = $_POST["SOEN331"];
//      $SOEN341 = $_POST["SOEN341"];
//      $SOEN342 = $_POST["SOEN342"];
//      $SOEN343 = $_POST["SOEN343"];
//      $SOEN344 = $_POST["SOEN344"];
//      $SOEN345 = $_POST["SOEN345"];
//      $SOEN357 = $_POST["SOEN357"];
//      $SOEN384 = $_POST["SOEN384"];
//      $SOEN385 = $_POST["SOEN385"];
//      $SOEN390 = $_POST["SOEN390"];
//      $SOEN490 = $_POST["SOEN490"];
      
      
      $intake = $_POST["intake"];

// If any of the quantities are blank, set them to zero
//      if ($unpop == "") $unpop = 0;
      
// Compute the item costs and total cost
//      $unpop_cost = 3.0 * $unpop;
//      $caramel_cost = 3.5 * $caramel;
//      $caramelnut_cost = 4.5 * $caramelnut;
//      $toffeynut_cost = 5.0 * $toffeynut;
//      $total_price = $unpop_cost + $caramel_cost + 
//                     $caramelnut_cost + $toffeynut_cost;
//      $total_items = $unpop + $caramel + $caramelnut + $toffeynut;

// Return the results to the browser in a table
    ?>
    <h4>
		<?php
			if($_SESSION['dispEng'])
  				echo "Passed courses";
  			else
  				echo "Cours passés;
  		?></h4>
    <?php

if(isset($_POST["PHYS204"])){
          array_push($takenCourses, "PHYS204");
      } 
if(isset($_POST["MATH205"])){
          array_push($takenCourses, "MATH205");
      }       
      
      
if(isset($_POST["MATH203"])){
          array_push($takenCourses, "MATH203");
      } 
if(isset($_POST["MATH204"])){
          array_push($takenCourses, "MATH204");
      } 
if(isset($_POST["MATH205"])){
          array_push($takenCourses, "MATH205");
      } 
if(isset($_POST["ELEC275"])){
          array_push($takenCourses, "ELEC275");
      } 
if(isset($_POST["ENCS282"])){
          array_push($takenCourses, "ENCS282");
      } 
if(isset($_POST["ENGR201"])){
          array_push($takenCourses, "ENGR201");
      } 
if(isset($_POST["ENGR202"])){
          array_push($takenCourses, "ENGR202");
      } 
if(isset($_POST["ENGR213"])){
          array_push($takenCourses, "ENGR213");
      } 
if(isset($_POST["ENGR233"])){
          array_push($takenCourses, "ENGR233");
      } 
if(isset($_POST["ENGR301"])){
          array_push($takenCourses, "ENGR301");
      } 
if(isset($_POST["ENGR371"])){
          array_push($takenCourses, "ENGR371");
      } 
if(isset($_POST["COMP232"])){
          array_push($takenCourses, "COMP232");
      } 
if(isset($_POST["COMP248"])){
          array_push($takenCourses, "COMP248");
      } 
if(isset($_POST["COMP249"])){
          array_push($takenCourses, "COMP249");
      } 
if(isset($_POST["COMP335"])){
          array_push($takenCourses, "COMP335");
      } 
if(isset($_POST["COMP346"])){
          array_push($takenCourses, "COMP346");
      } 
if(isset($_POST["COMP348"])){
          array_push($takenCourses, "COMP348");
      } 
if(isset($_POST["COMP352"])){
          array_push($takenCourses, "COMP352");
      } 
if(isset($_POST["SOEN228"])){
          array_push($takenCourses, "SOEN228");
      } 
if(isset($_POST["SOEN287"])){
          array_push($takenCourses, "SOEN287");
      } 
if(isset($_POST["SOEN321"])){
          array_push($takenCourses, "SOEN321");
      } 
if(isset($_POST["SOEN331"])){
          array_push($takenCourses, "SOEN331");
      } 
if(isset($_POST["SOEN341"])){
          array_push($takenCourses, "SOEN341");
      } 
if(isset($_POST["SOEN342"])){
          array_push($takenCourses, "SOEN342");
      } 
if(isset($_POST["SOEN343"])){
          array_push($takenCourses, "SOEN343");
      } 
if(isset($_POST["SOEN344"])){
          array_push($takenCourses, "SOEN344");
      } 
if(isset($_POST["SOEN345"])){
          array_push($takenCourses, "SOEN345");
      } 
if(isset($_POST["SOEN357"])){
          array_push($takenCourses, "SOEN357");
      } 
if(isset($_POST["SOEN384"])){
          array_push($takenCourses, "SOEN384");
      } 
if(isset($_POST["SOEN385"])){
          array_push($takenCourses, "SOEN385");
      } 
if(isset($_POST["SOEN390"])){
          array_push($takenCourses, "SOEN390");
      } 
if(isset($_POST["SOEN490"])){
          array_push($takenCourses, "SOEN490");
      } 


      var_dump($takenCourses);
      
    ?>
    <p /> <p />

   

<!--
    <?php
      print ("You passed $takenCourses <br />");
    ?>
-->
  </body>
</html>

