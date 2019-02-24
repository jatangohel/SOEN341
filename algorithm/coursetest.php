
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div>
<?php
//1.haven't add "require scheduleGen.php';" so it cannot delete courses in calPriority
//2.in updateAllpriority, it will call calpriority too many times and exceed 30s
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

  public function __construct($courseID, $preReqs, $coReqs,$pass)
  {
    $this->courseID = $courseID;
    $this->preReqs = $preReqs;
    $this->coReqs = $coReqs;
    $this->pass = $pass;
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

  }


     function updateAllPriority ($courses)
    {
      foreach ($courses as $c)
        $c->calPriority($courses);}


     function dispAllPriority ($courses)
    {
      foreach ($courses as $c)
      {
        echo $c->getCourseName() . "number of descendents' paths is $c->numDescendents <br>";
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

//    public function dispLength($course)
//    {
//    $str=  (string)($this->coFinish - $this->coStart.);
//    $arr1 = str_split($str, 3);
//    foreach ($arr1 as $st) {
//      echo "".$st." : ";
//    }
//    }


$math203 = new Course ("MATH203", null, null, false);
$math204 = new Course ("MATH204", null, null, false);
$math205 = new Course ("MATH205", array($math203), null, false);
$phys204 = new Course ("PHYS204", null, array($math203), false);
$phys205 = new Course ("PHYS205", array($phys204), null, false);
$ewt = new Course ("EWT", null, null, false);
$comp248 = new Course ("COMP248", null, array($math204), false);
$comp249 = new Course ("COMP249", array($math203,$comp248), array($math205), false);
$comp352 = new Course ("COMP352", array ($comp249), null, false);
$encs282 = new Course ("ENCS282", array ($ewt), null, false);
$engr201 = new Course ("ENGR201", null, null, false);
$engr202 = new Course ("ENGR202", null, null, false);
$engr213 = new Course ("ENGR213", array($math205), array ($math204), false);
$engr233 = new Course ("ENGR233", array($math204, $math205),null, false);
$remainingCourses = array ($math203,$math204,$math205,$phys204,$phys205,$ewt,$comp248,$comp249,$comp352,$encs282,
$engr201,$engr202,$engr213,$engr233);




	updateAllPriority($remainingCourses);
	dispAllPriority($remainingCourses);

?>

</div>
</body>
</html>
