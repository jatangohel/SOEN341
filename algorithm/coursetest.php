<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div>
<?php

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
  private $level;
  public function __construct($courseID, $preReqs, $coReqs,$pass)
  {
    $this->courseID = $courseID;
    $this->preReqs = $preReqs;
    $this->coReqs = $coReqs;
    $this->pass = $pass;
    $this->priority = 1;
    $this->level=null;
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
  public function getlevel()
  {
    return $this->level;
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

  public function setlevel($level)
  {
    $this->level = $level;
  }
  public function calcPriority()
  {
    if ($this->getPreReqs() != null)
    {
      foreach ($this->getPreReqs() as $preReq)
        $this->setPriority($this->getPriority()+$preReq->getPriority());
    }
    if ($this->getCoReqs() != null)
    {
       foreach ($this->getCoReqs() as $coReq)
       $this->setPriority($this->getPriority()+$coReq->getPriority());
    }
  }
}

  function level0 ($courses)
  {
    foreach ($courses as $c)
      if($c->getPreReqs()==null&&$c->getCoReqs()==null){
        $c->setlevel(0);
      };

  }

  function level1 ($courses)
  {
    foreach ($courses as $c)
    {
     if ($c->getlevel=0)
        continue;
     if ($c->getPreReqs() != null)
     {
       foreach ($c->getPreReqs() as $preReq)
       {
        if ($preReq->getlevel()==null)
           break ;
        }
       }
      if ($c->getCoReqs() != null)
      {
        foreach ($c->getCoReqs() as $coReq)
        {
          if ($coReq->getlevel()==null)
             break;
          }
      }
        $c->setlevel(1);
        $c->calcPriority();

    }
  }



     function dispAllPriority ($courses)
    {
      foreach ($courses as $c)
      {
        echo $c->getCourseID() . "priority is ".$c->getPriority()." <br>";
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
$engr301 = new Course ("ENGR301", null, null, false);
$engr371 = new Course ("ENGR371", array($engr213, $engr233), null, false);
$engr392 = new Course ("ENGR392", array($engr201,$engr202,$encs282),null,false);
$elec275 = new Course ("ELEC275", array($phys205), array ($engr213), false);
$soen228 = new Course ("SOEN228", array($math203,$math204), null, false);
$soen287 = new Course ("SOEN287", array($comp248), null, false);
$comp232 = new Course ("COMP232", array($math203,$math204), null, false);
$comp346 = new Course ("COMP346", array ($soen228,$comp352), null, false);
$soen321 = new Course ("SOEN321", array($comp346), null, false);
$soen331 = new Course ("SOEN331", array($comp232,$comp249), null, false);
$soen341 = new Course ("SOEN341", array($comp352), array($encs282), false);
$soen342 = new Course ("SOEN342", array($soen341), null, false);
$soen343 = new Course ("SOEN343", array($soen341), array($soen342), false);
$soen344 = new Course ("SOEN344", array($soen343), null, false);
$soen345 = new Course ("SOEN345", null, array($soen343), false);
$soen357 = new Course ("SOEN357", array($soen342), null, false);
$soen384 = new Course ("SOEN384", array($encs282, $soen341), null, false);
$soen385 = new Course ("SOEN385", array($engr213,$engr233), null, false);
$soen390 = new Course ("SOEN390", null, array($soen344,$soen357), false);
$soen490_1 = new Course ("SOEN490_1", array($soen390), null, false);
$soen490_2 = new Course ("SOEN490_2", array($soen490_1), null, false);
$comp335 = new Course ("COMP335", array($comp232,$comp249), null, false);
$comp348 = new Course ("COMP348", array ($comp249), null, false);
$remainingCourses = array ($math203,$math204,$math205,$phys204,$phys205,$ewt,$comp248,$comp249,$comp352,$encs282,
$engr201,$engr202,$engr213,$engr233,$engr301,$engr371,$engr392,$elec275,$soen228,$soen287,$comp232,$comp346,$soen321,
$soen331,$soen341,$soen342,$soen343,$soen344,$soen345,$soen357,$soen384,$soen385,$soen390,$soen490_1,$soen490_2,
$comp335,$comp348);



  level0($remainingCourses);
  level1($remainingCourses);
	dispAllPriority($remainingCourses);

?>

</div>
</body>
</html>
