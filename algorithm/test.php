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
/*
    $userSched = new UserSchedule("F",2019, 4 );

    $userSched->genProgramSched('Osama');

    $userSched->dispUserSchedule();
*/

$comp248 = new Course ("COMP248", null, null, 3, false, false);
$comp249 = new Course ("COMP249", array($comp248), null, 3, false, false);
$comp352 = new Course ("COMP352", array ($comp249), null, 3, false, false);
$engr201 = new Course ("ENGR201", null, null, 3, false, false);
$engr202 = new Course ("ENGR202", null, null, 3, false, false);
$engr213 = new Course ("ENGR213", null, null, 3, false, false);
$engr233 = new Course ("ENGR233", null, null, 3, false, false);

$untaken =  array ($comp248,$comp249,$comp352,$engr201,$engr202,$engr213,$engr233);

var_dump(getPermittedCourses($untaken, "F"));


    ?>
  </div>
</body>
</html>
