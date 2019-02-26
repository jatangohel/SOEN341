<?php 
//create connection
$conn = mysqli_connect('localhost','root','root','course');
//check connection
if(mysqli_connect_errno()){
	//connection Failed
	echo 'Failed to connect'.mysqli_connect_errno();

}

 ?>