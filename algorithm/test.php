<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-TreeDepth.php</title>
</head>
<body>
  <div>
    <?php

    require 'soen341.php';

    $math203_L1 = new Lecture (0,"MATH203","A",1000,1115,array("M","W"),
		array("F","W","S"), null, null, false, false, 3);
    $math203_T1 = new Lecture (0,"MATH203","A",1000,1115,array("M","W"),
    array("F","W","S"), null, null, false, false, 3);

		$math204_L1 = new Lecture (1,"MATH204","B",1100,1200,array("M","W"),
		array("F","W","S"), null, null, false, false, 3);

    $comp232_L1 = new Lecture (2,"COMP232", "DD", 1745, 2015, array("W"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L2 = new Lecture (2,"COMP232", "PP", 1745, 2015, array("T"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L3 = new Lecture (2,"COMP232", "Q", 1315, 1430, array("T","J"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L4 = new Lecture (2,"COMP232", "R", 1315, 1430, array("T","J"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L5 = new Lecture (2,"COMP232", "S", 1315, 1430, array("T","J"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp248_L1 = new Lecture (3,"COMP248", "EE", 1745, 2015, array("J"),
    "F", null, array($math204_L1), true, false, 3);

    $comp248_L2 = new Lecture (3,"COMP248", "P", 1315, 1430, array("M","W"),
    "F", null, array($math204_L1), true, false, 3);

    ?>
  </div>
</body>
</html>
