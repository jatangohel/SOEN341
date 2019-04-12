<?//php require_once __DIR__.'/../PageBuilder/header.php'; ?>

<head>
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
              <h1>
                <?php
      					     if($_SESSION['dispEng'])
      						         echo "Welcome to Concordia's Course Scheduler.";
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

          <div class="input-group" style="width:55%;  position: relative; top: 15%; left: 50%; transform: translate(-50%,-50%)">
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
            <div style="text-align: center">
            </br>
                 <a class="text-center font-weight-bold"" href="FrontEnd/usersPage.php?login=true&LoggedInUserName=GUEST">Continue as Guest</a>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                          <?php
            								if($_SESSION['dispEng'])
            									echo "Login Form";
            								else
            									echo "Formulaire De Connexion";
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
            										echo "E-mail Address";
            									else
            										echo "Adresse Courriel";
                            ?>
                          </label>
                          <div class="input-group pb-modalreglog-input-group">
                             <input type="email" name="userEmail" class="form-control" id="email" placeholder=
                             <?php
                               if($_SESSION['dispEng'])
                                 echo "E-mail Address";
                               else
                                 echo "Adresse Courriel";
                              ?>
                              required>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                         </div>
                     </div>
                     <div class="form-group">
                      <label for="password">
                        <?php
          								if($_SESSION['dispEng'])
          									echo "Password";
          								else
          									echo "Mot_de_passe";
                        ?>
                      </label>
                      <div class="input-group pb-modalreglog-input-group">
                         <input name="userPassword" type="password" class="form-control" id="pws" placeholder=
                         <?php
           								if($_SESSION['dispEng'])
           									echo "Password";
           								else
           									echo "Mot_de_passe";
                         ?>
                          required>
                         <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                     </div>
                 </div>

                <h2>
                  <span style="background:#fff;  font-size: 13px"></span>
                </h2>

                <button onclick="alert('Hello!')" class="loginBtn loginBtn--facebook" style="top: 12; left: 50%; transform: translate(-50%,-50%);">Login with Facebook</button>
             </div>
             <div class="modal-footer">
                <input name="login" value=
                  <?php
          					if($_SESSION['dispEng'])
          						echo "Login";
          					else
          						echo "Connexion";
                  ?>
                type="submit" class="btn btn-primary center-block"/>
            </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">

                </button>
                <h4 class="modal-title" id="myModalLabel">
                  <?php
      							if($_SESSION['dispEng'])
      								echo "Registration Form";
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
                     <input name="userName"  type="text" class="form-control" id="name" placeholder=
                     <?php
        							if($_SESSION['dispEng'])
        								echo "Name";
        							else
        								echo "Nom";
						         ?>
                     required>
                 </div>
             </div>
             <div class="form-group">
              <label for="email">
                <?php
      						if($_SESSION['dispEng'])
      							echo "E-mail Address";
      						else
      							echo "Adresse Couriel";
                ?>
              </label>
              <div class="input-group pb-modalreglog-input-group">
                 <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                 <input name="userEmail" type="email" class="form-control" id="inputEmail"  placeholder=
                 <?php
       						if($_SESSION['dispEng'])
       							echo "E-mail Address";
       						else
       							echo "Adresse Couriel";
                 ?>
                  required>
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
             <input name="userPassword" type="password" autocomplete = "new-password" class="form-control" id="inputPws" placeholder="Password" onkeyup="pwsLengthChecker()" required><!-- onkeyup is the only event works b/c it detects the length not (-1) like onkeydown -->
         </div>
         <p id="pwsLengthErr">

         </p>
     </div>
 </div>
 <div class="modal-footer">
    <input name="register" id="register1" type="submit" value=
      <?php
        if($_SESSION['dispEng'])
    			echo "Register";
    		else
    			echo "S'enregistrer";
      ?>
     class="btn btn-primary"/>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>



</body>
