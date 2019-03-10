<?php
	require_once('AccessDB.php');
	
	function updateTakenCourses($email,$courseName){
		$pdo = accessDB();
				
		//get the UserId that corresponds to the given Email 
		$query = 'select UserId from users where Email="'.$email.'"';
		$result = retrieve($pdo,$query);
		//store the UserId in $userId variable (to get the element $userId->UserId)
		$userId = $result->fetch();
		
		//if no user by the passed email address, the function will return false
		if(empty($userId))
			return false;
		
		//$userId is int
		$userId = $userId->UserId;
			
		//get all the courses from coursesmain table
		$query = 'insert into pass (UserId, CourseName) values ('.$userId.',"'.$courseName.'")';
		$result = retrieve($pdo,$query);
	}

?>