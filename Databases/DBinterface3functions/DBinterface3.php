

	<?php
	include("Session.php");



	function getLectureSections($course, $semester){
		require('config/db.php');

			static $table ;

			switch ($semester)
			{
				case 'F':
					global $table;
					$table = 'flec';
					break;
				case 'W':
					global $table;
					$table = 'wlec';
					break;
				case 'S':
					global $table;
					$table = 'slec';
					break;
				default:
					global $table;
					$table = 'error';
		}

		//Create query
		$query = "SELECT * FROM `$table` WHERE `CourseName`='$course'";

		//Get Result
		$result = mysqli_query($conn, $query);

		//Fetch Data
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Free Result
		mysqli_free_result($result);

		$stack=array();
		$tmp = null;
		//Instantiating the Fall semster
		foreach($posts as $post)
		{
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$lecDay = $post ['LecDay'];
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham = new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);
			//var_dump($ham);

		 	array_push($stack, $ham);

		}

		mysqli_close($conn);
		//var_dump($stack);
		return $stack;
}


	function getTutorialSection($course, $semester, $section){
		//include('tutorialfunction.php');
	}



function getLabSection($course, $semester){

	require('config/db.php');
	$stack=array();
	static $table;
	switch ($semester)
	{
		case 'F':
			global $table;
			$table = 'flab';
			break;
		case 'W':
			global $table;
			$table = 'wlab';
			break;
		case 'S':
			global $table;
			$table = 'slab';
			break;
		default:
			global $table;
			$table = 'error';
	}

	//Create query
	$query = "SELECT * FROM `$table` WHERE `CourseName`='$course'";

	//Get Result
	$result = mysqli_query($conn, $query);

	//Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free Result
	mysqli_free_result($result);

	//Instantiating the Fall semster
	foreach($posts as $post)
	{
		$courseName = $post['CourseName'];
		$labSection = $post ['LabSection'];
		$labDay = $post ['LabDay'];
		$startLabTime= $post ['StartLabTime'];
		$endLabTime= $post ['EndLabTime'];
		$campus = "SGW";

		//Making a new session object with the course information
		$ham =  new Session($courseName,$labSection,null,$semester,$labDay,$startLabTime,$endLabTime,$campus);

		array_push($stack, $ham);
	}

	mysqli_close($conn);
	return $stack;
}

function getCourse ($course)
{

}

function getPermittedCourses($user, $remainingCourses,  $semester)
{
  if ($semester=='F')
  {
    return array_slice($remainingCourses,0,6);
  }

  elseif ($semester=='W')
    return $remainingCourses;
}



//Returns an array of Courses objects for all the courses that the user did not take yet
//allCourses is the all the courses that the student have to take and passed by array
//$user will pass the course that user has taken by array
/*
function getUntakenCourses($user)
{
	require('config/db.php');
	$stack=array();

	//Create query
	// ADD THE WHERE PART !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$query = "SELECT * FROM `coursesmain` WHERE ";

	//Get Result
	$result = mysqli_query($conn, $query);

	//Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free Result
	mysqli_free_result($result);

	//Instantiating the Fall semster
	foreach($posts as $post)
	{
		$courseName = $post['CourseName'];
		$credit = $post ['Credit'];
		$preReqs_str = explode(",", $post ['Prerequisite']);
		$coReqs_str= explode ("," ,$post ['Corerequisite']);

		$preReqs = array();
		foreach ($preReqs_str as $pre)
			array_push($preReqs, getCourse($pre));

		$coReqs = array();
		foreach ($coReqs_str as $co)
			array_push($coReqs, getCourse($co));

		//Making a new session object with the course information
		$ham =  new Course($courseName, $preReqs, $coReqs, $credit, false, false);

		array_push($stack, $ham);
	}

	mysqli_close($conn);
	return $stack;
}
*/
function getUntakenCourses($user)
{
  if ($user == 'Osama')
    {
      $math203 = new Course ("MATH203", null, null, 3, false, false);
      $math204 = new Course ("MATH204", null, null, 3, false, false);
      $math205 = new Course ("MATH205", array($math203), null,  3, false, false);
      $phys204 = new Course ("PHYS204", null, array($math203),  3, false, false);
      $phys205 = new Course ("PHYS205", array($phys204), null,  3, false, false);
      $comp248 = new Course ("COMP248", null, array($math204),  3, false, false);
      $comp249 = new Course ("COMP249", array($math203,$comp248), array($math205),  3, false, false);
      $comp352 = new Course ("COMP352", array ($comp249), null,  3, false, false);
      $engr201 = new Course ("ENGR201", null, null,  3, false, false);
      $engr202 = new Course ("ENGR202", null, null,  3, false, false);
      $engr213 = new Course ("ENGR213", array($math205), array ($math204),  3, false, false);
      $engr233 = new Course ("ENGR233", array($math204, $math205),null,  3, false, false);

      return array ($math203,$math204,$math205,$phys204,$phys205,$comp248,$comp249,$comp352,
      $engr201,$engr202,$engr213,$engr233);
    }
}
//Updates the database by changing the status of the courses recently taken
function updateTakenCourses($passedCourses)
{

}
	//getLectureSections('COMP232');

	//getTutorialSection('COMP232');
	//getLabSection('COMP248');
	//	checkinglst('COMP232');
	//	checkinglst('COMP232');


	?>
