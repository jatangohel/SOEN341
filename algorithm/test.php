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

    $math203_L1 = new Lecture ("MATH203","A",1000,1115,array("Monday","Wednesday"),
		array("F","W","S"), null, null, false, false, 3);
    $math203_T1 = new Lecture ("MATH203","A",1000,1115,array("Monday","Wednesday"),
    array("F","W","S"), null, null, false, false, 3);

		$math204_L1 = new Lecture ("MATH204","B",1100,1200,array("Monday","Wednesday"),
		array("F","W","S"), null, null, false, false, 3);

    $comp232_L1 = new Lecture ("COMP232", "DD", 1745, 2015, array("Wednesday"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L2 = new Lecture ("COMP232", "PP", 1745, 2015, array("Thursday"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L3 = new Lecture ("COMP232", "Q", 1315, 1430, array("Thursday,Tuesday"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L4 = new Lecture ("COMP232", "R", 1315, 1430, array("Thursday,Tuesday"),
    "F", array($math203, $math204), null, true, false, 3);

    $comp232_L5 = new Lecture ("COMP232", "S", 1315, 1430, array("Thursday,Tuesday"),
    "F", array($math203, $math204), null, true, false, 3);

    ?>
  </div>
</body>
</html>
