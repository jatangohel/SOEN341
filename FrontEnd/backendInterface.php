<?php
require_once __DIR__.'/../algorithm/UserSchedule.php';
require_once "sessionfns.php";
if (session_status() != PHP_SESSION_ACTIVE)
	session_start();

function processNumCoursesConstraint()
{
	for ($i=0; $i < count($_POST['numCoursesYearTerm']); $i++)
	{
		$_SESSION['numCoursesYearTerm'][$i] = $_POST['numCoursesYearTerm'][$i];
		$_SESSION['numCoursesConstrain'][$i] = (int) $_POST['numCoursesConstrain'][$i];
	}

}

function processTimingConstraint()
{
	for ($i=0; $i < count($_POST['days']); $i++)
	{
		$_SESSION['startTimes'][$i] = $_POST['startTimes'][$i];
		$_SESSION['endTimes'][$i] = $_POST['endTimes'][$i];
		$_SESSION['days'][$i] = array($_POST['days'][$i]);
	}

}

function genNewSched ()
{
	$numCoursesArr = array();
	$noClassesArr=array();
	if (array_key_exists("numCoursesConstrain", $_SESSION))
	{
		for ($i=0; $i < count($_SESSION ['numCoursesConstrain']); $i++) {
			$term = $_SESSION ['numCoursesYearTerm'][$i];
			$numCoursesArr[$term] = $_SESSION['numCoursesConstrain'][$i];
		 }
	}

	if (array_key_exists("days", $_SESSION))
	{
		// Do another loop to take the different semesters
		$term = "1Fall";  // Replace with real semester
		$noClassesArr[$term] = array();

		for ($i=0; $i < count($_SESSION ['days']); $i++) {
			$noClassesInterval = new Session ("NoClass", null, null, "Fall", $_SESSION ['days'][$i],
			 																	$_SESSION ['startTimes'][$i], $_SESSION ['endTimes'][$i], null);
			array_push($noClassesArr[$term], $noClassesInterval);
		 }
	}

	$email = $_SESSION['userEmail'];
	$userName = $_SESSION['userName'];

	if ($userName == "GUEST")
		$firstSem = $_POST['intake'];

	else
		$firstSem = getFirstSemester($email);


	$userSched = new UserSchedule($numCoursesArr, $noClassesArr);
	$user = new User ($userName, $email, $userSched, $firstSem);

	$userSched->genProgramSched($user);

	$semInfo = array();
	$semYear = array();
	$semName = array();

	for ($i =0;$i<count($userSched->getListOfSemesters());$i++){
	$semInfo[$i]= array (array());
	$semYear[$i]= $userSched->getListOfSemesters()[$i]->getYear();
	$semName[$i]= $userSched->getListOfSemesters()[$i]->getName();

	foreach ($userSched->getListOfSemesters()[$i]->getLecs() as $lec)
	{
	  $courseInfo = array();
	  $courseInfo['Course Name'] = $lec->getCourse()->getCourseName();
	  $courseInfo['Credits'] = $lec->getCourse()->getCredits();
	  array_push($semInfo[$i],$courseInfo);
	}
	$semInfo[$i] = array_slice($semInfo[$i],1);
	}
$_SESSION['semInfo'] = $semInfo;
$_SESSION['semYear'] = $semYear;
$_SESSION['semName'] = $semName;
$_SESSION['userSched'] = $userSched;
}


if( empty($_POST['submitID']) )
{
	//if (empty($_SESSION['semInfo']))
	{
		$_SESSION['numCoursesYearTerm']= array();
		$_SESSION['numCoursesConstrain']= array();
		genNewSched();
	}
}
elseif ($_POST['submitID'] == "Submit#Courses" )
{
  processNumCoursesConstraint();
	genNewSched();
}

elseif ($_POST['submitID'] == "SubmitTimingConstraints")
{
	var_dump($_POST);
	processTimingConstraint();
	genNewSched();
}

 ?>
