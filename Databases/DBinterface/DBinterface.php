
<!DOCTYPE html>
<html>
<head>
	<title>lecture</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
	<?php
	//include("Session.php");



	function getLectureSections($course, $semester){
		require('config/db.php');

		$stack=array();

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

		//Instantiating the Fall semster
		foreach($posts as $post)
		{
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$lecDay = explode(",",$post ['LecDay']);
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham =  new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);

			array_push($stack, $ham);
		}
		mysqli_close($conn);
		return $stack;
	}


	function getTutorialSection($course, $semester, $section){
		//include('tutorialfunction.php');
		require('config/db.php');

		$stack=array();

		static $table ;

		switch ($semester)
		{
			case 'F':
			global $table;
			$table = 'ftut';
			break;
			case 'W':
			global $table;
			$table = 'wtut';
			break;
			case 'S':
			global $table;
			$table = 'stut';
			break;
			default:
			global $table;
			$table = 'error';
		}

		//Create query
		$query = "SELECT * FROM `$table` WHERE `CourseName`='$course' AND `LecInfo`='$section'";


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
			$lecInfo = $post ['LecInfo'];
			$subSection = $post['TutSection'];
			$lecDay = explode(",",$post ['TutDay']);
			$startLecTime= $post ['StartTutTime'];
			$endLecTime= $post ['EndTutTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham =  new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);

			array_push($stack, $ham);
		}
		mysqli_close($conn);
		return $stack;

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
			$labDay = explode(",",$post ['LabDay']);
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

	//Returns an array of Courses objects this user can take this semester from the remaining courses array of courses
	// DO NOT GENERATE NEW COURSES OBJECTS AND USE THE SAME ELEMENTS FROM $remainingCourses
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
	//$user will pass the course that user has taken by array
	function getUntakenCourses($user)
	{
	  if ($user == 'Osama')
	    {
				$comp248 = new Course ("COMP248", null, null, 3, false, false);
	      $comp249 = new Course ("COMP249", array($comp248), null, 3, false, false);
	      $comp352 = new Course ("COMP352", array ($comp249), null, 3, false, false);
	      $engr201 = new Course ("ENGR201", null, null, 3, false, false);
	      $engr202 = new Course ("ENGR202", null, null, 3, false, false);
	      $engr213 = new Course ("ENGR213", null, null, 3, false, false);
	      $engr233 = new Course ("ENGR233", null, null, 3, false, false);

	      return array ($comp352, $engr201,$comp249,$engr202,$comp248,$engr213,$engr233);
	    }
	}



//Updates the database by changing the status of the courses recently taken
	function updateTakenCourses($passedCourses)
	{

	}


	?>
</body>
</html>
