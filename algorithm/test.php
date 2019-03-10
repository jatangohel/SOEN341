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

$userSched = new UserSchedule("F",1, 4 );

$userSched->genProgramSched('1');

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
