for ($i =0;$i<count($userSched->getListOfSemesters());$i++){

	$semInfo[$i]= array (array());
	//$semInfo[1]= array (array());
	//$semInfo[2]= array (array());
	$userSched->getListOfSemesters()[$i]->getYear();

	foreach ($userSched->getListOfSemesters()[$i]->getLecs() as $lec)
	{
	  $courseInfo = array();
	  $courseInfo['Course Name'] = $lec->getCourseName();
	  $courseInfo['Credits'] = 3;
	  array_push($semInfo[$i],$courseInfo);
	}
	$semInfo[$i] = array_slice($semInfo[$i],1);

	$_SESSION['semInfo'] = $semInfo;

	//var_dump($_SESSION);


}
