<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<?php
		session_start();
		$_SESSION['dispEng']='0';
	?>
    <title>
		<?php
			if ($_SESSION['dispEng'])
				echo "SOEN 341 - Course Scheduler";
			else
				echo "SOEN 341 - Planificateur de cours";
		?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/pwsChecker.js"></script>
    <style> 
     
        /* Button end */
        
        
        
        /* Typing effect CSS Ends */
        
          
        .typewriter{
display: flex;
  justify-content: center;
        }       
        
.typewriter h1 {

    
  color: #3A3A3A;
  font-family: monospace;
  overflow: hidden;
  border-right: .15em solid orange;
  white-space:nowrap;
  margin: 0 auto;
  letter-spacing: .15em;
  animation: 
    typing 3.5s steps(45, end),
    blink-caret .5s step-end infinite;
}
   
       @media screen and (max-width: 475px) {
            .typewriter h1{
            white-space:nowrap;
        }        }
/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 85% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange }
}
     
        
        /* Typing effect CSS Ends */
            
        
    tr{
        background-color:white;
        color:black;
    }
    
    .radio_buttons {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: rgb(45, 45, 45);
        color:white;
    }
        
        
    body
  {
      
    background-image: linear-gradient(to bottom, rgba(255, 255, 255,9), rgba(230, 247, 255,9)), url("concordia.jpg");
    background-image: -moz-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
    background-image: -o-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
    background-image: -ms-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255,9)), to(rgba(230, 247, 255,9))), url(../../../../../Downloads/concordia.jpg);
    background-image: -webkit-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,0)), url(../concordia.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
        }
        
        
        
        .pb-modalreglog-container
    {
        margin-top: 100px;
    }

    .pb-modalreglog-legend
    {
        text-align: center;
    }

    .pb-modalreglog-input-group
    {
        margin: auto;
    }

    .pb-modalreglog-submit
    {
       
        margin-left: 30%;
    }

    .pb-modalreglog-form-reg
    {
        text-align: center;
    }

    .pb-modalreglog-footer p
    {
        text-align: center;
        margin-top: 20px;
    }

    #pb-modalreglog-progressbar
    {
        border-radius: 2px;
    }
        
        
    </style>
    
     <script>
    $(function () {
        var progress = $("#pb-modalreglog-progressbar").shieldProgressBar({
            value: 0
        }).swidget();

        $('#inputEmail').change(function () {
            if ($('#inputEmail').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputPws').change(function () {
            if ($('#inputPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputConfirmPws').change(function () {
            if ($('#inputConfirmPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#countries').change(function () {
            if ($('#countries').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#age').change(function () {
            if ($('#age').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#ch').change(function () {
            if ($('input[name="chs"]:checked').length > 0) {
                progress.value(progress.value() + 25);
            } else {
                progress.value(progress.value() - 25);
            }
        });

        $("#age").shieldMaskedTextBox({
            enabled: true,
            mask: "00/00/0000",
            value: "19/03/1032"
        });
    })
</script>
    
</head>
<body>
<!-- NAVBAR -->
    
     
    <nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<span class="navbar-toggler-icon"></span>
		
		
		</button>
		 <a class="navbar-brand" href="index.html"><img src="../images/University-of-Concordia.gif" width="130px"></a>
		<span class="navbar-text"></span>
		<div class="collapse navbar-collapse" id="collapse_target">
		
		
	
		<ul class="navbar-nav">

<!--
			<li class="nav-item">
				<a class="nav-link" href="#">Profile </a>
			</li>
-->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<?php
					if($_SESSION['dispEng'])
						echo "About Us";
					else
						echo "À propos";
					?>
				</a>
			</li>	
            
            <li class="nav-item">
				<a class="nav-link" href="#">
					<?php
					if($_SESSION['dispEng'])
						echo "Privacy Policy";
					else
						echo "Politique de confidentialité";
					?>
				</a>
			</li>
            
            <li class="nav-item">
				<a class="nav-link" href="#">
					<?php
					if($_SESSION['dispEng'])
						echo "Terms & Conditions";
					else
						echo "Termes & conditions";
					?>
				</a>
			</li>
		</ul>
		</div>
	</nav>
    
    
    <!-- NAVBAR ENDS -->
<div class="container">
<div class="page-header">
    <br><br><br>
	<div class="typewriter">
	<h1>
		<?php
			if($_SESSION['dispEng'])
				echo "Welcome to the Concordia University Course Scheduler.";
			else
				echo "Bienvenue au planificateur de cours de l'université Concordia";
		?>
	</h1>
</div>
   
</div>
    </div>
<!-- Login And SignUp Modal - START -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <br><br><br><br><br><br><br><br>
            <p class="text-center">
				<?php
					if($_SESSION['dispEng'])
						echo "Please Login if you have an account or kindly register";
					else
						echo "Veuillez vous connecter si vous avez un accompte ou vous inscrire";
				?>
            </p>
            
            <div class="input-group">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target= "#myModal">
					<?php
					if($_SESSION['dispEng'])
						echo "Login";
					else
						echo "Connexion";
					?>
				</button>
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">
					<?php
					if($_SESSION['dispEng'])
						echo "Register";
					else
						echo "S'inscrire";
					?>
				</button>
            </div>
            
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
								<?php
								if($_SESSION['dispEng'])
									echo "Login form";
								else
									echo "Formulaire de connexion";
								?>
							</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
						<!-- login form -->
						<form action="usersPage.php" method="POST">
							<div class="modal-body">
								
									<div class="form-group">
										<label for="email">
											<?php
												if($_SESSION['dispEng'])
													echo "E-mail address";
												else
													echo "Adresse courriel";
											?>
										</label>
										<div class="input-group pb-modalreglog-input-group">
											<?php
												if($_SESSION['dispEng'])
													$emailHolder="E-mail";
												else
													$emailHolder="Courriel";
											?>
											<input type="email" name="userEmail" class="form-control" id="email" placeholder=<?= $emailHolder?> required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
										</div>
									</div>
									<div class="form-group">
										<label for="password">
											<?php
												if($_SESSION['dispEng'])
													echo "Password";
												else
													echo "Mot de passe";
											?>
										</label>
										<div class="input-group pb-modalreglog-input-group">
											<?php
												if($_SESSION['dispEng'])
													$passwordHolder="Password";
												else
													$passwordHolder="Mot_de_passe";
											?>
											<input name="userPassword" type="password" class="form-control" id="pws" placeholder=<?= $passwordHolder?> required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
										</div>
									</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">
									<?php
									if($_SESSION['dispEng'])
										echo "Close";
									else
										echo "Fermer";
									?>
								</button>
								<?php
									if($_SESSION['dispEng'])
										$loginHolder="Login";
									else
										$loginHolder="Connexion";
								?>
								<input name="login" value=<?= $loginHolder?> type="submit" class="btn btn-primary"/>
							</div>
						</form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
								<?php
									if($_SESSION['dispEng'])
										echo "Registration form";
									else
										echo "Formulaire d'inscription";
								?>
							</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
						<!-- Register form -->
						<form class="pb-modalreglog-form-reg" action="usersPage.php" method="POST">
							<div class="modal-body">
								
									<div class="form-group">
										<div id="pb-modalreglog-progressbar"></div>
									</div>
									<div class="form-group">
										<label for="Name">
											<?php
												if($_SESSION['dispEng'])
													echo "Name";
												else
													echo "Nom";
											?>
										</label>
										<div class="input-group pb-modalreglog-input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											<?php
												if($_SESSION['dispEng'])
													$nameHolder="Name";
												else
													$nameHolder="Nom";
											?>
											<input name="userName" type="text" class="form-control" id="name" placeholder=<?= $nameHolder?> required>
										</div>
									</div>
									<div class="form-group">
										<label for="email">
											<?php
												if($_SESSION['dispEng'])
													echo "E-mail address";
												else
													echo "Adresse couriel";
											?>
										</label>
										<div class="input-group pb-modalreglog-input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											<input name="userEmail" type="email" class="form-control" id="inputEmail" placeholder=<?= $emailHolder?> required>
										</div>
									</div>
									<div class="form-group">
										<label for="password">
											<?php
												if($_SESSION['dispEng'])
													echo "Password";
												else
													echo "Mot de passe";
											?>
										</label>
										<div class="input-group pb-modalreglog-input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
											<input name="userPassword" type="password" class="form-control" id="inputPws" placeholder=<?= $passwordHolder?> onkeyup="pwsLengthChecker()" required><!-- onkeyup is the only event works b/c it detects the length not (-1) like onkeydown -->
										</div>
										<p id="pwsLengthErr">
											
										</p>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">
									<?php
									if($_SESSION['dispEng'])
										echo "Close";
									else
										echo "Fermer";
									?>
								</button>
								<?php
									if($_SESSION['dispEng'])
										$registerHolder="Register";
									else
										$registerHolder="S'enregistrer";
								?>
								<input name="register" id="register1" type="submit" value=<?= $registerHolder?> class="btn btn-primary"/>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    

    <footer class="page-footer font-small blue pt-4">
    
    <div class="navbar navbar-inverse bg-dark fixed-bottom">
		<div class="navbar-text text-white pull-left">
			<p>
				<?php
					if($_SESSION['dispEng'])
						echo "© Copyright Error404 Team";
					else
						echo "© Copyright Équipe Error404";
				?>
			</p>
		</div>
		<div class="navbar-text text-success text-center">
			<p>
				<?php
					if($_SESSION['dispEng'])
						echo "SOEN 341 - Winter 2019";
					else
						echo "SOEN 341 - Hiver 2019";
				?>
			</p>
		</div>
		<div class="navbar-text pull-right">
		<a href="https://github.com/jatangohel" target="_blank">Visit our OpenSource <i class="fab fa-github"></i></a>
		</div>
	</div>
    
    </footer>
    
</body>  
</html>