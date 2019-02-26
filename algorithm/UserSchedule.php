<?php

$semesters = array("F", "W", "S");
$firstSem = "F";     // Input obtained from user

function genProgramSched ($user)
{
  // Obtain untaken courses by the user
  $untakenCourses = getUntakenCourses($user);

  // Update the priority of all courses unfinished
  updateAllPriority($untakenCourses);

  // Sort the array based on their priorities
  $sortedCourses = heap_sort($untakenCourses);

  // Get the key for first semester in the array of semesters
  $currentSemKey = array_search($firstSem, $semesters);

  while (count($sortedCourses) != 0)
  {
    // Get the permitted courses to be taken this semester
    $permittedCourses = getPermittedCourses ($user, $sortedCourses, $semesters[$currentSemKey]);

    // Sort the array based on their priority

    
    semesterGenerator($permittedCourses);
  }
}

?>
