<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-TreeDepth.php</title>
</head>
<body>
  <div>
    <?php
	require __DIR__.'/../DBInterface.php';

	// Change to abstract later
	class Course
	{
		private $name;
		private $section;
		private $start;
		private $end;
		private $days;
    private $address;
    private $ID;

		public function __construct($name, $section, $start, $end, $days,$address,$ID)
		{
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;
      $this->address= $address;
      $this->ID= $ID;
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
    public function getAddress()
    {
      return $this->address;
    }
    public function getID()
    {
      return $this->ID;
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
		private $pass;
		private $engProfReq;
		private $priority;
    private $credit;

		public function __construct($ID, $name, $section, $start, $end, $days,
									$semester, $preReqs, $coReqs, $engProfReq, $pass,$credit)
		{
      $this->$ID = $ID;
			$this->semester = $semester;
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;

      $this->credit=$credit;
			$this->preReqs = $preReqs;
			$this->coReqs = $coReqs;
			$this->pass = $pass;
			$this->engProfReq = $engProfReq;
			$this->priority = 0;
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

		public function calPriority ($courses)
		{
			deleteCourse($this, $courses);
			$this->priority = 0;

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
						$this->priority += 1+($c->calNumDescendents($courses));
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
						$this->priority += 1+($c->calNumDescendents($courses));
						}
					}
				}
			}
		return $this->priority;
		}

	}

	class Lab extends Course
	{
		public function __construct($ID, $name, $section, $start, $end, $days)
		{
      $this->ID = $ID;
			$this->name = $name;
			$this->section = $section;
			$this->start = $start;
			$this->end = $end;
			$this->days = $days;
		}

	}

  class Tut extends Course
  {
private $subSection;

    public function __construct($ID, $name, $section, $start, $end, $days,$subSection)
    {
      $this->ID = $ID;
      $this->name = $name;
      $this->section = $section;
      $this->start = $start;
      $this->end = $end;
      $this->days = $days;

      $this->subSection = $subSection;
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

	function updateAllPriority ($courses)
	{
		foreach ($courses as $c)
			$c->calPriority($courses);
	}

	function dispAllPriority ($courses)
	{
		foreach ($courses as $c)
		{
			echo "$c->name number of descendents' paths is $c->numDescendents <br>";
		}
	}

// Returns true if conflict exists
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


  //$tempPermittedCourses will be an array of strings which represent course names.
  //return vector of (vector lectures, vector tutorials, vector labs)
  function semesterConflictChecker ($tempPermittedCourses)
  {


    //This vector will hold vectors, first will be containing all the chosen lectures
    //then the tutorials then the labs.
    $addedCourses = new \Ds\Vector();
    //This will hold all the added lectures after the loops
    $addedLecs = new \Ds\Vector();
    //This will hold all the added tutorials after the loops
    $addedTuts = new \Ds\Vector();
    //This will hold all the added labs after the loops
    $addedLabs = new \Ds\Vector();
    //We have how many courses the student wants + the importance of $courses
    // We pick the ex.  4 most important courses (depth wise)
    //Most important course is first in the array

      foreach ($tempPermittedCourses as $c)
      {
          //Choose from the array the most important course
          $lecSections = getLectureSections($c);
          foreach ($lecSections as $lecS )
          {
              // Run Conflict checker for lectures
              foreach ($addedCourses as $allC)
              {
                foreach ($allC as $sessC)
                {
                  if(conflictExists($lecS, $sessC))
                    continue 3;
                }
              }
              $addedCourses[0]->push($lecS);

              $tutSections = getTutorials($lecS->name, $lecS->section);
              if($tutSections != null)
              {
                foreach ($tutSections as $tutS)
                {
                  // Run Conflict Checker for tutorials
                    foreach ($addedCourses as $allC)
                    {
                      foreach ($allC as $sessC)
                      {
                        if(conflictExists($tutS, $sessC))
                          continue 3;
                      }
                    }
                      break;
                 }
               }
              $addedCourses[1]->push($tutS);

              $labSections = getLabs($lecS->name);
              if($labSections != null)
              {
                foreach ($labSections as $labS)
                {
                    // Run Conflict Checker for labs
                    foreach ($addedCourses as $allC)
                    {
                      foreach ($allC as $sessC)
                      {
                        if(conflictExists($labS, $sessC))
                          continue 3;
                      }
                    }
                      break;
                 }
                  $addedCourses[2]->push($labS);

               }

          }

      }

      $addedCourses ->push($addedLecs , $addedTuts , $addedLabs);

      return $addedCourses;
  }

  function semesterGenerator($permittedCourses){
      $numOfCourses = 2;
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

        return $returnedCourses;
  }



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
