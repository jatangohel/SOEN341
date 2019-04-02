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
              <h1>Welcome to Concordia Course Scheduler.</h1>
          </div>

      </div>
  </div>

  <!-- Login And SignUp Modal - START -->
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <br><br><br><br><br><br><br><br>
            <p class="text-center">
              Please Login if you have your credentails or Kindly Register yourself.
          </p>

          <div class="input-group">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target= "#myModal">Login</button>
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">Register</button>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                        <h4 class="modal-title" id="myModalLabel">Login form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- login form -->
                    <form action="FrontEnd/usersPage.php" method="POST">
                     <div class="modal-body">

                       <div class="form-group">
                          <label for="email">Email address</label>
                          <div class="input-group pb-modalreglog-input-group">
                             <input type="email" name="userEmail" class="form-control" id="email" placeholder="Email" required>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                         </div>
                     </div>
                     <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group pb-modalreglog-input-group">
                         <input name="userPassword" type="password" class="form-control" id="pws" placeholder="Password" required>
                         <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                     </div>
                 </div>

             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input name="login" value="Login "type="submit" class="btn btn-primary"/>
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
                <h4 class="modal-title" id="myModalLabel">Registration form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Register form -->
            <form class="pb-modalreglog-form-reg" action="FrontEnd/usersPage.php" method="POST">
             <div class="modal-body">

               <div class="form-group">
                  <div id="pb-modalreglog-progressbar"></div>
              </div>
              <div class="form-group">
                  <label for="Name">Name</label>
                  <div class="input-group pb-modalreglog-input-group">
                     <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                     <input name="userName" type="text" class="form-control" id="name" placeholder="Name" required>
                 </div>
             </div>
             <div class="form-group">
              <label for="email">Email address</label>
              <div class="input-group pb-modalreglog-input-group">
                 <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                 <input name="userEmail" type="email" class="form-control" id="inputEmail" placeholder="Email" required>
             </div>
         </div>
         <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group pb-modalreglog-input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input name="userPassword" type="password" class="form-control" id="inputPws" placeholder="Password" onkeyup="pwsLengthChecker()" required><!-- onkeyup is the only event works b/c it detects the length not (-1) like onkeydown -->
         </div>
         <p id="pwsLengthErr">

         </p>
     </div>
 </div>
 <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input name="register" id="register1" type="submit" value="Register" class="btn btn-primary"/>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>





</body>
