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

	class Course
	{
		private $courseName; // String
    private $courseID;   // int
		private $preReqs;    // array of Courses
		private $coReqs;     // array of Courses
		private $credits;    // int
    private $pass;       // bool
    private $engProfReq; // bool
    private $priority;   // int

		public function __construct($courseID, $courseName, $preReqs, $coReqs, $credits, $pass, $engProfReq)
		{
      $this->courseID = $courseID;
			$this->courseName = $courseName;
			$this->preReqs = $preReqs;
			$this->coReqs = $coReqs;
			$this->credits = $credits;
      $this->pass = $pass;
      $this->engProfReq = $engProfReq;
      $this->priority = 0;
		}

    public function getCourseName()
    {
      return $this->courseName;
    }

    public function getCourseID()
    {
      return $this->courseID;
    }

    public function getPreReqs()
    {
      return $this->preReqs;
    }

    public function getCoReqs()
    {
      return $this->coReqs;
    }

    public function getCredits()
    {
      return $this->credits;
    }

    public function getPass()
    {
      return $this->pass;
    }

    public function getEngProfReq()
    {
      return $this->engProfReq;
    }

    public function getPriority()
    {
      return $this->priority;
    }

    public function setCourseID($id)
    {
      $this->courseID = $id;
    }

    public function setCourseName($name)
    {
      $this->courseName = $name;
    }

    public function setPriority($priority)
    {
      $this->priority = $priority;
    }


    public function calPriority ($courses)
		{
			deleteCourse($this, $courses);
			$this->setPriority(0);

			//echo "Checking $this->name <br>";

			foreach ($courses as $c)
			{
				//echo "Checking $c->name <br>";
				if ($c->getPreReqs() != null)
				{

					foreach ($c->getPreReqs() as $preReq)
					{
						if ($this->getCourseName() == $preReq->getCourseName() )
						{
						$this->setPriority(1+($c->calPriority($courses)));
						//echo "$this->numDescendents <br>";
						}
					}
				}
				if ($c->getCoReqs() != null)
				{
					foreach ($c->getCoReqs() as $coReqs)
					{
						if ($this->getCourseName() == $coReqs->getCourseName())
						{
						//echo "entered the if <br>";
            $this->setPriority(1+($c->calPriority($courses)));
						}
					}
				}
			}
		return $this->priority;
		}

    public function updateAllPriority ($courses)
  	{
  		foreach ($courses as $c)
  			$c->calPriority($courses);
  	}

  	public function dispAllPriority ($courses)
  	{
  		foreach ($courses as $c)
  		{
  			echo $c->getCourseName() . "number of descendents' paths is $c->numDescendents <br>";
  		}
  	}
//    public function dispLength($course)
//    {
//    $str=  (string)($this->coFinish - $this->coStart.);
//    $arr1 = str_split($str, 3);
//    foreach ($arr1 as $st) {
//      echo "".$st." : ";
//    }
//    }

	}

	class Session
	{
    private $courseID;    // int
		private $courseName;  // String
		private $section;     // String
		private $subSection;  // String
		private $semester;    // String ("F"or"W"or"S")
    private $days;        // array of strings ("M","T","W","J","F")
		private $startTime;   // int
		private $endTime;     // int
    private $campus;      // String

		public function __construct($courseID, $courseName, $section, $subSection,
                                $semester, $days, $startTime, $endTime, $campus)
		{
      $this->courseID = $courseID;
      $this->courseName = $courseName;
			$this->section = $section;
			$this->subSection = $subSection;
			$this->semester = $semester;
      $this->days = $days;
			$this->startTime = $startTime;
			$this->endTime = $endTime;
      $this->campus = $campus;
		}

    public function getCourseID()
    {
      return $this->courseID;
    }

    public function getCourseName()
    {
      return $this->courseName;
    }

    public function getSection()
    {
      return $this->section;
    }

    public function getSubSection()
    {
      return $this->subSection;
    }

    public function getSemester()
    {
      return $this->semester;
    }

    public function getDays()
    {
      return $this->days;
    }

    public function getStartTime()
    {
      return $this->startTime;
    }

    public function getEndTime()
    {
      return $this->endTime;
    }

    public function getCampus()
    {
      return $this->endTime;
    }

		public function dispInfo ()
		{
			echo "Course name: " . $this->getCourseName() . " section :" . $this->getSection()  .
			" time: ". $this->getStartTime() . " , ". $this->getEndTime() .
			" Dates: ";
			foreach($this->getDays() as $d)
				echo $d . ", ";

			echo "<br>";
		}
	}


	function deleteCourse ($course, &$courses)
	{
		foreach ($courses as $key=>$c)
		{
			if ($course->getCourseName() == $c->getCourseName())
			{
				unset($courses[$key]);
				return;
			}
		}
	}

  // Returns true if conflict exists
	function conflictExists ($c1, $c2)
	{
		// Check first if they have overlapping days
		foreach ($c1->getDays() as $c1Day)
		{
			foreach ($c2->getDays() as $c2Day)
			{
				if ($c1Day == $c2Day)
				{
					// Check for overlap in time
					if ( (($c1->getStartTime() >= $c2->getStartTime()) and ($c1->getStartTime() < $c2->getEndTime())) or ( ($c2->getStartTime() >= $c1->getStartTime()) and ($c2->getStartTime() < $c1->getEndTime()) ))
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
              $addedLecs->push($lecS);

              $tutSections = getTutorials($lecS->getCourseName(), $lecS->getSection());
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
                    $addedTuts->push($tutS);
                    break;
                 }
               }

              $labSections = getLabs($lecS->getCourseName());
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
                    $addedLabs->push($labS);
                    break;
                 }
               }
          }
      }

      $addedCourses ->push($addedLecs , $addedTuts , $addedLabs);

      return $addedCourses;
  }

  function semesterGenerator($permittedCourses)
  {
      $numOfCourses = 2;
      $courseCounter = $numOfCourses+1;
      $numReturnedCourses = 0;
      //Choose the first $numOfCourses to run semesterConflictChecker;
      $tempPermittedCourses = array_slice($permittedCourses, 0, $numOfCourses);

      $returnedCourses = semesterConflictChecker ($tempPermittedCourses);

      $numReturnedCourses = $returnedCourses[0]->count();

      //Check if numReturnedCourses are less than $numOfCourses

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
        $numReturnedCourses = $returnedCourses->count();
      }

      //If returned courses are equal to $numOfCourses then successfuly added all courses.
      return $returnedCourses;
  }

    ?>
  </div>
</body>
</html>
