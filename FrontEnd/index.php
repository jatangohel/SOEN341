<?php require_once __DIR__.'/../PageBuilder/header.php'; ?>


<head>
	<?php
		session_start();
		$_SESSION['dispEng']='0';
	?>
   <script>
    function pwsLengthChecker(){
        //length of the password
        pwsLength = document.getElementById("inputPws").value.length;

        if(pwsLength < 8){
            document.getElementById("register1").disabled = true;
            document.getElementById("pwsLengthErr").innerHTML = "Your password must be eight or more characters!";
            document.getElementById("pwsLengthErr").setAttribute("style", "color: red;");
        } else{ //an else clause must exist. Otherwise, a warnning message will always be displayed
            document.getElementById("register1").disabled = false;
            document.getElementById("pwsLengthErr").innerHTML = "";
        }
    }

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
    <!-- page setup -->
    <div class="container">
        <div class="page-header">
            <br><br><br>
            <div class="typewriter">
				<?php
					if($_SESSION['dispEng'])
						echo "Welcome to the Concordia University Course Scheduler.";
					else
						echo "Bienvenue au planificateur de cours de l'université Concordia";
				?>
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
                    <form action="FrontEnd/usersPage.php" method="POST">
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
									$passwordHolder="Password";
								else
									$passwordHolder="Mot_de_passe";
							?>
						</label>
                      <div class="input-group pb-modalreglog-input-group">
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
            <form class="pb-modalreglog-form-reg" action="FrontEnd/usersPage.php" method="POST">
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





</body>
