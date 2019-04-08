<?php
if (session_status() != PHP_SESSION_ACTIVE)
{
  ob_start();
  session_start();
}

	echo $_SESSION['userName'];

	if($_SESSION['dispEng'])
		echo "You have been successfully logged out.";
	else
		echo "Vous avez été déconnecté avec succès.";

	session_destroy();
	header('Refresh: 2; URL = ../index.php');


?>
