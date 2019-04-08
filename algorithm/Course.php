<?php



class Course
{
  private $courseName; // String
  private $preReqs;    // array of Courses
  private $coReqs;     // array of Courses
  private $credits;    // int
  private $pass;       // bool
  private $engProfReq; // bool
  private $priority;   // int

  public function __construct($courseName, $preReqs, $coReqs, $credits, $pass, $engProfReq)
  {
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

  public function setCourseName($name)
  {
    $this->courseName = $name;
  }

  public function setPriority($priority)
  {
    $this->priority = $priority;
  }

  public function setPass($status)
  {
    $this->pass = $status;
  }

  public function dispAllPriority ($courses)
  {
    foreach ($courses as $c)
    {
      echo $c->getCourseName() . "number of descendents' paths is $c->numDescendents <br>";
    }
  }

  public function calPriority ($courses)
  {
    deleteCourse($this, $courses);
    $this->setPriority(0);

    foreach ($courses as $c)
    {
      //var_dump($c);
      if ($c->getPreReqs() != null)
      {

        foreach ($c->getPreReqs() as $preReq)
        {
          if ($this->getCourseName() == $preReq->getCourseName() )
          {
          $this->setPriority(-1+$this->priority+$c->calPriority($courses));
                    //for debugging
                    /*
                    if($this->courseName =="COMP232")
                    {
                      echo $c->getCourseName() . '<br>';
                      var_dump ($this);
                    }
                    */
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
          $this->setPriority(-1+$this->priority+$c->calPriority($courses));

                      //for debugging
                      /*
                      if($this->courseName =="COMP232")
                      {
                        echo $c->getCourseName() . '<br>';
                        var_dump ($this);
                      }
                      */
          }
        }
      }
    }
  return $this->priority;
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

function deleteCourse ($courseName, &$courses)
{
  foreach ($courses as $key=>$c)
  {
    if ($courseName == $c->getCourseName())
    {
      unset($courses[$key]);
      $courses=array_values($courses);
      return;
    }
  }
}


function coReqsSatisfied($courses)
{
  foreach ($courses as $key=>$c)
  {
    if ($c->getCoreqs() == null ) {
      continue ;
    }
    else {
      foreach ($c->getCoreqs() as $key=>$d)
      {
          if ($d->getPass()!=true){
            foreach ($courses as $key=>$e){
              if($d->getCourseName()==$e->getCourseName())
                continue 2;
            }
            return false;
          }
      }
    }
  }
  return true;
}

function coReqsSatisfiedCombs ($combs)
{
  $result = array ();

  foreach ($combs as $courses)
    if(coReqsSatisfied($courses))
      array_push($result, $courses);

  return $result;
}

//This function will calculate the total credits of the courses in each set in the
//array and will compare it with a given number of credits requested by the user
//Inputs are: a combination of sets of courses, number of required credits, and
//number of courses requested by the user.
function creditsSatisfied ($combs, $studentCredits, $numberOfCourses)
{
  $result = array();
  foreach ($combs as $coursesList)
    {
      $totCredits = 0;
      foreach ($coursesList as $course)
      {
        //If the remaining courses are less than the courses required by the user
        //then the credits will not satisfy and we can skip.
        if(sizeof($coursesList) < 4)
          {
          //  echo($numberOfCourses."---");
            array_push($result, $coursesList);
            continue;
          }
        $totCredits += $course->getcredits();
      }
      //We have a margin of 1.5 credits
      if($studentCredits <= $totCredits + 1.5)
        array_push($result, $coursesList);
    }

  //  echo("[[[[[[[[[DONE]]]]]]]]]");
    return $result;
}

function updateAllPriority ($courses)
{
  global $createdCourses;
  foreach ($courses as $c)
  {
    $c->calPriority($courses);

    // HACK for making SOEN490_2 follow after SOEN490_1
    if ($c->getCourseName() == "SOEN490_2" && $createdCourses['SOEN490_1']->getPass() == true)
    {
      $c->setPriority(-20);
    }
  }
}

?>
