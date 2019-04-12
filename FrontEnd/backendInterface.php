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
	$semIndex = $_POST['semIndex'];

	for ($i=0; $i < count($_POST['days']); $i++)
	{
		$_SESSION['startTimes'][$semIndex][$i] = $_POST['startTimes'][$i];
		$_SESSION['endTimes'][$semIndex][$i] = $_POST['endTimes'][$i];
		$_SESSION['days'][$semIndex][$i] = array($_POST['days'][$i]);
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

	if (!empty($_SESSION['days']))
	{
		$oldUserSched = unserialize($_SESSION ['userSched']);

		// Looping through the semesters having constraints
		//for ($j=0; $j < count($_SESSION ['days']); $j++)
		foreach ($_SESSION ['days'] as $key => $val)
		{
			$semIndex = $oldUserSched->getListOfSemesters()[$key]->getYear().$oldUserSched->getListOfSemesters()[$key]->getName();
			$noClassesArr[$semIndex] = array();

			// Looping through the timing constraints for a semester
			for ($i=0; $i < count($_SESSION ['days'][$key]); $i++) {
				$noClassesInterval = new Session ("NoClass", null, null, null, $_SESSION ['days'][$key][$i],
				 																	$_SESSION ['startTimes'][$key][$i], $_SESSION ['endTimes'][$key][$i], null);
				array_push($noClassesArr[$semIndex], $noClassesInterval);
		 }
	 }
	}

	$email = $_SESSION['userEmail'];
	$userName = $_SESSION['userName'];

	if ($userName == "GUEST")
		$firstSem = $_SESSION['intake'] ;

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
$_SESSION['userSched'] = serialize($userSched);
}


if( empty($_POST['submitID']) )
{
	if (!empty($_POST['intake']))
	{
		$_SESSION['intake'] = $_POST['intake'];
	}
	if (empty($_SESSION['semInfo']))
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
	processTimingConstraint();
	genNewSched();
}

 ?>
