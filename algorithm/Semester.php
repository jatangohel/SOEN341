<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-TreeDepth.php</title>
</head>
<body>
  <div>
    <?php


class Semester
{
  private $name;
  private $year;
  private $numCourses;
  private $timesNoClass; //Array of Sessions objects
  private $lecs;
  private $tuts;
  private $labs;

  public function __construct($name, $year, $numCourses,$timesNoClass)
  {
    $this->name = $name;
    $this->year = $year;
    $this->numCourses = $numCourses;
    $this->timesNoClass = $timesNoClass;
    $this->lecs = array ();
    $this->tuts = array ();
    $this->labs = array ();
  }

  public function getName ()
  {
    return $this->name;
  }

  public function getYear ()
  {
    return $this->year;
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

  public function getTimesNoClass()
  {
    return $this->getTimesNoClass;
  }

  public function dispSemester()
  {
    echo "Chosen Lecture Sections <br>";
    foreach ($this->getLecs() as $lec)
        echo $lec->dispInfo();

    echo "<br>";

    echo "Chosen Tutorial Sections <br>";
    foreach ($this->getTuts() as $tut)
        echo $tut->dispInfo();

    echo "<br>";

    echo "Chosen lab Sections <br>";
    foreach ($this->getLabs() as $lab)
        echo $lab->dispInfo();
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

  private function combinations($array,$k){
    $results = array(array( ));
    foreach ($array as $element){
      foreach ($results as $combination)
      {
        if (count($combination) < $k)
          array_push($results, array_merge(array($element), $combination));
      }
    }

    $temp = array();

    foreach ($results as $r)
    {
      if (count($r) == $k)
        array_push($temp, $r);
    }

    return $temp;
  }

  private function combination_sort(&$combination){
    foreach ($combination as $key => $courses){
      $temp=0;
      foreach($courses as $c){
        $temp=$temp+$c->getPriority();
      }
      $key=$temp;
    }

    ksort($combination);
    var_dump($combination);

    // To remove the keys
    $combination=array_values($combination);
  }
  //$tempPermittedCourses will be an array of strings which represent course names.
  //return vector of (vector lectures, vector tutorials, vector labs)
  private function semesterScheduling ($tempPermittedCourses)
  {

    //This array will hold arrays, first will be containing all the chosen lectures
    //then the tutorials then the labs.
    $addedCourses = array ();

    $addedCourses["Lecs"] = array ();
    $addedCourses["Tuts"] = array ();
    $addedCourses["Labs"] = array ();


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
          $lecSections = getLectureSections($c->getCourseName(), $this->name);

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
                if($this->timesNoClass != null)
                {
                  foreach($this->timesNoClass as $tnc)
                  {
                    if (conflictExists($lecS,$tnc))
                      continue 3;
                  }
                }
              }
              $chosenLecSec = $lecS;

              $tutSections = getTutorialSection($lecS->getCourseName(), $this->name, $lecS->getSection());
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
                      if($this->timesNoClass != null)
                      {
                        foreach ($this->timesNoClass as $tnc)
                        {
                          if (conflictExists($tutS,$tnc))
                            continue 3;
                        }
                      }
                    }
                    $chosentTutSec = $tutS;
                    break;
                 }
               }

              $labSections = getLabSection($lecS->getCourseName(), $this->name);
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
                      if($this->timesNoClass != null)
                      {
                        foreach($this->timesNoClass as $tnc)
                        {
                          if (conflictExists($labS,$tnc))
                            continue 3;
                        }
                      }
                    }
                    $chosenLabSec = $labS;
                    break;
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
                   array_push($addedCourses["Lecs"], $chosenLecSec);
                   array_push($addedCourses["Tuts"], $chosentTutSec);

                   // Proceed to scheduling of second course
                   continue 2;
                 }
               }
               // Case that the course has lectures, tutorials, and labs
               elseif ($lecSections != null and $tutSections != null and $labSections != null)
               {
                 // Push to the schedule if the required lecture, tutorial, and lab were chosen
                 if ($chosenLecSec != null and $chosentTutSec != null and $chosenLabSec != null)
                 {
                   array_push($addedCourses["Lecs"], $chosenLecSec);
                   array_push($addedCourses["Tuts"], $chosentTutSec);
                   array_push($addedCourses["Labs"], $chosenLabSec);

                   // Proceed to scheduling of second course
                   continue 2;
                 }
               }
               // Case that the course has lectures only
               elseif ($lecSections != null and $tutSections == null and $labSections == null)
               {
                 // Push to the schedule if the required lecture was chosen
                 if ($chosenLecSec != null)
                 {
                   array_push($addedCourses["Lecs"], $chosenLecSec);

                   // Proceed to scheduling of second course
                   continue 2;
                 }
               }
               // Case that the course has lectures and labs but no tutorials
               elseif ($lecSections != null and $tutSections == null and $labSections != null)
               {
                 // Push to the schedule if the required lecture was chosen
                 if ($chosenLecSec != null and $chosenLabSec!=null)
                 {
                   array_push($addedCourses["Lecs"], $chosenLecSec);
                   array_push($addedCourses["Labs"], $chosenLabSec);

                   // Proceed to scheduling of second course
                   continue 2;
                 }
               }
          }
      }

      return $addedCourses;
  }

  public function semesterGenerator($permittedCourses)
  {
    $SUCCESSFUL = 1;
    $FAILED_NUM_CREDITS = -1;

    $status = $SUCCESSFUL;

    // Handle the case where there are no allowd courses to be taken in a semester by returning immediately
    if ($permittedCourses == null)
      return;
    // Handle the case when the number of permitted courses to be taken in a semester is less than what is desired
    elseif(count($permittedCourses)<$this->numCourses)
      $this->numCourses = count($permittedCourses);

    $numReturnedCourses = 0;

    // Generate all possible combinations of $permittedCourses
    $combsArray = $this->combinations($permittedCourses, $this->numCourses);

    // Eliminate the combinations that don't satisfy coReq
    $combsArray = coReqsSatisfiedCombs($combsArray);

    //Check the credits requirement with tolerance of 1 credit

    // Sort the combinations based on sum of priority
    $this->combination_sort($combsArray);

    var_dump($combsArray);

    global $returnedCourses;

    for ($i=0; $numReturnedCourses < $this->numCourses and $i<count($combsArray); $i++)
    {
      //echo ("Hello from the other side $i <br>");
      $returnedCourses = $this->semesterScheduling ($combsArray[$i]);

      $numReturnedCourses = count($returnedCourses["Lecs"]);

      if ($numReturnedCourses < $this->numCourses)
      {
        $permPermittedCourses = $this->permutations($combsArray[$i]);

        for ($j=1; $numReturnedCourses < $this->numCourses and $j<count ($permPermittedCourses); $j++)
        {
          //echo ("Hey again $j <br>");

          $returnedCourses = $this->semesterScheduling ($permPermittedCourses[$j]);
          $numReturnedCourses = count($returnedCourses["Lecs"]);
        }
      }
    }
    //If returned courses are equal to $numOfCourses then successfuly added all courses.
    $this->lecs=$returnedCourses["Lecs"];
    $this->tuts=$returnedCourses["Tuts"];
    $this->labs=$returnedCourses["Labs"];

    return $status;
  }

}





    ?>
  </div>
</body>
</html>
