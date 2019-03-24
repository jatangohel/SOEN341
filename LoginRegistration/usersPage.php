


<?php


/*
	$path='PHPMailer\examples\EmailSender.php';
	require $path;
	*/
	function sendActivationEmail($activationLink,$userEmail){
		// the message
		$msg = "Welcome Sequence Builder...<br/>If you registered in the coolest website ever *SEQUENCE BUILDER*, click the following link to activate your account <br/> $activationLink <br/>Otherwise, ignore our email please!";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail($userEmail,"Activation Email",$msg);
		
	}
	
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

	
	//login a user
	if(isset($_POST['login'])){
		
		//getting the login info from the HTML form
		$userEmail = $_POST['userEmail'];
		$userPws = $_POST['userPassword'];

		//retrieving data from the DB
		$sql = 'SELECT * FROM users WHERE Email = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();
		
		$dbUserEmail=null;
		$dbUserPws=null;
		$dbAcctAcctivated = null;
		
		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->Email;
			$dbUserPws = $user->Password;
			$dbAcctAcctivated = $user->Activated;
		}

		
		if(!empty($userEmail) && !empty($userPws) && $dbUserEmail == $userEmail && $dbUserPws == $userPws && $dbAcctAcctivated == 1)
			echo "you're logged in!";
		else
			echo "Wrong email or password has been used";
			echo "<br/>Activation status: ";
			if($dbAcctAcctivated == 1)
				echo "Account has been activated!";
			else
				echo "Accound has not been activated!";
	}
	
	
	
	//Register new user
	if(isset($_POST['register'])){

		$LastId = 0;

		//find the last userId
		$sql = 'SELECT * FROM users';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([]);
		$tt = $stmt->fetchAll();
		foreach($tt as $t){
			$LastId++;
		}

		if($LastId > 0)
			$LastId++;

		//getting the login info from the HTML form
		$userName = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userPws = $_POST['userPassword'];
		
/*		echo $userName.'<br/>';
		echo $userEmail.'<br/>';
		echo $userPws;
*/

		//retrieving data from the DB
		$sql = 'SELECT * FROM users WHERE Email = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();
		
		$dbUserEmail = null;
	
		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->Email;
		}
		
//		echo '<br/>if state bool: '.($dbUserEmail == null && !empty($userEmail) && !empty($userPws)).'<br/>';

		//no similar useremail exist in the DB and the user didn't leave his info empty
		if($dbUserEmail == null && !empty($userEmail) && !empty($userPws)){
			$sql = 'INSERT INTO users(Email, Password, UserName,Activated,UserId) values (?,?,?,?,?)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$userEmail, $userPws,$userName,1,$LastId]);
			
			//str_replace is used to remove @ sign since it ruins the link
			$activationLink = 'activateAccount.php?conf='.$userPws.'1430'.substr($userEmail,0,3)."&userEmail=".str_replace("@","remat",$userEmail);
//			sendActivationEmail($activationLink,$userEmail);
			echo 'An activation email has been sent to you!';
		}else
			echo (!empty($userEmail) && !empty($userPws)) ? "$userEmail is already registered!": "Enter your info properly!";
		
		
	}
?>