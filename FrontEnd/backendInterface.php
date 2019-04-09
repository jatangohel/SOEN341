<script>
alert (1);
</script>
<?php
require_once __DIR__.'/../algorithm/UserSchedule.php';
require_once "sessionfns.php";
if (session_status() != PHP_SESSION_ACTIVE)
	session_start();

$_POST['startTime'][0] = (int) "80000";
$_POST['endTime'][0] = (int) "90000";
$_POST['days'][0] = "M";

var_dump($_POST);


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
	var_dump ($_POST);
	for ($i=0; $i < count($_POST['startTime']); $i++)
	{
		$_SESSION['startTime'][$i] = (int) $_POST['startTime'][$i];
		$_SESSION['endTime'][$i] = (int) $_POST['endTime'][$i];
		$_SESSION['days'][$i] = $_POST['days'][$i];
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

	if (count($_SESSION ['startTime']) != 0)
	{
		var_dump($_SESSION);
		// Do another loop to take the different semesters
		for ($i=0; $i < count($_SESSION ['startTime']); $i++) {
			$term = "1F";  // Replace with real semester
			$noClassesArr[$term] = new Session ("NoClass", null, null, $term, $_SESSION ['days'][$i],
			 																		$_SESSION ['startTime'][$i], $_SESSION ['endTime'][$i], null);
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
		processTimingConstraint();
		genNewSched();
	}
}
elseif ($_POST['submitID'] == "Submit #Courses" )
{
  processNumCoursesConstraint();
	genNewSched();
}

elseif ($_POST['submitID'] == "Submit Timing Constraints")
{
	processTimingConstraint();
}

 ?>
