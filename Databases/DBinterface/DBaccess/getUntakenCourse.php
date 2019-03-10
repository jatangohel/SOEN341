<?php
	require_once('AccessDB.php');
	function getUntakenCourse($email){
		$pdo = accessDB();
		
		//get all the courses from coursesmain table
		$query = 'select CourseName from coursesmain';
		$result = retrieve($pdo,$query);
		//store all the courses in $courses array (to get any element $courses[1]->CourseName)
		$courses = $result->fetchAll();

		
		//get the UserId that corresponds to the given Email 
		$query = 'select UserId from users where Email="'.$email.'"';
		$result = retrieve($pdo,$query);
		//store the UserId in $userId variable (to get the element $userId->UserId)
		$userId = $result->fetch();
		
		
		//if no user by the passed email address, the function will return false
		if(empty($userId))
			return false;
		
		
		//get all the courses from pass table which are related to a specific user (by the $userId)
		$query = 'select CourseName from pass where UserId="'.$userId->UserId.'"';
		$result = retrieve($pdo,$query);
		//store all the passed courses in $passedCourses variable (to get the element $passedCourses[0]->CourseName)
		$passedCourses = $result->fetchAll();
		
		
		//compare all the taken courses in passedCourses array to all SOEN courses and remove any matched element
		//from the courses array. Eventually, courses array will only contain untaken courses
		for($i=0;$i<count($passedCourses);$i++){
			$takenCourse = $passedCourses[$i]->CourseName;
			for($j=0;$j<count($courses);$j++){
				if($courses[$j]->CourseName == $takenCourse)
					array_splice($courses,$j,1);
			}
		}
		
		
		//convert $courses which contains objects to $untakenCourses array which contains only strings
		$untakenCourses;
		for($i=0;$i<count($courses);$i++){
			$untakenCourses[$i] = $courses[$i]->CourseName;
		}
		
		
		return $untakenCourses;
	}
	var_dump(getUntakenCourse('sebhani98@gmail.com'));
?>