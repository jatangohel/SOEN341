

	<?php
	include("Session.php");



	function getLectureSections($course, $semester){

		include('lecturefunction.php');
	}
	function getTutorialSection($course, $semester, $section){
		include('tutorialfunction.php');
	}
	function getLabSection($course, $semester){
		include ("labfunction.php");
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
	$lecs = getLectureSections('COMP248', 'F');

	foreach ($lecs as $lec)
		$lec->dispInfo();
	//getTutorialSection('COMP232');
	//getLabSection('COMP248');
	//	checkinglst('COMP232');
	//	checkinglst('COMP232');


	?>
