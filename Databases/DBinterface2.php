	<?php 
	include("Session.php");
	/*	function checkingls($courseName){
				$x;
				if($new==$courseName){
				 $x++;
				echo $x;
				}else{
				$new=$courseName;
				static $x=1;
				echo $x;
			}
		}	*/

		//static $a=1;
		//static $jo=false;

		/*function tester(){
			global $a,$jo;
			echo $a;
			$a++;
			echo $jo ? 'true': 'false';
			$jo= true;

		}*/

		// This function will properly increment the courses number ex comp232_L1,comp232L2,comp248_L1.
		static $tf=true;
		static $x=1;
		static $new;
		function checkinglst($courseName){
			global $tf,$x,$new;
			/*if($tf==true){
				$new = $courseName;
				$tf =false;
				$x=1;
				echo $x;
			}else{*/
				if($new==$courseName){
					 $x=$x+1;
					 return $x;
				}else{
					$tf=true;
					$new = $courseName;
					$x=1;
					return $x;
				}
		//	}

		}
		static $tf2=true;
		static $x2=1;
		static $new2;
		function checkinglst2($courseName){
			global $tf2,$x2,$new2;
			/*if($tf==true){
				$new = $courseName;
				$tf =false;
				$x=1;
				echo $x;
			}else{*/
				if($new2==$courseName){
					 $x2=$x2+1;
					 return $x2;
				}else{
					$tf2=true;
					$new2 = $courseName;
					$x2=1;
					return $x2;
				}
		//	}

		}
	function getLectureSections($course){

		require('config/db.php');

		//Create query
		//query for fall semester
		$queryf = "SELECT * FROM `flec` WHERE `CourseName`='$course'";
		//query for winter semester
		$queryw = "SELECT * FROM `wlec` WHERE `CourseName`='$course'";
		//query for summer semster
		$querys = "SELECT * FROM `slec` WHERE `CourseName`='$course'";

		$queryAll = "SELECT * FROM `flec` WHERE `CourseName`='$course'
					UNION 
					SELECT * FROM `wlec` WHERE `CourseName`='$course'
					UNION 
					SELECT * FROM `slec` WHERE `CourseName`='$course'";
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
			$courseId = null;
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$semester = "F";
			//{return "F"}; 
			$lecDay = $post ['LecDay'];
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

		
			$ham = $courseName."_L".checkinglst($courseName);
			$ham1 = $courseName."_L".checkinglst2($courseName);

			$ham =  new Session($courseId,$courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);
	//		echo $ham;
			echo "Session Name: ".$ham1;
			echo '<br>';
			echo "CourseId: ".$courseId;
			echo '<br>';
			echo "CourseName: ".$courseName;
			echo '<br>';
			echo "LecInfo: ".$lecInfo;
			echo '<br>';
			echo "Semester: ".$semester;
			echo '<br>';
			echo "lecDay: ".$lecDay;
			echo '<br>';
			echo "startLecTime: ".$startLecTime;
			echo '<br>';
			echo "endLecTime: .".$endLecTime;
			echo '<br>';
			echo "Campus: .".$campus;
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
			$courseId = null;
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$semester = "W";

			//$semester = if($query=="SELECT * FROM `flec` WHERE `CourseName`='$course'")
			//{return "F"}; 
			$lecDay = $post ['LecDay'];
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			$ham = $courseName."_L".checkinglst($courseName);
			echo $ham;


			echo $courseId;
			echo '<br>';
			echo $courseName;
			echo '<br>';
			echo $lecInfo;
			echo '<br>';
			echo $semester;
			echo '<br>';
			echo $lecDay;
			echo '<br>';
			echo $startLecTime;
			echo '<br>';
			echo $endLecTime;
			echo '<br>';
			echo $campus;
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
	//Instantiating the Summer semster
	foreach($postss as $post){
			$courseId = null;
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$semester = "S";
			//$semester = if($query=="SELECT * FROM `flec` WHERE `CourseName`='$course'")
			//{return "F"}; 
			$lecDay = $post ['LecDay'];
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			$ham = $courseName."_L".checkinglst($courseName);
			echo $ham;


			echo $courseId;
			echo '<br>';
			echo $courseName;
			echo '<br>';
			echo $lecInfo;
			echo '<br>';
			echo $semester;
			echo '<br>';
			echo $lecDay;
			echo '<br>';
			echo $startLecTime;
			echo '<br>';
			echo $endLecTime;
			echo '<br>';
			echo $campus;
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
	}
			//close connection
			mysqli_close($conn);
	}
	getLectureSections('COMP232');
	getLectureSections('COMP248');
	//	checkinglst('COMP232');
	//	checkinglst('COMP232');
	//	checkinglst('COMP232');
	//	checkinglst('COMP532');
	//	checkinglst('COMP532');
	//	checkinglst('COMP532');
	//	checkinglst('COMP532');
	//	checkinglst('COMP53d');
	//	checkinglst('COMP53d	');



	

	//tester();
	//tester();

		
	 ?>