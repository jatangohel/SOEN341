<?php

require_once __DIR__.'/../algorithm/UserSchedule.php';
require_once "sessionfns.php";

if (session_status() != PHP_SESSION_ACTIVE)
	session_start();

	var_dump ($_SESSION);


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

	$email = $_SESSION['userEmail'];
	$userName = $_SESSION['userName'];

	if ($userName == "GUEST")
		$firstSem = $_POST['intake'];

	else
		$firstSem = getFirstSemester($email);

		var_dump ($_POST);
		var_dump ($firstSem);


	$userSched = new UserSchedule($numCoursesArr, $noClassesArr);
	$user = new User ($userName, $email, $userSched, $firstSem);

	$userSched->genProgramSched($user);


	$numSemesters = count($userSched->getListOfSemesters());

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
	if (empty($_SESSION['semInfo']))
	{
		echo "Generated new schedule";
		$_SESSION['numCoursesYearTerm']= array();
		$_SESSION['numCoursesConstrain']= array();
		genNewSched();
	}
}
elseif ($_POST['submitID'] == "Submit #Courses" )  // continuing           //F
{
  processNumCoursesConstraint();
	genNewSched();                                           //G
}

 ?>
