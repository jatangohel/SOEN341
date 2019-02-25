	<?php 
	include("Session.php");
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
		{

		//	include("lecturefunction.php");

	}
	function getTutorialSections($course){

			include("tutorialfunction.php");

	}
	getLectureSections('COMP232');
	//getLectureSections('COMP248');
	//	checkinglst('COMP232');
		
	 ?>