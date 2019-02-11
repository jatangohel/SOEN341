<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-TreeDepth.php</title>
</head>
<body>
  <div>
    <?php
	require 'DBInterface.php';

	// Change to abstract later
	class Course
	{
		private $name;
		private $section;
		private $start;
		private $end;
		private $days;

		public function __construct($name, $section, $start, $end, $days)
		{
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;
		}
    public function getName()
    {
      return $this->name;
    }
    public function setName($name)
    {
      $this->name = $name;
    }
    public function getSection ()
    {
      return $this->section;
    }
    public function setSection ($section)
    {
      $this->section = $section;
    }
    public function getDays()
    {
      return $this->days;
    }
//    public function dispLength($course)
//    {
//    $str=  (string)($this->coFinish - $this->coStart.);
//    $arr1 = str_split($str, 3);
//    foreach ($arr1 as $st) {
//      echo "".$st." : ";
//    }
//    }
    public function dispTime($course)
    {
      echo "Course name: ". $this->name . ", Time is: " . $this->start. " , "
      . $this->end. " .";
    }



	}

	class Lecture extends Course
	{
		private $semester;
		private $preReqs;
		private $coReqs;
		private $status;
		private $engProfReq;
		private $descendents;

		public function __construct($name, $section, $start, $end, $days,
									$semester, $preReqs, $coReqs, $engProfReq, $status)
		{
			$this->semester = $semester;
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;


			$this->preReqs = $preReqs;
			$this->coReqs = $coReqs;
			$this->status = $status;
			$this->engProfReq = $engProfReq;
			$this->descendents = 0;
		}

		public function dispInfo ()
		{
			echo "Course name: " . $this->name . " section :" . $this->section  .
			" time: ". $this->start. " , ". $this->end.
			" Dates: ";
			foreach($this->days as $d)
				echo $d . ", ";

			echo "<br>";
		}

		public function calNumDescendents ($courses)
		{
			deleteCourse($this, $courses);
			$this->numDescendents = 0;

			//echo "Checking $this->name <br>";

			foreach ($courses as $c)
			{
				//echo "Checking $c->name <br>";
				if ($c->preReqs != null)
				{

					foreach ($c->preReqs as $preReq)
					{
						if ($this->name == $preReq->name )
						{
						$this->numDescendents += 1+($c->calNumDescendents($courses));
						//echo "$this->numDescendents <br>";
						}
					}
				}
				if ($c->coReqs != null)
				{
					foreach ($c->coReqs as $coReqs)
					{
						if ($this->name == $coReqs->name)
						{
						//echo "entered the if <br>";
						$this->numDescendents += 1+($c->calNumDescendents($courses));
						}
					}
				}
			}
		return $this->numDescendents;
		}

	}

	class LabTut extends Course
	{
		public function __construct($name, $section, $start, $end, $days)
		{
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;
		}

	}


	function deleteCourse ($course, &$courses)
	{
		foreach ($courses as $key=>$c)
		{
			if ($course->name == $c->name)
			{
				unset($courses[$key]);
				return;
			}
		}
	}

	function updateAllNumDescendents ($courses)
	{
		foreach ($courses as $c)
			$c->calNumDescendents($courses);
	}

	function dispAllNumDescendents ($courses)
	{
		foreach ($courses as $c)
		{
			echo "$c->name number of descendents' paths is $c->numDescendents <br>";
		}
	}

	function conflictExists ($c1, $c2)
	{
		// Check first if they have overlapping days
		foreach ($c1->days as $c1Day)
		{
			foreach ($c2->days as $c2Day)
			{
				if ($c1Day == $c2Day)
				{
					// Check for overlap in time
					if ( (($c1->start >= $c2->start) and ($c1->start < $c2->end)) or ( ($c2->start >= $c1->start) and ($c2->start < $c1->end) ))
						return true;
				}
			}
		}
		return false;
	}
  
  function semesterConflictChecker ($tempPermittedCourses)
  {
    $numOfCourses = 4;
    $numOfSections = 2;
    $numOfTutorials = 2;
    $numOfLabs = 2;

    //We have how many courses the student wants + the importance of $courses
    // We pick the ex.  4 most important courses (depth wise)
    //Most important course is first in the array

      foreach ($numOfCourses as $key1) {
          //Choose from the array the most important course
              foreach ($numOfSections as $key2 ) {
                // Run Conflict checker for lectures
                    foreach ($numOfTutorials as $key3) {
                      // Run Conflict Checker for tutorials
                    }
                    foreach ($numOfLabs as $key4) {
                      // Run Conflict Checker for labs
                    }
              }
            }
          }

  function semesterGenerator($permittedCourses){
      $courseCounter = $numOfCourses+1;
      $numReturnedCourses = 0;
      //Choose the first $numOfCourses to run semesterConflictChecker;
      $tempPermittedCourses = array_slice($permittedCourses, 0, $numOfCourses);

        $returnedCourses = semesterConflictChecker ($tempPermittedCourses);
        //Check if numReturnedCourses are less than $numOfCourses
        $numReturnedCourses = $returnedCourses.length();

          while($numReturnedCourses < $numOfCourses)
          {
            //If yes, then change one of the courses in the array and try again.
            //The change should be based on which course the loop exited at
            //If returned courses are 2 then the problem is with the 3rd one,
            //If 3 then the problem is with the 4th one.(check for if one is returned as well).
            if($tempPermittedCourses[$numReturnedCourses+1] != null && $permittedCourses[$courseCounter] != null)
              {
                $tempPermittedCourses [$numReturnedCourses+1]= $permittedCourses[$courseCounter];
                $courseCounter++;
              }
            $returnedCourses = semesterConflictChecker ($tempPermittedCourses);
            $numReturnedCourses = $returnedCourses.length();
        }
        //If returned courses are equal to $numOfCourses then successfuly added all courses.
  }




		$math203_L1 = new Lecture ("MATH203","A",1000,1115,array("Monday","Wednesday"),
		array("F","W","S"), null, null, false, false);

		$math204_L1 = new Lecture ("MATH204","B",1100,1200,array("Monday","Wednesday"),
		array("F","W","S"), null, null, false, false);


		if (conflictExists ($math203_L1, $math204_L1))
		echo "Conflict exists";

		else
			echo "Conflict does not exist";


	// $math203 = new Course ("MATH203", "AA", null, null, 1400, 1515,
                          // array("Monday", "Wednesday"), false);
	// $math204 = new Course ("MATH204", "BB", null, null, 1600, 1715,
                          // array("Tuesday", "Thursday"), false);
	// $math205 = new Course ("MATH205", "CC", array($math203), null, 845, 1000,
                          // array("Monday", "Wednesday"), false);
	// $phys204 = new Course ("PHYS204", "DD", null, array($math203), 1100, 1330,
                          // array("Friday"), false);
	// $phys205 = new Course ("PHYS205", "AB", array($phys204), null, 1500, 1615,
                          // array("Tuesday", "Thursday"), false);
	// $ewt = new Course ("EWT", "AC", null, null, 1100, 1215,
                          // array("Monday", "Wednesday"), false);
	// $comp248 = new Course ("COMP248", "Q", null, array($math204), 1415, 1530,
                          // array("Monday", "Wednesday"),false);
	// $comp249 = new Course ("COMP249","PP", array($math203,$comp248), array($math205),
                          // 1415, 1530, array("Tuesday", "Thursday"), false);
	// $comp352 = new Course ("COMP352","AA", array ($comp249), null, 1400, 1630,
                          // array("Wednesday"),false);
	// $encs282 = new Course ("ENCS282", "ZZ", array ($ewt), null, 1600, 1830,
                          // array("Thursday"),false);
	// $engr201 = new Course ("ENGR201", "CA", null, null, 930, 1045,
                          // array("Monday", "Wednesday"),false);
	// $engr202 = new Course ("ENGR202", "AC", null, null,1100, 1215,
                          // array("Tuesday", "Friday"),false);
	// $engr213 = new Course ("ENGR213", "XZ", array($math205), array ($math204), 1400, 1515,
                          // array("Tuesday", "Thursday"),false);
	// $engr233 = new Course ("ENGR233", "BU", array($math204, $math205),null, 1400, 1515,
                          // array("Monday", "Wednesday"),false);
	// $engr301 = new Course ("ENGR301", "EF", null, null, 845, 1000,
                          // array("Tuesday", "Thursday"),false);
	// $engr371 = new Course ("ENGR371", "DB", array($engr213, $engr233), null,1400, 1515,
                          // array("Monday", "Wednesday"), false);
	// $engr392 = new Course ("ENGR392", "DC", array($engr201,$engr202,$encs282),null,
                          // 1200, 1315, array("Monday", "Wednesday"),false);
	// $elec275 = new Course ("ELEC275", "DH", array($phys205), array ($engr213),1600,1715,
                          // array("Monday", "Wednesday"),false);
	// $soen228 = new Course ("SOEN228", "DD", array($math203,$math204), null, 1515, 1630,
                          // array("Wednesday", "Friday"),false);
	// $soen287 = new Course ("SOEN287", "U", array($comp248), null, 1400, 1630,
                          // array("Monday"),false);
	// $comp232 = new Course ("COMP232", "QQ", array($math203,$math204), null, 1515, 1630,
                          // array("Monday", "Wednesday"),false);
	// $comp346 = new Course ("COMP346", "NN", array ($soen228,$comp352), null, 1100,1330,
                          // array("Tuesday"),false);
	// $soen321 = new Course ("SOEN321", "GG", array($comp346), null, 945,1100,
                          // array("Tuesday", "Thursday"),false);
	// $soen331 = new Course ("SOEN331", "U", array($comp232,$comp249), null, 1515, 1630,
                          // array("Monday", "Wednesday"),false);
	// $soen341 = new Course ("SOEN341", "S", array($comp352), array($encs282), 1430, 1545,
                          // array("Wednesday", "Friday"),false);
	// $soen342 = new Course ("SOEN342", "H", array($soen341), null, 1715, 1830,
                          // array("Monday", "Wednesday"),false);
	// $soen343 = new Course ("SOEN343", "H", array($soen341), array($soen342), 1715,1830,
                          // array("Monday", "Wednesday"),false);
	// $soen344 = new Course ("SOEN344", "S", array($soen343), null, 1600,1715,
                          // array("Tuesday", "Friday"),false);
	// $soen345 = new Course ("SOEN345", "S", null, array($soen343), 1315, 1430,
                          // array("Monday", "Wednesday"),false);
	// $soen357 = new Course ("SOEN357", "FS", array($soen342), null, 1200, 1315,
                          // array("Monday", "Friday"),false);
	// $soen384 = new Course ("SOEN384", "F", array($encs282, $soen341), null, 845, 1000,
                          // array("Monday", "Wednesday"),false);
	// $soen385 = new Course ("SOEN385", "S", array($engr213,$engr233), null, 1015, 1130,
                          // array("Tuesday", "Thursday"),false);
	// $soen390 = new Course ("SOEN390", "S", null, array($soen344,$soen357), 1145, 1300,
                          // array("Monday", "Wednesday"),false);
	// $soen490_1 = new Course ("SOEN490_1", "SS", array($soen390), null, 1315, 1545,
                            // array("Friday"),false);
	// $soen490_2 = new Course ("SOEN490_2", "SS", array($soen490_1), null, 1315, 1545,
                            // array("Friday"),false);
	// $comp335 = new Course ("COMP335", "E", array($comp232,$comp249), null, 1315, 1430,
                          // array("Monday", "Wednesday"),false);
	// $comp348 = new Course ("COMP348", "U", array ($comp249), null, 1100, 1215,
                          // array("Tuesday", "Thursday"),false);


	// $remainingCourses = array ($math203,$math204,$math205,$phys204,$phys205,$ewt,$comp248,$comp249,$comp352,$encs282,
	// $engr201,$engr202,$engr213,$engr233,$engr301,$engr371,$engr392,$elec275,$soen228,$soen287,$comp232,$comp346,$soen321,
	// $soen331,$soen341,$soen342,$soen343,$soen344,$soen345,$soen357,$soen384,$soen385,$soen390,$soen490_1,$soen490_2,
	// $comp335,$comp348);


	// updateAllNumDescendents ($remainingCourses);
	// dispAllNumDescendents($remainingCourses);

  //echo $comp348->getName();
   // echo " \n ----- \n";
//$test = implode(",", $comp348->getDates());
//echo $test;
//echo " \n ----- \n";
    ?>
  </div>
</body>
</html>
