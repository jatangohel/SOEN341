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

function deleteCourse ($course, &$courses)
{
  foreach ($courses as $key=>$c)
  {
    if ($course->getCourseName() == $c->getCourseName())
    {
      $c->setPass(true);
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

function updateAllPriority ($courses)
{
  foreach ($courses as $c)
    $c->calPriority($courses);
}
?>
