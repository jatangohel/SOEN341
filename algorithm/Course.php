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

?>
