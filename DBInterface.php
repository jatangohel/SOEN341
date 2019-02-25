<?php

//Returns an array of Sessions objects for the sections of a specific given course
//$course is of type string, it represents the name of the course.

function getLectureSections($course)
{
  if ($course == "COMP232")
  {
    $comp232_L1 = new Session (2,"COMP232", "PS", null, "F", array("M"), 1745, 2015, "SGW");
    $comp232_L2 = new Session (2,"COMP232", "PP", null, "F", array("J"), 1745, 2015, "SGW");
    $sec = array ($comp232_L1, $comp232_L2);
    return  $sec;
  }
  elseif ($course == "COMP248")
  {
    /////////////////////
    $comp248_L1 = new Session (3,"COMP248", "EE", null, "F", array("T","J"), 545, 615, "SGW");
    ////////////////////////X
    //$comp248_L2 = new Session (3,"COMP248", "P", null, "F", array("T","W"), 1745, 2015, "SGW");
    $sec = array ($comp248_L1);
    return  $sec;
  }
  elseif ($course == "ENGR213")
  {
    /////////////////////
    $ENGR213_L1 = new Session (4,"ENGR213", "U", null, "F", array("W","F"), 545, 615, "SGW");
    $sec = array ($ENGR213_L1);
    return  $sec;
  }
}

//Returns an array of Sessions objects available tutorials for this specific lecture
//$lecture and $section are of type string, lecture name and section.
function getTutorials($course, $section)
{
  if ($course == "COMP232" and $section == "PP")
  {
    $comp232_T1 = new Session (2,"COMP232", $section, "PA", "F", array("T"), 1745, 2015, "SGW");

    $sec = array ($comp232_T1);
    return  $sec;
  }
  elseif ($course == "COMP232" and $section == "PS") {
    $comp232_T2 = new Session (2,"COMP232", $section, "SA", "F", array("S"), 2030, 2130, "SGW");
    $sec = array ($comp232_T2);
    return  $sec;
  }
  elseif ($course == "COMP248" and $section == "EE")
  {

    $comp248_T1 = new Session (3,"COMP248", $section, "EA", "F", array("J"), 1745, 2015, "SGW");
    $comp248_T2 = new Session (3,"COMP248", $section, "EB", "F", array("J"), 2030, 2130, "SGW");

    $sec = array ($comp248_T1,$comp248_T2);
    return  $sec;
  }
  elseif ($course == "ENGR213" and $section == "U")
  {

    $engr213_T1 = new Session (3,"ENGR213", $section, "EA", "F", array("F"), 1745, 2015, "SGW");
    $engr213_T2 = new Session (3,"ENGR213", $section, "EB", "F", array("J"), 2030, 2130, "SGW");

    $sec = array ($engr213_T1,$engr213_T2);
    return  $sec;
  }
}

//Returns an array of Sessions objects for available labs for this specific lecture
function getLabs($course)
{
  if ($course == "COMP232")
  {
    $comp232_Lab1 = new Session (2,"COMP232", "PQ", null, "F", array("T"), 1745, 2015, "SGW");
    $comp232_Lab2 = new Session (2,"COMP232", "PZ", null, "F", array("W"), 1745, 2015, "SGW");

    $sec = array ($comp232_Lab1,$comp232_Lab2);
    return  $sec;
  }
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
