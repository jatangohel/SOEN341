<!DOCTYPE html>
<html>
<head>
	<title>labfun</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>

<?php

$stack=array();
require('config/db.php');

switch ($semester)
{
	case 'F':
		$table = `flab`;
		break;
	case 'W':
		$table = 'wlab';
		break;
	case 'S':
		$table = 'slab';
		break;
	default:
		$table = 'error';
}

//Create query
$query = "SELECT * FROM $table WHERE `CourseName`='$course'";

//Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free Result
mysqli_free_result($result);

//Instantiating the Fall semster
foreach($posts as $post)
{
	// WHAT is LABID?????
	$courseId = $post['LabID'];
	$courseName = $post['CourseName'];
	$lecInfo = null;
	$labSection = $post ['LabSection'];
	$semester = "F";
	//{return "F"};
	$labDay = $post ['LabDay'];
	$startLabTime= $post ['StartLabTime'];
	$endLabTime= $post ['EndLabTime'];
	$campus = "SGW";

	//Making a new session object with the course information
	$ham =  new Session($courseName,$lecInfo,$labSection,$semester,$labDay,$startLabTime,$endLabTime,$campus);

	array_push($stack, $ham);
}

mysqli_close($conn);
return $stack;

?>

</body>
</html>
