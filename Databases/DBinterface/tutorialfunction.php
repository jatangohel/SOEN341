<!DOCTYPE html>
<html>
<head>
	<title>tutorial</title>
			<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">

</head>
<body>
<?php
		echo '<div class="container">';
$stack=array();
		require('config/db.php');

		//Create query
		//query for fall semester
		$queryf = "SELECT * FROM `ftut` WHERE `CourseName`='$course'";
		//query for winter semester
		$queryw = "SELECT * FROM `wtut` WHERE `CourseName`='$course'";
		//query for summer semster
		$querys = "SELECT * FROM `stut` WHERE `CourseName`='$course'";

		$queryAll = "SELECT * FROM `ftut` WHERE `CourseName`='$course'
					UNION 
					SELECT * FROM `wtut` WHERE `CourseName`='$course'
					UNION 
					SELECT * FROM `stut` WHERE `CourseName`='$course'";
		//echo "passed";
		//Get Result
		$resultf = mysqli_query($conn, $queryf);
		$resultw= mysqli_query($conn, $queryw);
		$results= mysqli_query($conn, $querys);

		//Fetch Data
		$postsf = mysqli_fetch_all($resultf, MYSQLI_ASSOC);
		$postsw = mysqli_fetch_all($resultw, MYSQLI_ASSOC);
		$postss = mysqli_fetch_all($results, MYSQLI_ASSOC);
		//var_dump($posts);
		// Free Result
		mysqli_free_result($resultf);
		mysqli_free_result($resultw);
		mysqli_free_result($results);
		//echo "passed2";

		//Instantiating the Fall semster
		foreach($postsf as $post){
			$courseId = $post['TutID'];
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = $post ['TutSection'];
			$semester = "F";
			//{return "F"}; 
			$tutDay = $post ['TutDay'];
			$startTutTime= $post ['StartTutTime'];
			$endTutTime= $post ['EndTutTime'];
			$campus = "SGW";

			//This is to label the session name properly
			$ham = $courseName."_T".checkinglst($courseName);
			$ham1 = $courseName."_T".checkinglst2($courseName);

			//Making a new session object with the course information
			$ham =  new Session($courseId,$courseName,$lecInfo,$subSection,$semester,$tutDay,$startTutTime,$endTutTime,$campus);

			  echo '<div class="bs-component">';
			echo '<h5>';
			 $ham -> dispInfo(); 
			echo '<h5>';
			echo '</div>'; 

			 array_push($stack, $ham);

//			 print_r($stack);

	//		echo $ham;
			echo '<br>';
			echo "Session Name: ".$ham1;
			echo '<br>';
			echo "CourseId: ".$courseId;
			echo '<br>';
			echo "CourseName: ".$courseName;
			echo '<br>';
			echo "LecInfo: ".$lecInfo;
			echo '<br>';
			echo "SubSection: ". $subSection;
			echo '<br>';
			echo "Semester: ".$semester;
			echo '<br>';
			echo "TutDay: ".$tutDay;
			echo '<br>';
			echo "startTutTime: ".$startTutTime;
			echo '<br>';
			echo "endTutTime: ".$endTutTime;
			echo '<br>';
			echo "Campus: ".$campus;
			echo '<br>';
			echo '<br>';
		/*	$LecInfo = $post['LecInfo'];
			echo $LecInfo;
			$LecDay= $post['LecDay'];
			echo $LecDay;
			$StartLecTime= $post['StartlecTime'];
			echo $StartLecTime;
			$EndLecTime = $post['EndLecTime'];
			echo $EndLecTime;
			*/

		//close connection
	}
	//Instantiating the Winter semster
	foreach($postsw as $post){
					$courseId = $post['TutID'];
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = $post ['TutSection'];
			$semester = "F";
			//{return "F"}; 
			$tutDay = $post ['TutDay'];
			$startTutTime= $post ['StartTutTime'];
			$endTutTime= $post ['EndTutTime'];
			$campus = "SGW";

			//This is to label the session name properly
			$ham = $courseName."_T".checkinglst($courseName);
			$ham1 = $courseName."_T".checkinglst2($courseName);

			//Making a new session object with the course information
			$ham =  new Session($courseId,$courseName,$lecInfo,$subSection,$semester,$tutDay,$startTutTime,$endTutTime,$campus);

			  echo '<div class="bs-component">';
			echo '<h5>';
			 $ham -> dispInfo(); 
			echo '<h5>';
			echo '</div>'; 

			 array_push($stack, $ham);

//			 print_r($stack);

	//		echo $ham;
			 echo '<br>';
			echo "Session Name: ".$ham1;
			echo '<br>';
			echo "CourseId: ".$courseId;
			echo '<br>';
			echo "CourseName: ".$courseName;
			echo '<br>';
			echo "LecInfo: ".$lecInfo;
			echo '<br>';
			echo "SubSection: ". $subSection;
			echo '<br>';
			echo "Semester: ".$semester;
			echo '<br>';
			echo "TutDay: ".$tutDay;
			echo '<br>';
			echo "startTutTime: ".$startTutTime;
			echo '<br>';
			echo "endTutTime: ".$endTutTime;
			echo '<br>';
			echo "Campus: ".$campus;
			echo '<br>';
			echo '<br>';
	}
	//Instantiating the Summer semster
	foreach($postss as $post){
					$courseId = $post['TutID'];
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = $post ['TutSection'];
			$semester = "F";
			//{return "F"}; 
			$tutDay = $post ['TutDay'];
			$startTutTime= $post ['StartTutTime'];
			$endTutTime= $post ['EndTutTime'];
			$campus = "SGW";

			//This is to label the session name properly
			$ham = $courseName."_T".checkinglst($courseName);
			$ham1 = $courseName."_T".checkinglst2($courseName);

			//Making a new session object with the course information
			$ham =  new Session($courseId,$courseName,$lecInfo,$subSection,$semester,$tutDay,$startTutTime,$endTutTime,$campus);

			  echo '<div class="bs-component">';
			echo '<h5>';
			 $ham -> dispInfo(); 
			echo '<h5>';
			echo '</div>'; 

			 array_push($stack, $ham);

			// print_r($stack);

	//		echo $ham;
			 echo '<br>';
			echo "Session Name: ".$ham1;
			echo '<br>';
			echo "CourseId: ".$courseId;
			echo '<br>';
			echo "CourseName: ".$courseName;
			echo '<br>';
			echo "LecInfo: ".$lecInfo;
			echo '<br>';
			echo "SubSection: ". $subSection;
			echo '<br>';
			echo "Semester: ".$semester;
			echo '<br>';
			echo "TutDay: ".$tutDay;
			echo '<br>';
			echo "startTutTime: ".$startTutTime;
			echo '<br>';
			echo "endTutTime: ".$endTutTime;
			echo '<br>';
			echo "Campus: ".$campus;
			echo '<br>';
			echo '<br>';
	}

echo '<h1>This is the array that will be returned</h1>';
echo '<div class="card border-danger mb-3" style="max-width:20 rem;">';
echo '<div class="card-header">outputted array</div>';
echo '<div class="card-body">';
echo '<p class="card-text">' ;
print_r($stack);
echo  '</p>';
echo  '</div>';
echo  '</div>';
echo  '</div>';
return $stack;
			//close connection
			mysqli_close($conn);


?>
</body>
</html>

