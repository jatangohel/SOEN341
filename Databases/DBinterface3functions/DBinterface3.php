

	<?php
	include("Session.php");



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
			$lecDay = $post ['LecDay'];
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham =  new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);

		 	array_push($stack, $ham);
		}
		mysqli_close($conn);
		var_dump($stack);
		return $stack;
		}


	function getTutorialSection($course, $semester, $section){
		include('tutorialfunction.php');
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

	function getPermittedCourses($user, $remainingCourses,  $semester)
	{

	}

//Returns an array of Courses objects for all the courses that the user did not take yet
//allCourses is the all the courses that the student have to take and passed by array
//$user will pass the course that user has taken by array
	function getUntakenCourses($allCourses,$user)
	{
		foreach($allCourses as $key => $value)
		{
			if(is_array($value))
			{
				if(!isset($user[$key]))
				{
					$difference[$key] = $value;
				}
				elseif(!is_array($user[$key]))
				{
					$difference[$key] = $value;
				}
				else
				{
					$new_diff = getUntakenCourses($value, $user[$key]);
					if($new_diff != FALSE)
					{
						$difference[$key] = $new_diff;
					}
				}
			}
			elseif(!isset($user[$key]) || $user[$key] != $value)
			{
				$difference[$key] = $value;
			}
		}
		return !isset($difference) ? 0 : $difference;
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
