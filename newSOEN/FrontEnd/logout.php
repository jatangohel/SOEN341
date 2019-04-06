<?php
	ob_start();
   session_start();
?>
<?php

	echo $_SESSION['userName'];
	echo ", you've successfully logged out";
	
	session_destroy();
	header('Refresh: 2; URL = ../index.php');


?>