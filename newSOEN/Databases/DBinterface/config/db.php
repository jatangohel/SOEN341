<?php
//ini_set('max_execution_time', 1000);

//create connection
$conn = mysqli_connect('localhost','root','','sequencebuilder');
//check connection
if(mysqli_connect_errno()){
	//connection Failed
	echo 'Failed to connect'.mysqli_connect_errno();

}


 ?>
