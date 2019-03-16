<?php
		$activationCode = $_GET['conf'];
		$userEmail = str_replace("remat","@",$_GET['userEmail']);
		
		//db info
		$dbServerName = 'localhost';
		$dbUserName = 'root';
		$dbPassword = 'root';
		$dbName = 'sequencebuilder';
		
		//set DSN
		$dsn = 'mysql:host='.$dbServerName.';dbname='.$dbName;
		
		//create a PDO instance
		$pdo = new PDO($dsn,$dbUserName,$dbPassword);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		//retrieving data from the DB
		$sql = "SELECT * FROM users WHERE Email = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();
		
		$dbUserEmail=null;
		$dbUserPws=null;
		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->Email;
			$dbUserPws = $user->Password;
		}
		echo '<br/>DB Email: '.$dbUserEmail.'<br/>DB Password: '.$dbUserPws;
		$dbActivationAccount = $dbUserPws.'1430'.substr($dbUserEmail,0,3);
		
		if($dbActivationAccount == $activationCode && !empty($dbActivationAccount) && !empty($activationCode)){
			
			$sql = "UPDATE users SET Activated=1 WHERE Email = ?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$userEmail]);
			
			echo 'Your account has been activated. Welcome on-board!'; 
		}else{
			echo 'Yo get a life sucker!';
			
		}

?>
