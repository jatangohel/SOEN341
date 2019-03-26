<?php

require_once __DIR__.'/../Databases/DBinterface/DBinterface.php';

require_once 'UserSchedule.php';

class user
{

  private $userName;
  private $email;
  private $password;
  private $userSchedule;
  private $firstSemester;

  public function __construct($userName, $email, $password, $userSchedule, $firstSemester)
  {
    $this->userName = $userName;
    $this->email = $email;
    $this->password = $password;
    $this->userSchedule = $userSchedule;
    $this->firstSemester = $firstSemester;

    //$userSched = new UserSchedule("F", $numCoursesArr, $noClassesArr);
  }

  public function getUserName ()
  {
    return $this->userName;
  }

  public function getEmail ()
  {
    return $this->email;
  }

  public function getPassword ()
  {
    return $this->password;
  }

  public function getUserSchedule()
  {
    return $this->userSchedule;
  }

  public function getFirstSemester ()
  {
    return $this->firstSemester;
  }

  public function setUserName($UserName)
  {
    $this->userName = $userName;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function setUserSchedule($userSchedule)
  {
    $this->userSchedule = $userSchedule;
  }

  public function setFirstSemester($firstSemester)
  {
    $this->firstSemester = $firstSemester;
  }



}



?>
