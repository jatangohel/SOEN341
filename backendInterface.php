<?php

require_once __DIR__.'/algorithm/UserSchedule.php';
require_once "sessionfns.php";

function processNumCoursesConstraint()
{
	for ($i=0; $i < count($_POST['Years']); $i++)
	{
		$_SESSION['Years+Term'][$i] = $_POST['Years'][$i].$_POST['Term'][$i];
		$_SESSION['NumberofCourses'][$i] = (int) $_POST['NumberofCourses'][$i];
	}


}

if( empty($_POST['submit']) )                                   //A
{ session_id(md5(time() . rand() . $_SERVER['REMOTE_ADDR']));   //B
  session_start();  // before any output                        //C
  $_SESSION['Years+Term']= array();                                        //D
  $_SESSION['NumberofCourses']= array();

}
elseif ($_POST['submit'] == "Submit #Courses" )  // continuing           //F
{ session_start();  // before any output
  processNumCoursesConstraint();                                                //G
}
elseif ($_POST['submit'] == "End Session" )  // continuing           //F
{
	session_end();
}

$numCoursesArr = array();
$noClassesArr=array(array());

// Write the right condition later to indicate no constraints were passed
if ($_SESSION ['NumberofCourses'] != "")
{
	for ($i=0; $i < count($_SESSION ['NumberofCourses']); $i++) {
		$term = $_SESSION ['Years+Term'][$i];
		$numCoursesArr[$term] = $_SESSION['NumberofCourses'][$i];
	 }
	 var_dump($numCoursesArr);
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

$semInfo = array_slice($semInfo,1);
$_SESSION['semInfo'] = $semInfo;

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
