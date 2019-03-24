<?php

require_once __DIR__.'/algorithm/UserSchedule.php';
require_once "sessionfns.php";



function processNumCoursesConstraint()
{
	for ($i=0; $i < count($_POST['numCoursesYearTerm']); $i++)
	{
		$_SESSION['numCoursesYearTerm'][$i] = $_POST['numCoursesYearTerm'][$i];
		$_SESSION['numCoursesConstrain'][$i] = (int) $_POST['numCoursesConstrain'][$i];
	}

}

function genNewSched ()
{
	$numCoursesArr = array();
	$noClassesArr=array(array());

	if (count($_SESSION ['numCoursesConstrain']) != 0)
	{

		for ($i=0; $i < count($_SESSION ['numCoursesConstrain']); $i++) {
			$term = $_SESSION ['numCoursesYearTerm'][$i];
			$numCoursesArr[$term] = $_SESSION['numCoursesConstrain'][$i];
		 }
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
	$semInfo2 = array_slice($semInfo2,1);
	$_SESSION['semInfo2'] = $semInfo2;

	$semInfo3 = array (array());
	foreach ($userSched->getListOfSemesters()[2]->getLecs() as $lec)
	{
	  $courseInfo = array();
	  $courseInfo['Course Name'] = $lec->getCourseName();
	  $courseInfo['Credits'] = 3;
	  array_push($semInfo3,$courseInfo);
	}
	$semInfo3 = array_slice($semInfo3,1);
	$_SESSION['semInfo3'] = $semInfo3;

}

if( empty($_POST['submitID']) )                                   //A
{
  session_start();  // before any output                        //C
	if (empty($_SESSION))
	{
		$_SESSION['numCoursesYearTerm']= array();                                        //D
	  $_SESSION['numCoursesConstrain']= array();
		genNewSched();
	}
}
elseif ($_POST['submitID'] == "Submit #Courses" )  // continuing           //F
{
	session_start();  // before any output
  processNumCoursesConstraint();
	genNewSched();
                                           //G
}

 ?>
