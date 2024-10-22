<?php

require_once __DIR__.'/../Databases/DBinterface/DBinterface.php';
require_once 'Session.php';
require_once 'Course.php';
require_once 'Semester.php';
require_once 'heapSort.php';
require_once 'user.php';

$DEFAULT_COURSES_PER_SEM = 4;
$semesters = array("Winter", "Summer","Fall");


class UserSchedule
{
private $listOfSemesters; // Array of semesters
private $coursesPerSemArr;   // Input obtained from user (int)
private $noClassesArr;

public function __construct($numCourses,$noClassesArr)
{
//  $this->firstSem = $fSem;
  $this->listOfSemesters = array ();
  $this->coursesPerSemArr = $numCourses;
  $this->noClassesArr= $noClassesArr;

}

public function getListOfSemesters ()
{
  return $this->listOfSemesters;
}



public function dispUserSchedule()
{
  foreach ($this->listOfSemesters as $sem)
  {
    echo "YEAR ";
    echo $sem->getYear();
    echo "----- SEMESTER  ";
    echo $sem->getName();
    echo "<br>";
    $sem->dispSemester();
    echo '<br> <br>';
  }
}

public function genProgramSched ($user)
{
  global $DEFAULT_COURSES_PER_SEM;
  global $createdCourses;
  global $semesters;

  // Obtain untaken courses by the user
  if ($user->getUserName() == "GUEST")
  {
    if (!empty($_POST['check_list']))
      $untakenCourses = getUntakenCoursesFrontEnd($_POST['check_list']);
    else
      $untakenCourses = getUntakenCoursesFrontEnd(array());
  }
  else
    $untakenCourses = getUntakenCourses($user->getEmail());

  // Get the key for first semester in the array of semesters
  $currentSemKey = array_search($user->getFirstSemester(), $semesters);
  $currentYear = 1;
  $flag=false;

  while (count($untakenCourses) != 0)
  {
    $semCode = $currentYear.$semesters[$currentSemKey]; //used in coursesPerSem array as an index

    // Update the priority of all courses unfinished
    updateAllPriority($untakenCourses);

    //var_dump($untakenCourses);

    // Get the permitted courses to be taken this semester
    $permittedCourses = getPermittedCourses ($untakenCourses, $semesters[$currentSemKey]);

    $noClasses= array_key_exists($semCode,$this->noClassesArr) ? $this->noClassesArr[$semCode] : null;
    // Generate a schedule for a semester
    $sem = new Semester ($semesters[$currentSemKey], $currentYear, array_key_exists($semCode,$this->coursesPerSemArr) ? $this->coursesPerSemArr[$semCode]:$DEFAULT_COURSES_PER_SEM, $noClasses);
    $sem->semesterGenerator($permittedCourses);

    //var_dump($sem);

    // DEBUG:: Use when you wish to see the scheduling of the final semesters
    /*
    if ($permittedCourses == null or $flag)
    {
      echo ("!!!!!!!!!!!!!!!!!!!!!!!!!UNTAKEN COURSES!!!!!!!!!!!!!!!!!!!!!!!!! <br>");
      var_dump($untakenCourses);
      echo ("!!!!!!!!!!!!!!!!!!!!!!!!!Permitted COURSES!!!!!!!!!!!!!!!!!!!!!!!!! <br>");

      var_dump($permittedCourses);
      var_dump($sem);
      $flag = true;
    }
    */

    $this->listOfSemesters[]= $sem;

    // Exclude the taken courses from the untaken array
    foreach ($sem->getLecs() as $taken)
    {
      $course = $taken->getCourse();
      $courseName = $course->getCourseName();
      $createdCourses[$courseName]->setPass(true);
      deleteCourse($courseName, $untakenCourses);
    }

    // Increment year if the current semester was fall
    if ($semesters[$currentSemKey] == "Fall")
      $currentYear++;

    // Increment semester
    ++$currentSemKey;
    $currentSemKey %= 3;
  }
}
}

?>
