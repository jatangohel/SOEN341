<?php

/*
require_once 'backendInterface.php';
set_time_limit(0);

$semIndex = $_GET['semIndex'];
$userSched = unserialize($_SESSION['userSched']);

$noClassesArr =  $userSched->getListOfSemesters()[$semIndex]->getTimesNoClass();
var_dump($noClassesArr);
?>

<script>
var ABCD=JSON.parse('<?php echo json_encode($userSched->getListOfSemesters()[0]->getMyLecs())?>');
console.log(ABCD[0]['day'][0]);
</script>



    //createLecNew();
/*
function createLecNew() {
  document.getElementById(title + fromTimeHour).innerHTML=(courseSection + '<br>' + "Lecture" + '<br>' + a + '&nbsp;' + "~" + '&nbsp;' + b);
  document.getElementById(title + fromTimeHour).rowSpan =(EndHour-StartHour)*4+(EndMinute-StartMinute)/15;
  document.getElementById(title + fromTimeHour).style = " color:rgb(0,0,0);background-color:rgb(102, 255, 153);text-align: center;opacity: 0.8;";


  var tempTime=parseInt(fromTimeHour);
  for (var i=1;i<document.getElementById(title + fromTimeHour).rowSpan;i++)
  {
  tempTime=tempTime+1500;
  if((tempTime%10000)%6000==0)
  tempTime=tempTime+4000;
  if(tempTime<100000)
  	document.getElementById(title+'0'+tempTime).style.display="none";
  else
  	document.getElementById(title+tempTime).style.display="none";
  }
   }
   */
?>

<html>
   <head>
    <script>
    </script>
   </head>
   <body>
 <div class="calculator__keys">
  <button class="key--operator" data-action="add">+</button>
  <button class="key--operator" data-action="subtract">-</button
  <button class="key--operator" data-action="multiply">&times;</button>
  <button class="key--operator" data-action="divide">÷</button

  <button>6</button>
  <button>1</button>
  <button>2</button>
  <button>3</button>

</div>
<form action="action_page.php">
<div class="container">
    <h1>Register</h1>
    

   

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
   </body>
</html>