<?php

//Returns an array of the sections of a specific given course
//$course is of type string, it represents the name of the course.
function getLectureSections($course)
{
  if ($course == "COMP232")
  {
    $comp232_L2 =   new Lecture (2,"COMP232", "PP", 1745, 2015, array("T"),
    "F", null, null, true, false, 3);
    $sec = array ($comp232_L2);
    return  $sec;
  }
  elseif ($course == "COMP248")
  {
    /////////////////////
        $comp248_L1 = new Lecture (3,"COMP248", "EE", 1745, 2015, array("J"),
        "F", null, null, true, false, 3);
    ////////////////////////
        $comp248_L2 = new Lecture (3,"COMP248", "P", 1315, 1430, array("M","W"),
        "F", null, null, true, false, 3);

        $sec = array ($comp248_L1, $comp248_L2);
        return  $sec;
  }
}

//Returns an array of available tutorials for this specific lecture
//$lecture and $section are of type string, lecture name and section.
function getTutorials($lecture, $section)
{

}

//Returns an array of available labss for this specific lecture
function getLabs($lecture)
{

}

//Returns an array of courses this user can take this semester
function getPermittedCourses($user, $semester)
{

}


//Updates the database byy changing the status of the courses recently taken
function updateTakenCourses($passedCourses)
{

}



?>
