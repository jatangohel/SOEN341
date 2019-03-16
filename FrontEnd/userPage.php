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
		$sql = 'SELECT * FROM users WHERE userEmail = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();

		$dbUserEmail=null;
		$dbUserPws=null;

		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->UserEmail;
			$dbUserPws = $user->UserPassword;
		}

		if(!empty($userEmail) && !empty($userPws) && $dbUserEmail == $userEmail && $dbUserPws == $userPws)
			echo "you're logged in!";
		else
			echo "Wrong email or password has been used";
	}



	//Register new user
	if(isset($_POST['register'])){
		//getting the login info from the HTML form
		$userName = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userPws = $_POST['userPassword'];


		//retrieving data from the DB
		$sql = 'SELECT * FROM users WHERE userEmail = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();

		$dbUserEmail = null;

		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->UserEmail;
		}

		//no similar useremail exist in the DB and the user didn't leave his info empty
		if($dbUserEmail == null && !empty($userEmail) && !empty($userPws)){
			$sql = 'INSERT INTO users(UserEmail, UserPassword, Name,Activated) values (?,?,?,?)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$userEmail, $userPws,$userName,0]);

			//str_replace is used to remove @ sign since it ruins the link
			$activationLink = 'activateAccount.php?conf='.$userPws.'1430'.substr($userEmail,0,3)."&userEmail=".str_replace("@","remat",$userEmail);
			sendActivationEmail($activationLink,$userEmail);
			echo 'An activation email has been sent to you!';
		}else
			echo (!empty($userEmail) && !empty($userPws)) ? "$userEmail is already registered!": "Enter your info properly!";


	}
?>
