<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-Scehdule Generator</title>
</head>
<body>
  <div>
    <?php

    require 'Semester.php';

    $math203_L1 = new Session (0,"MATH203","A", null, "F", array("M","W"), 1000,1115, "SGW");

		$math204_L1 = new Session (1,"MATH204","B", null, "F", array("M","W"), 1100,1200, "SGW");

    $comp232_L1 = new Session (2,"COMP232", "DD", null, "F",  array("W"), 1745, 2015, "SGW");

    ///////////////
    $comp232_L2 = new Session (2,"COMP232", "PP", null, "F", array("T"), 1745, 2015, "SGW");

    $comp232_L3 = new Session (2,"COMP232", "Q", null, "F", array("T"), 1315, 1430, "SGW");

    $comp232_L4 = new Session (2,"COMP232", "R", null, "F", array("T","J"), 1315, 1430, "SGW");

    $comp232_L5 = new Session (2,"COMP232", "S", null, "F", array("T","J"), 1315, 1430, "SGW");

    $comp232_T1 = new Session (2,"COMP232", "DD", "DA", "F", array("W"), 2030, 2210, "SGW");

    /////////////////////
    $comp248_L1 = new Session (3,"COMP248", "EE", null, "F", array("J"), 1745, 2015, "SGW");

    ////////////////////////
    //$comp248_L2 = new Session (3,"COMP248", "P", null, "F", array("M","W"), 1315, 1430, "SGW");
    $comp248_L2 = new Session (3,"COMP248", "P", null, "F", array("T","W"), 1745, 2015, "SGW");

    $permittedCourses = array("COMP248","COMP232");

    $fallSemester = new Semester ("F", "2019",2);
    $fallSemester->semesterGenerator ($permittedCourses);

    echo "Chosen Lecture Sections <br>";
    foreach ($fallSemester->getLecs() as $lec)
        echo $lec->dispInfo();

    echo "<br>";

    echo "Chosen Tutorial Sections <br>";
    foreach ($fallSemester->getTuts() as $tut)
        echo $tut->dispInfo();

    echo "<br>";

    echo "Chosen lab Sections <br>";
    foreach ($fallSemester->getLabs() as $lab)
        echo $lab->dispInfo();

    ?>
  </div>
</body>
</html>
