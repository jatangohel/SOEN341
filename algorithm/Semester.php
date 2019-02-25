<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-TreeDepth.php</title>
</head>
<body>
  <div>
    <?php
	require __DIR__.'/../DBInterface.php';
  require 'Session.php';
  require 'Course.php';


class Semester
{
  private $name;
  private $year;
  private $numCourses;
  private $lecs;
  private $tuts;
  private $labs;

  public function __construct($name, $year, $numCourses)
  {
    $this->name = $name;
    $this->year = $year;
    $this->numCourses = $numCourses;
    $this->lecs = array ();
    $this->tuts = array ();
    $this->labs = array ();
  }

  public function getNumCourses ()
  {
    return $this->numCourses;
  }

  public function getLecs()
  {
    return $this->lecs;
  }

  public function getTuts()
  {
    return $this->tuts;
  }

  public function getLabs()
  {
    return $this->labs;
  }

  private function pc_next_permutation($p, $size) {
      // slide down the array looking for where we're smaller than the next guy
      for ($i = $size - 1; $i>=0 and $p[$i] >= $p[$i+1]; --$i) { }

      // if this doesn't occur, we've finished our permutations
      // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1)
      if ($i == -1) { return false; }

      // slide down the array looking for a bigger number than what we found before
      for ($j = $size; $p[$j] <= $p[$i]; --$j) { }

      // swap them
      $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp;

      // now reverse the elements in between by swapping the ends
      for (++$i, $j = $size; $i < $j; ++$i, --$j) {
           $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp;
      }

      return $p;
  }

  private function permutations($elements)
  {
    $set = $elements;
    $size = count($set) - 1;
    $perm = range(0, $size);
    $j = 0;

    do {
         foreach ($perm as $i) { $perms[$j][] = $set[$i]; }
    } while ($perm = $this->pc_next_permutation($perm, $size) and ++$j);

    return $perms;
  }

  //$tempPermittedCourses will be an array of strings which represent course names.
  //return vector of (vector lectures, vector tutorials, vector labs)
  private function semesterScheduling ($tempPermittedCourses)
  {

    //This vector will hold vectors, first will be containing all the chosen lectures
    //then the tutorials then the labs.
    $addedCourses = array ();
    //This will hold all the added lectures after the loops
    $addedLecs = array ();
    //This will hold all the added tutorials after the loops
    $addedTuts = array();
    //This will hold all the added labs after the loops
    $addedLabs = array();

    array_push($addedCourses, $addedLecs , $addedTuts , $addedLabs);


    //We have how many courses the student wants + the importance of $courses
    // We pick the ex.  4 most important courses (depth wise)
    //Most important course is first in the array

      foreach ($tempPermittedCourses as $c)
      {
          // Reset chosen lec, tut, and lab
          $chosenLecSec = null;
          $chosentTutSec = null;
          $chosenLabSec = null;

          //Choose from the array the most important course
          $lecSections = getLectureSections($c);

          // For debugging
          //foreach ($lecSections as $key)
          //  echo $key->dispInfo();
          foreach ($lecSections as $lecS )
          {
              // Run Conflict checker for lectures
              foreach ($addedCourses as $allC)
              {
                foreach ($allC as $sessC)
                {
                  if(conflictExists($lecS, $sessC))
                    continue 3;
                }
              }
              $chosenLecSec = $lecS;

              $tutSections = getTutorials($lecS->getCourseName(), $lecS->getSection());
              if($tutSections != null)
              {
                foreach ($tutSections as $tutS)
                {
                  // Run Conflict Checker for tutorials
                    foreach ($addedCourses as $allC)
                    {
                      foreach ($allC as $sessC)
                      {
                        // For debugging
                        /*
                        echo "Comparing";
                        $sessC->dispInfo();
                        echo "and ";
                        $tutS->dispInfo();
                        */
                        if(conflictExists($tutS, $sessC))
                          continue 3;
                      }
                    }
                    $chosentTutSec = $tutS;
                    break;
                 }
               }

              $labSections = getLabs($lecS->getCourseName());
              if($labSections != null)
              {
                foreach ($labSections as $labS)
                {
                    // Run Conflict Checker for labs
                    foreach ($addedCourses as $allC)
                    {

                      foreach ($allC as $sessC)
                      {
                        // For debugging
                        /*echo "Comparing";
                        $sessC->dispInfo();
                        echo "and ";
                        $labS->dispInfo();
                        */
                        if(conflictExists($labS, $sessC))
                          continue 3;
                      }
                    }
                    $chosenLabSec = $labS;
                    break;
                 }
               }
          }

          // Push to the schedule only if all the required lectures, turorials,
          // and labs that the course requires were selected

          // Case that the course has lectures and tutorials but no labs
          if ($lecSections != null and $tutSections != null and $labSections == null)
          {
            // Push to the schedule if the required lecture and tutorials were chosen
            if ($chosenLecSec != null and $chosentTutSec != null)
            {
              array_push($addedCourses[0], $chosenLecSec);
              array_push($addedCourses[1], $chosentTutSec);
            }
          }
          // Case that the course has lectures, tutorials, and labs
          elseif ($lecSections != null and $tutSections != null and $labSections != null)
          {
            // Push to the schedule if the required lecture, tutorial, and lab were chosen
            if ($chosenLecSec != null and $chosentTutSec != null and $chosenLabSec != null)
            {
              array_push($addedCourses[0], $chosenLecSec);
              array_push($addedCourses[1], $chosentTutSec);
              array_push($addedCourses[2], $chosenLabSec);
            }
          }
          // Case that the course has lectures only
          elseif ($lecSections != null and $tutSections == null and $labSections == null)
          {
            // Push to the schedule if the required lecture was chosen
            if ($chosenLecSec != null)
            {
              array_push($addedCourses[0], $chosenLecSec);
            }
          }
      }

      return $addedCourses;
  }

  public function semesterGenerator($permittedCourses)
  {
    $courseCounter = $this->numCourses+1;
    $numReturnedCourses = 0;
    //Choose the first $numOfCourses to run semesterConflictChecker;
    $tempPermittedCourses = array_slice($permittedCourses, 0, $this->numCourses);

    $returnedCourses = $this->semesterScheduling ($tempPermittedCourses);

    $numReturnedCourses = count($returnedCourses[0]);

    if ($numReturnedCourses < $this->numCourses)
    {
      $permPermittedCourses = $this->permutations($tempPermittedCourses);

      for ($i=1; $numReturnedCourses < $this->numCourses and $i<count ($permPermittedCourses); $i++)
      {
        $returnedCourses = $this->semesterScheduling ($permPermittedCourses[$i]);
        $numReturnedCourses = count($returnedCourses[0]);
      }
    }
    //Check if numReturnedCourses are less than $numOfCourses
    while($numReturnedCourses < $this->numCourses)
    {
      //If yes, then change one of the courses in the array and try again.
      //The change should be based on which course the loop exited at
      //If returned courses are 2 then the problem is with the 3rd one,
      //If 3 then the problem is with the 4th one.(check for if one is returned as well).
      if($tempPermittedCourses[$numReturnedCourses+1] != null && $permittedCourses[$courseCounter] != null)
      {
        $tempPermittedCourses [$numReturnedCourses+1]= $permittedCourses[$courseCounter];
        $courseCounter++;
      }
      $returnedCourses = $this->semesterScheduling ($tempPermittedCourses);
      $numReturnedCourses = count($returnedCourses);
    }

    //If returned courses are equal to $numOfCourses then successfuly added all courses.
    $this->lecs=$returnedCourses[0];
    $this->tuts=$returnedCourses[1];
    $this->labs=$returnedCourses[2];
  }

}





    ?>
  </div>
</body>
</html>
