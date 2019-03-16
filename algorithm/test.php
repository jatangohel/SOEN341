<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-Scehdule Generator</title>
</head>
<body>
  <div>
    <?php

require_once 'UserSchedule.php';

ini_set('max_execution_time', 300);

$numCoursesArr = array();

$numCoursesArr['2S'] = 1;

$numCoursesArr['3S'] = 0;



// $numCoursesArr['1F'] = 4;
// $numCoursesArr['2F'] = 6;
// $numCoursesArr['3W'] = 6;
// $numCoursesArr['5W'] = 6;


$noClassesArr=array(array());
$no1 = new Session ("NoClass", null, null,null, array("W"), "08:45:00", "10:00:00", null);
$no2 = new Session ("NoClass", null, null,null, array("J"), "08:45:00", "20:15:00", null);
$no3 = new Session ("NoClass", null, null,null, array("T"), "08:45:00", "20:15:00", null);
$no4 = new Session ("NoClass", null, null,null, array("F"), "08:45:00", "20:15:00", null);
$no5 = new Session ("NoClass", null, null,null, array("M"), "08:45:00", "20:15:00", null);
$noSem1 = array();
array_push($noSem1, $no1);
array_push($noSem1, $no2);
array_push($noSem1, $no3);
array_push($noSem1, $no4);
array_push($noSem1, $no5);
//$noClassesArr['2F']=$noSem1;
//$noClassesArr['2W']=$noSem1;
$userSched = new UserSchedule("F", $numCoursesArr, $noClassesArr);

$userSched->genProgramSched('sebhani98@gmail.com');

$userSched->dispUserSchedule();

$A =new Course ("A", null, null, 3, true, false);
$B =new Course ("B", null, null, 3, true, false);
$C =new Course ("C", null, null, 3, true, false);
$D =new Course ("D", null, array($A, $B), 3, true, false);

$temp = array ($A, $C, $D);

var_dump(coReqsSatisfied($temp));

/*
$comp248 = new Course ("COMP248", null, null, 3, false, false);            // permitted
$comp249 = new Course ("COMP249", array($comp248), null, 3, false, false); // fail -> preReq
$comp352 = new Course ("COMP352", array ($comp249), null, 3, false, false);// fail -> preReq
$engr201 = new Course ("ENGR201", null, null, 3, false, false);
$engr202 = new Course ("ENGR202", null, null, 3, false, false);
$engr213 = new Course ("ENGR213", null, null, 3, false, false);
$engr233 = new Course ("ENGR233", null, null, 3, false, false);
$soen331 = new Course ("SOEN331", null, null, 3, false, false);         // fail -> not given in fall

$untaken =  array ($comp248,$comp249,$comp352,$engr201,$engr202,$engr213,$engr233, $soen331);

updateAllPriority($untaken);

var_dump($untaken);
*/

    ?>
  </div>
</body>
</html>
