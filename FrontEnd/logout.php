<?php
	ob_start();
   session_start();
?>
<?php

	echo $_SESSION['userName'];
		<?php
			if($_SESSION['dispEng'])
				echo "You have been successfully logged out.";
			else
				echo "Vous avez été déconnecté avec succès.";
		?>
	
	session_destroy();
	header('Refresh: 2; URL = ../index.php');


?>