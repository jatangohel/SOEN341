<?php

require_once __DIR__.'/algorithm/UserSchedule.php';


$numCoursesArr = array();
$noClassesArr=array(array());

if (array_key_exists('numCoursesTerm', $_POST))
{
	for ($i=0; $i < count($_POST['numCoursesTerm']); $i++) {
		$term = $_POST['numCoursesTerm'][$i];
		$numCoursesArr[$term] = (int) $_POST['numCoursesConstrain'][$i];
	 } 
	 //var_dump($numCoursesArr);
}


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
//var_dump($semInfo);

$semInfo2 = array (array());
foreach ($userSched->getListOfSemesters()[1]->getLecs() as $lec)
{
  $courseInfo = array();
  $courseInfo['Course Name'] = $lec->getCourseName();
  $courseInfo['Credits'] = 3;
  array_push($semInfo2,$courseInfo);
}
$semInfo3 = array (array());
foreach ($userSched->getListOfSemesters()[2]->getLecs() as $lec)
{
  $courseInfo = array();
  $courseInfo['Course Name'] = $lec->getCourseName();
  $courseInfo['Credits'] = 3;
  array_push($semInfo3,$courseInfo);
}
 ?>
