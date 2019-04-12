<?php
class Session
{
  private $course;    // Course Object
  private $section;     // String
  private $subSection;  // String
  private $semester;    // String ("Fall"or"Winter"or"Summer")
  private $days;        // array of strings ("M","T","W","J","F")
  private $startTime;   // int
  private $endTime;     // int
  private $campus;      // String

  public function __construct($course, $section, $subSection,
                              $semester, $days, $startTime, $endTime, $campus)
  {
    $this->course = $course;
    $this->section = $section;
    $this->subSection = $subSection;
    $this->semester = $semester;
    $this->days = $days;
    $this->startTime = $startTime;
    $this->endTime = $endTime;
    $this->campus = $campus;
  }

  public function getCourse()
  {
    return $this->course;
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
  public function objectToArray(){
    return array(
      'courseName'=>$this->getCourse()->getCourseName(),
      'section'=>$this->getSection(),
      'subsection'=>$this->getSubSection(),
      'startTime'=>$this->getStartTime(),
      'endTime'=>$this->getEndTime(),
      'day'=>$this->getDays()
    );
  }
  public function noClassobjectToArray(){
    return array(
      'courseName'=>"noClass",
      'section'=>$this->getSection(),
      'subsection'=>$this->getSubSection(),
      'startTime'=>$this->getStartTime(),
      'endTime'=>$this->getEndTime(),
      'day'=>$this->getDays()
    );
  }
  public function dispInfo ()
  {
    echo "Course name: " . $this->getCourseName() . " section: " . $this->getSection()  .
    " Subsection: " . $this->getSubSection() . " time: ". $this->getStartTime() . " to ". $this->getEndTime() .
    " Dates: ";
   foreach($this->getDays() as $d)
     echo $d . ", ";

    echo "<br>";
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
?>
