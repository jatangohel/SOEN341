<html>
<head>
	<style>

	#loading-image {
		margin: 0 auto;
		top: 100px;
		left: 10px;
		z-index: 100;

	}
	#loading {
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: #E8F7FF;
		position: relative;
		display:inline-block;;
		opacity: 0.7;
		z-index: 99;
		text-align: center;
	}

	h1 {
		position: absolute;
		color: rgba(0, 0, 0, .3);
		font-size: 3em;
		z-index: 999;
		margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        text-align: center;
		width:60%;


	}
	h1:before {
		content: attr(data-text);
		z-index: 1;
		text-align: center;
		position: absolute;
		overflow: hidden;
		max-width: 5em;
		white-space: nowrap;
		color: #1D1E22;
		animation: loading 2s linear;
	}
	@keyframes loading {
		0% {
			max-width: 0;
		}
	}
</style>
</head>
<body>
	
</body>
</html>
<?php
ob_start();
session_start();
?>

<?php
include '../Databases/DBinterface/config/db.php';
include '../Databases/DBinterface/DBinterface.php';
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
	if(isset($_POST['login']) || isset($_GET['login'])){
		//decryption
		if(isset($_GET['login'])){

			//for a guest user
			if(isset($_GET['LoggedInUserName']))
				$_GET['userEmail'] = 'R1VFU1Q=1';
			$_GET['userEmail']=base64_decode(substr($_GET['userEmail'], 0,-1));
		}
		//getting the login info from the HTML form
		$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail']:$_GET['userEmail'];
		$userPws = isset($_POST['userPassword']) ? $_POST['userPassword']:'temp';
		//retrieving data from the DB
		$sql = 'SELECT * FROM users WHERE Email = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$userEmail]);
		$users = $stmt->fetchAll();
		$dbUserEmail=null;
		$dbUserPws=null;
		$dbAcctAcctivated = null;
		$LoggedInUserName = null;
		//getting the user info from the DB for comparision
		foreach($users as $user){
			$dbUserEmail = $user->Email;
			$dbUserPws = $user->Password;
			$dbAcctAcctivated = $user->Activated;
			$LoggedInUserName = $user->UserName;
		}
		//since facebook has already authenticate the user's password
		if(isset($_GET['login'])){
			$dbUserPws = 'temp';
			//Setting the gust info
			if(isset($_GET['LoggedInUserName'])){
				$LoggedInUserName = $_GET['LoggedInUserName'];
				$dbUserEmail = 'GUEST';
				$dbAcctAcctivated = 1;
			}
		}
		if(!empty($userEmail) && !empty($userPws) && $dbUserEmail == $userEmail && $dbUserPws == $userPws && $dbAcctAcctivated == 1){
			$_SESSION['loggedin'] = true;
			$_SESSION['userName'] = $LoggedInUserName;
			$_SESSION['userEmail'] = $userEmail;
			$_SESSION['flagPrevPage'] = true;
			echo
			'<div id="loading">
			<img id="loading-image" src="img_loadingtrans.gif" alt="Loading..." />'.
			'<h1 data-text="'.'Logging in '.$LoggedInUserName.'">'.' Logging in '.$LoggedInUserName.'</h1>'.'</div>';

			//echo "$LoggedInUserName you're logged in!";
			if(getInputtedPassed($userEmail))
				header('Refresh: 2; URL = ../FrontEnd/Constraints.php');
			else
				header('Refresh: 2; URL = ../Generate.php');
		}
		else{
			echo "Invalid email or password has been used";
			header('Refresh: 2; URL = ../index.php');
		}
/*			echo "<br/>Activation status: ";
			if($dbAcctAcctivated == 1)
				echo "Account has been activated!";
			else
				echo "Accound has not been activated!";
*/
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
			$sql = 'INSERT INTO users(Email, Password, UserName,Activated,UserId,InputtedPassed,FirstSemester) values (?,?,?,?,?,?,?)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$userEmail, $userPws,$userName,1,$LastId,false,'R']);
			//str_replace is used to remove @ sign since it ruins the link
			$activationLink = 'activateAccount.php?conf='.$userPws.'1430'.substr($userEmail,0,3)."&userEmail=".str_replace("@","remat",$userEmail);
//			sendActivationEmail($activationLink,$userEmail);
			echo 'An activation email has been sent to you!<br/>You will be directed to the home page...';
			header('Refresh: 2; URL = ../index.php');
		}else
		echo (!empty($userEmail) && !empty($userPws)) ? "$userEmail is already registered!": "Enter your info properly!";
	}
	?>
