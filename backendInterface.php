<?php

require_once __DIR__.'/algorithm/UserSchedule.php';


$numCoursesArr = array();
$noClassesArr=array(array());


$userSched = new UserSchedule("F", $numCoursesArr, $noClassesArr);

$userSched->genProgramSched('sebhani98@gmail.com');

$semInfo = array (array());

foreach ($userSched->getListOfSemesters()[0]->getLecs() as $lec)
{
  $courseInfo = array();
  $courseInfo['Course Name'] = $lec->getCourseName();
  $courseInfo['Credits'] = 3;
  array_push($semInfo,$courseInfo);
}

 ?>