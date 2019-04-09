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
		animation: loading 2.2s linear;
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

	//echo $_SESSION['userName'];
	//echo ", you've successfully logged out";
	echo
			'<div id="loading">
			<img id="loading-image" src="img_loadingtrans.gif" alt="Loading..." />'.
			'<h1 data-text="'.'Logging out..'.'">'.' Logging out..'.'</h1>'.'</div>';
	session_destroy();
	header('Refresh: 2; URL = ../index.php');


?>