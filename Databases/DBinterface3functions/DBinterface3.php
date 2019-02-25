	

	<?php 
	include("Session.php");


		// This function will properly increment the courses number ex comp232_L1,comp232L2,comp248_L1.
	static $tf=true;
	static $x=1;
	static $new;
	function checkinglst($courseName){
		global $tf,$x,$new;
		if($new==$courseName){
			$x=$x+1;
			return $x;
		}else{
			$tf=true;
			$new = $courseName;
			$x=1;
			return $x;
		}
	}
	static $tf2=true;
	static $x2=1;
	static $new2;
	function checkinglst2($courseName){
		global $tf2,$x2,$new2;

		if($new2==$courseName){
			$x2=$x2+1;
			return $x2;
		}else{
			$tf2=true;
			$new2 = $courseName;
			$x2=1;
			return $x2;
		}
	}
	function getLectureSections($course){

		include('lecturefunction.php');	
	}
	function getTutorialSection($course){
		include('tutorialfunction.php');
	}
	function getLabSection($course){
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
	getLectureSections('COMP248');
	getTutorialSection('COMP232');
	getLabSection('COMP248');
	//	checkinglst('COMP232');
	//	checkinglst('COMP232');


	?>