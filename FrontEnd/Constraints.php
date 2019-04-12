<?php

if (session_status() != PHP_SESSION_ACTIVE)
{
	ob_start();
	session_start();
}

echo '<link href="../css/stylec.css" rel="stylesheet"/>';
require_once 'backendInterface.php';

if(isset($_POST['check_list'])){
	foreach($_POST['check_list'] as $courseName){
		updateTakenCourses($_SESSION['userEmail'],$courseName);
	}

	updateInputtedPassed($_SESSION['userEmail']);
	updatedFirstSemester($_SESSION['userEmail'],$_POST['intake']);
}
?>
<!--The ALL option-->
<script type="text/javascript">
	function changeAllSem(){
		var selector = document.getElementById("listYear1");
    	var value = selector[selector.selectedIndex].value;
    			
    	if(value == 'ALL')
			document.getElementById("list1").selectedIndex = 0;
}
</script>

  <head>
    <title> Program Schedule </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="jquery.js"></script>

	<title>SOEN Course Stream</title>
	<style>
		table.gridtable {
			padding: 10px;
			font-weight: bold;
			text-align: left;
			font-size: 18px;
			opacity: 0.7;
			display: block;
		}
		.jumbotron {
			margin-top:8%;
			margin-left: 8%;
      margin-right: 8%;
		}
     .card {
      /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      text-align: center;
      background-color: #f1f1f1;
      */
      width: 350px;
       margin: 0 8 8 8px;
       opacity: 0.95;
    }
		.card:hover{
			 -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			-moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
		}
.row {margin: 0 -5px;}
.row:after {
  content: "";
  display: table;
  clear: both;
}
body
{
background-image: linear-gradient(to bottom, rgba(255, 255, 255,9), rgba(230, 247, 255,9)), url("concordia.jpg");
background-image: -moz-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
background-image: -o-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
background-image: -ms-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255,9)), to(rgba(230, 247, 255,9))), url(../../../../../Downloads/concordia.jpg);
background-image: -webkit-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,0)), url(concordia.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
#loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   opacity: 0.7;
   background-color: #fff;
   z-index: 99;
   text-align: center;
}

#loading-image {
  margin: 0 auto;
  top: 100px;
  left: 240px;
  z-index: 100;
}

#center-now {
    border-radius: 5px;
    width: 50%;
    margin: 0px auto;
    float: none;
}
	</style>
  </head>
 <body>
	<div class="container">
		<br />
		<br />

		<!-- <h2 align="center">Distrubte your courses for each semester (0-6 courses)</h2> -->

    	<a href="javascript:showhide('uniquename')">
    		    <div class="col text-center">
   			 <h2 type="button" class="btn btn-primary" id="centernow">Add Costraints</h2>
   			 	</div>
    	</a>

    	<div id="uniquename" style="display:none;">

		<div style="background-color:#9cd8ed"class="form-group p-3 mb-2 rounded">
      <!-- <div class="center"> -->
			<form name="add_name" id="add_name">
				<table class="table table-borderless" id="dynamic_field">
					 <tr>
						<td>
              <h2 style="color:#000000; font-size: 15px" align="left" style="color:#000000;">Choose Year</h2>
              <!-- <div class="ceter"> -->
                <select id= "listYear1" name="Years" onChange="changeAllSem();";>
                	<option value="ALL">
						<?php
							if($_SESSION['dispEng'])
								echo "ALL";
							else
								echo "ALL";
						?>
					</option>
                	<?php
                	//determine the language for ranks (first, second,..)
					$rankEn = array("First","Second","Third","Fourth","Fifth","Sixth");
					$rankFr = array("Première","Deuxième","Troisième","Quatrième","Cinqième","Sixième");
					$rank = $rankFr;
					if($_SESSION['dispEng'])
						$rank = $rankEn;

					//determine the Year language
					$yearLang = $_SESSION['dispEng']?"Year":"année";
					for($i=0;$i<$_SESSION['semYear'][sizeof($_SESSION['semYear'])-1];$i++){
						echo '<option value="'.($i+1).'"><br/>';
					    echo $rank[$i].' '.$yearLang.'<br/>';
					    echo '</option><br/>';
					}
                	?>
                </select>
              <!-- </div> -->


						</td>
						<td>
                <h2 style="font-size: 15px" align="left">Semester</h2>
              <select id = "list1" name="Term">
							<option value="ALL">
							 <?php
									if($_SESSION['dispEng'])
										echo "ALL";
									else
										echo "ALL";
								?>
							</option>
							<option value="Summer">
                <?php
									if($_SESSION['dispEng'])
										echo "Summer Term";
									else
										echo "Session d'été";
								?>
              </option>
							<option value="Fall">
                <?php
									if($_SESSION['dispEng'])
										echo "Fall Term";
									else
										echo "Session d'automne";
								?>
              </option>
							<option value="Winter">
                <?php
									if($_SESSION['dispEng'])
										echo "Winter Term";
									else
										echo "Session d'hiver";
								?>
              </option>
							</select>

						</td>
						<td><h2 style="color:#000000; font-size: 15px" align="left">Maximum Classes This Semester </h2>

              <select name="Number" id="number1">
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							</select>
						</td>
            <!-- <td>
              <p>  Minimum Credits This Semester </p> </td> -->
						<td><button type="button" name="add" id="add" class="btn btn-success" >
              <?php
								if($_SESSION['dispEng'])
									echo "Next";
								else
									echo "Suivant";
							?>
            </button></td>
					</tr>
				</table>
        <?php
          if ($_SESSION['dispEng'])
        		echo '<input type="button" class="btn btn-success btn-sm" name="submit" id="submit" value="Submit"/></p>';
        	else
        		echo '<input type="button" class="btn btn-success btn-sm" name="submit" id="submit" value="Soumettre"/></p>';
        ?>
			</form>
			<div id="result"></div>
		</div>
	</div>
	    	</div>



<div id="loading">
  <img id="loading-image" src="images/img_loading.gif" alt="Loading..." />
</div>

<div id="card" class ="container1">
</div>

<input type="button" class="btn btn-primary" onclick="window.print()" value="Print General Course Schedule"/>

<script>
$(document).ready(function(){
  $("#card").load("FrontEnd/cardsGenerator.php");
});
</script>


<script>
	//var i = 1;
	var i = 1 ;
$(document).ready(function(){
	//var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="Years" " id="listYear'+i+'" ><option value="1" selected>First Year</option><option value="2">Second Year</option><option value="3">Third Year</option><option value="4">Fourth Year</option><option value="5">Fifth Year</option><option value="6">Sixth Year</option></select></td><td><select name="Term" " id="list'+i+'"><option value="Summer" selected>Summer Term</option><option value="Fall">Fall Term</option><option value="Winter">Winter Term</option></select></td><td><select name="Credits" id="number'+i+'" ><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select><td><button type="remove" id='+i+' class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	$(document).on('click','.btn_remove',function(){
		var button_id = $(this).attr("id");
		if (button_id == i){
		i--;
		$("#row"+button_id+'').remove();
	}
	else{
		alert("Please delete from the last one.");
	}
	});

});

function getTotalTerm(){
  var z =i;
  return z;
}

function getFirstTerm(){
	firstTerm=document.getElementById("list1").value;
	return firstTerm;
}

function getSelectYearTerm(){
	var y;
	var selectYear=[];
	for (y =1; y<i+1;y++){
	selectYear1 = document.getElementById("listYear"+y).value + document.getElementById("list"+y).value;
	//selectYear [selectYear1] = document.getElementById("number"+y).value;
	selectYear.push(selectYear1);
	//console.log(selectYear);
}
return selectYear;
//console.log(selectYear);
}

function getNumberOfCourse(){
  var c;
	var courseNo=[];
	for (c=1; c<i+1;c++)
  {
	   courseNo1 = document.getElementById("number"+c).value;
		courseNo.push(courseNo1);
  }
  return courseNo;
}

$(document).ready(function(){
		var x = document.getElementById("loading");
		  x.style.display = "none";
	$('#submit').click(function(){
		 var x = document.getElementById("loading");
		  x.style.display = "block";
		$.post('FrontEnd/backendInterface.php',{
      submitID:"Submit#Courses",
			numCoursesYearTerm:getSelectYearTerm(),
			numCoursesConstrain:getNumberOfCourse()} ,
		  function(data){
			  $('#result').html(data);
        //setTimeout(window.location.reload(false), 10000) ;
        $("#card").load("FrontEnd/cardsGenerator.php");
        $('#loading').hide();
			  });
		   });
     });


</script>
<script>
	$(document).ready(function(){
		$('.card-columns').hover()
			//trigger when mouse hover
			function(){
				$(this).animate({
					marginTop: "-=1%",
				},200);
			},
			//trigger when mouse out
			function(){
				$(this).animate({
					marginTop: "0%",
				},200);
			}
		});
</script>
<script >
	     function showhide(id) {
       	var e = document.getElementById(id);
       	e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
