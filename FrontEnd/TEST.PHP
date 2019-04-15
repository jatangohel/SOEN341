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
       @import url(https://fonts.googleapis.com/css?family=Droid+Sans:700);

        /* counters */

        body {
          counter-reset: pages;
        }

        a {
          counter-increment: pages;
        }

        a::before {
          content: counter(pages);
        }

        /* the rest is just to make things pretty */

        body {
          margin: 32px;
          font: 700 32px/1 'Droid Sans', sans-serif;
          color: #fff;
          background-color: #3f4b58;
        }

        h1 {
          margin: 0 0 32px;
          font-size: 48px;
        }

        h2 {
          margin: 0 0 8px 8px;
          font-size: inherit;
        }

        section {
          margin-bottom: 16px;
          padding: 16px;
          border-radius: 4px;
          overflow: hidden;
          background-color: rgba(255, 255, 255, .1);
        }
     </script>
   </head>
   <body>
      
    <h1>Pagination CSS Counter</h1>
    <section>
      <h2>Jump to page:</h2>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
    </section>
   </body>
</html>