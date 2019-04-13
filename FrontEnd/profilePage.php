<?php
if (session_status() != PHP_SESSION_ACTIVE)
{
  ob_start();
  session_start();
}
?>

<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width">
   <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<title>
  <?php
		if($_SESSION['dispEng'])
			echo "Profile page";
		else
			echo "Profil";
	?>
</title>
  <style>


   .radio_buttons {
       padding-top: 20px;
       padding-bottom: 20px;
       background-color: rgb(45, 45, 45);
       color:white;
   }
   body
  {
    font-size: 14px !important;
  background-image: linear-gradient(to bottom, rgba(255, 255, 255,9), rgba(230, 247, 255,9)), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
background-image: -moz-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
background-image: -o-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
background-image: -ms-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255,9)),to(rgba(230, 247, 255,9))), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
background-image: -webkit-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,0)), url("https://i.postimg.cc/Dy2MrhcH/imageedit-2-3996552053.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  }

  .infobox{
      height: 700px;
      color: #000;
      opacity: 0.80;
      top: 20%;
      left: 50%;
      right: 50%;
      transform: translate(-50%,-50%)
      box-sizing: border-box;
      padding: 70px 30px;


  }

  .center {
  display: block;
  margin-left: -30%;
  margin-right: auto;
  color: #000;
}

h1{

  font-size: 22px;
  color: #000;

}

.middle {
display: block;
margin-left: -60%;
margin-right: auto;
color: #000;
}

.infobox input{
  width: 80%;
  margin-bottom: 20px;
  margin-left: 20px;
  color: #000;
}

.infobox input[type="text"], input[type="Email"], input[type="password"], input[type="password"]
{
  border: none;
  border-bottom: 1px solid #000;
  background: transparent;
  outline: none;
  height: 40px;
}

tr{
    background-color:white;
    color:black;
}
table.gridtable {
width: 750px;

margin:50px auto;
}

table.gridtable th {
background: #3498db;
color: white;
font-weight: bold;
}

table.gridtable td, th {
padding: 10px;
border: 1px solid #ccc;
text-align: center;
font-size: 18px;
}

.labels tr td{
cursor:pointer;
background-color: rgba(128, 191, 255);
font-weight: bold;
color: #fff;
}

.label tr td label{
display: block;
}

.dropdown-menu{
background-color: #00b38f;
opacity:0.96;
}


  </style>

  </head>
  <body>
<center>
<div class="infobox">
  <h1>
    <?php
			if($_SESSION['dispEng'])
				echo "Your Profile";
			else
				echo "Votre Profil";
    ?>
  </h1>
      <form>
          <br>
          <p>
            <?php
      				if($_SESSION['dispEng'])
      					echo "Username";
      				else
      					echo "Nom d'utilisateur";
      			?>
          </p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Change";
      					else
      						echo "Changer";
      				?>
              </button>
              <ul class="dropdown-menu">
                <input id="newUserName" type="text" name="" placeholder="New Username" ><br>
                <input id="changeUserNameButton" type="button" class="btn btn-success btn-sm"style="color:#FFFFFF; float:right; margin-right:20px;" value="Submit"/>
              </ul>
            </div>

          <br><br>

          <p>Current Email Address</p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Change";
      					else
      						echo "Changer";
      				?>
              </button>
              <ul class="dropdown-menu">
                <input id="newEmail" type="text" name="" placeholder="New Email" ><br>
                <input id="changeEmailButton" type="button" class="btn btn-success btn-sm"style="color:#FFFFFF; float:right; margin-right:20px;" value="Submit"/>
              </ul>
            </div>
<br><br>


          <p>Password</p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Change";
      					else
      						echo "Changer";
      				?>
              </button>
              <ul class="dropdown-menu">
                <input type="text" name="" placeholder="New Password" ><br>
                <input id="newPassword" type="text" name="" placeholder="Confirm Password"s ><br>
                <input id="changePasswordButton" type="button" class="btn btn-success btn-sm"style="color:#FFFFFF; float:right; margin-right:20px;" value="Submit"/>
              </ul>
            </div>
<br><br><br><br>

            </button>

        </div>

     </form>
      </div>
<br><br>
    </center>

	<br><br><br><br><br>


  </body>
  <html>

  <script>
  $(document).ready(function(){
  	$('#changeUserNameButton').click(function(){
  		$.post('FrontEnd/backendInterface.php',{
        submitID:"SubmitNewUserName",
        oldUserName:"<?php echo $_SESSION['userName'];?>",
  			newUserName:document.getElementById("newUserName").value},
      function(data){
        location.reload(false);
      });
  		   });
       });

   $(document).ready(function(){
   	$('#changeEmailButton').click(function(){
   		$.post('FrontEnd/backendInterface.php',{
         submitID:"SubmitNewEmail",
         newEmail:document.getElementById("newEmail").value,
         userName:"<?php echo $_SESSION['userName'];?>"
   			 });
   		   });
        });

    $(document).ready(function(){
    	$('#changePasswordButton').click(function(){
    		$.post('FrontEnd/backendInterface.php',{
          submitID:"SubmitNewPassword",
          newPassword:document.getElementById("newPassword").value,
          userName:"<?php echo $_SESSION['userName'];?>"
    			 });
    		   });
         });
  </script>
