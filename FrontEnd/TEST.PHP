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
    <script type="text/javascript">
      console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode.parentNode;
  Array.from(e.target.parentNode.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      signupBtn.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});

signupBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode;
  Array.from(e.target.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      loginBtn.parentNode.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});
    </script>
     <script>
      @import "bourbon";

// Colors
$greenSeaweed: rgba(2, 128, 144, 1);
$blueQueen: rgba(69, 105, 144, 1);
$redFire: rgba(244, 91, 105, 1);

// Fonts
$fontAsap: 'Asap', sans-serif;

body {
  background-color: $redFire;
  font-family: $fontAsap;
}

.login {
  overflow: hidden;
  background-color: white;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  @include transform(translate(-50%, -50%));
  @include transition(transform 300ms, box-shadow 300ms);
  box-shadow: 5px 10px 10px rgba($greenSeaweed, 0.2);
  

     </script>
   </head>
   <body>
      
<form class="login">
  <input type="text" placeholder="Username">
  <input type="password" placeholder="Password">
  <button>Login</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>
   </body>
</html>