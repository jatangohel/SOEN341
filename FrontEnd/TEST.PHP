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
const calculator = document.querySelector('.calculator')
// ...
keys.addEventListener('click', e => {
  if (e.target.matches('button')) {
    // ...
    if (
      action === 'add' ||
      action === 'subtract' ||
      action === 'multiply' ||
      action === 'divide'
    ) {
      key.classList.add('is-depressed')
      // Add custom attribute
      calculator.dataset.previousKeyType = 'operator'
    }
  }
})
const previousKeyType = calculator.dataset.previousKeyType
if (!action) {
  if (displayedNum === '0' || previousKeyType === 'operator') {
    display.textContent = keyContent
  } else {
    display.textContent = displayedNum + keyContent
  }
}

Let’s Make A JavaScript Calculator
Go to the profile of Ethan Ryan
Ethan Ryan
Dec 19, 2017

google image result for search term: “calculator funny”
I know what you’re thinking: how come Ethan Ryan hasn’t blogged about making a JavaScript calculator yet?

Well here you go, you unbelievably specific hypothetical internet reader.

Getting Started
First, let’s start with our HTML and CSS. Thanks to CSS grid, we can get a nice calculator shape on the page quickly. Calculator shape? Ooh la la! As the French nerds would say.

I’m gonna model my calculator on the calculator on my iPhone:


iPhone calculator, 8:14pm
I’m gonna call that top row one row, so six rows total. Four columns across.

Round One
Here’s my HTML:

<div class="container">
  <div class="item item-header">header header header header</div>
  <div class="item item-main-1">main main main main</div>
  <div class="item item-main-2">main main main main</div>
  <div class="item item-main-3">main main main main</div>
  <div class="item item-main-4">main main main main</div>
  <div class="item item-footer">footer footer footer footer</div>
</div>
And here’s my CSS:

.container {
  display: grid;
  justify-content: center;
  grid-template-columns: 50px 50px 50px 50px;
  grid-template-rows: auto;
  grid-template-areas: 
  "header header header header" 
  "main main main main" 
  "main main main main" 
  "main main main main" 
  "main main main main" 
  "footer footer footer footer";
}
.item-header {
  grid-area: header;
}
.item-footer {
  grid-area: footer;
}
    </script>
   </head>
   <body>
 <div class="calculator__keys">
  <button class="key--operator" data-action="add">+</button>
  <button class="key--operator" data-action="subtract">-</button
  <button class="key--operator" data-action="multiply">&times;</button>
  <button class="key--operator" data-action="divide">÷</button
  <button>7</button>
  <button>8</button>
  <button>9</button>
  <button>4</button>
  <button>5</button>
  <button>6</button>
  <button>1</button>
  <button>2</button>
  <button>3</button>
  <button>0</button>
  <button data-action="decimal">.</button>
  <button data-action="clear">AC</button>
  <button class="key--equal" data-action="calculate">=</button>
</div>
   </body>
</html>