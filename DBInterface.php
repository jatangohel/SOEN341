<?php

//Returns an array of Sessions objects for the sections of a specific given course
//$course is of type string, it represents the name of the course.
function getLectureSections($course)
{
  if ($course == "COMP232")
  {
    $comp232_L2 = new Session (2,"COMP232", "PP", null, "F", array("T"), 1745, 2015, "SGW");

    $sec = array ($comp232_L2);
    return  $sec;
  }
  elseif ($course == "COMP248")
  {
    /////////////////////
    $comp248_L1 = new Session (3,"COMP248", "EE", null, "F", array("J"), 1745, 2015, "SGW");

    ////////////////////////
    $comp248_L2 = new Session (3,"COMP248", "P", null, "F", array("M","W"), 1315, 1430, "SGW");

    $sec = array ($comp248_L1, $comp248_L2);
    return  $sec;
  }
}

//Returns an array of Sessions objects available tutorials for this specific lecture
//$lecture and $section are of type string, lecture name and section.
function getTutorials($lecture, $section)
{

}

//Returns an array of Sessions objects for available labs for this specific lecture
function getLabs($lecture)
{

}

//Returns an array of Courses objects this user can take this semester from the remaining courses array of courses
function getPermittedCourses($user, $remainingCourses,  $semester)
{

}

//Returns an array of Courses objects for all the courses that the user did not take yet
function getUntakenCourses($user)
{

}

//Updates the database by changing the status of the courses recently taken
function updateTakenCourses($passedCourses)
{

}



?>
