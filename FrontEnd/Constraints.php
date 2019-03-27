
<?php

require_once __DIR__.'/../PageBuilder/header.php';
require_once 'backendInterface.php';

//just printing the stuffs
if(!empty($_POST['check_list'])){
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}}

function cardDisp($i)
{
  $semInfoFE = $_SESSION ['semInfo'];
  echo 	'<div class="card card-body bg-danger text-center height:400px">' .
    '<p> Minimum Credits This Semester'.
      '<input type="number" min="0" max="18" id="credits1"/> &nbsp;&nbsp;<input type="button" class="btn btn-success btn-sm" name="btncredits3" id="btncredits3" value="submit"/></p>' .
      '<table class="gridtable" id="table3" border="0"onclick=window.location.href="file:///X:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.html">'.
         '<thead>'.
          '<tr class="tableheader">'.
            '<th>Semester';  echo $i;
            echo ' </th>'.
          '</tr>'.
        '</thead>'.
        '<tbody>'.
          '<tbody class="labels">'.
            '<tr>'.
              '<td colspan="2">'.
                '<label>Course Name</label>'.
                '<label>Credits</label>'.
              '</td>'.
            '</tr>'.
          '<tr>';

          if (!empty($semInfoFE[$i]))
            echo implode('</th><th>', array_keys(current($semInfoFE[$i])));
          echo '</tr>'.
      '</thead>'.
        '<tbody>';
           foreach ($semInfoFE[$i] as $row): array_map('htmlentities', $row);
            echo'<tr>'.
              '<td>'; echo implode('</td><td>', $row);

              echo '</td>'.
            '</tr>';
           endforeach;
        echo '</tbody>'.
      '</table>'.
    '</div>';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <!--	    Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  -->

<!-- 		Font awesome
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="jquery.js"></script> -->

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
		}

		.card:hover{
			-webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			-moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
		}

	</style>
  </head>
 <body>
	<div class="container">
		<br />
		<br />

		<h2 align="center">Distrubte your courses for each semester (0-6 courses)</h2>

		<div class="form-group">
			<form name="add_name" id="add_name">
				<table class="table table-bordered" id="dynamic_field">
					 <tr>
						<td><select id= "listYear1",name="Years" >
							<option value="1" selected>First Year</option>
							<option value="2">Second Year</option>
							<option value="3">Third Year</option>
							<option value="4">Fourth Year</option>
							<option value="5">Fifth Year</option>
							<option value="6">Sixth Year</option>
							</select>

						</td>
						<td><select id = "list1",name="Term">
							<option value="S" selected>Summer Term</option>
							<option value="F">Fall Term</option>
							<option value="W">Winter Term</option>
							</select>

						</td>
						<td><select name="Number" id="number1">
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							</select>
						</td>
						<td><button type="button" name="add" id="add" class="btn btn-success">Next</button></td>
					</tr>
				</table>
				<input type="button" class="btn btn-primary" name="submit" id="submit" value="submit"/>
			</form>
			<div id="result"></div>
		</div>
	</div>


	<div id="card"  class="jumbotron jumbotron-fluid">
				<h2 align="center"class="header margin-top:0px">General Course Schedule</h2>
		<br />
		<div  class="card-columns">


<?php
for ($i = 0; $i < count ($_SESSION['semInfo']); $i++)
  cardDisp($i);
 ?>








		</div>
	</div>

<?php session_end(); ?>

<!--
		Fall					Winter
		COMP 232	3.00		COMP 232	3.00
		COMP 248	3.50		COMP 248	3.50
		ENGR 201	1.50		ENGR 201	1.50
		ENGR 213	3.00		ENGR 213	3.00
								SOEN 228	4.00
		COMP 249	3.50
		ENGR 233	3.00		COMP 249	3.50
		SOEN 228	4.00		ENGR 202	1.50
		SOEN 287	3.00		ENGR 233	3.00
								SOEN 287	3.00
		COMP 348	3.00
		COMP 352	3.00		COMP 348	3.00
		ENCS 282	3.00		COMP 352	3.00
		ENGR 202	1.50		ELEC 275	3.50
								ENCS 282	3.00
		COMP 346	4.00
		ELEC 275	3.50		COMP 346	4.00
		ENGR 371	3.50
		SOEN 331	3.00
		SOEN 341	3.00

		COMP 335	3.00
		ENGR 391	3.00
		SOEN 342	3.00
		SOEN 343	3.00
		SOEN 384	3.00

		SOEN 344	3.00
		SOEN 345 	3.00
		SOEN 357	3.00
		SOEN 390	3.00

		ENGR 301	3.00
		SOEN 321	3.00
		SOEN 490	4.00

		ENGR 392	3.00
		SOEN 385	3.00
		SOEN 490	4.00
-->


<script>
	//var i = 1;
	var i = 1 ;
$(document).ready(function(){
	//var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="Years" " id="listYear'+i+'" ><option value="1" selected>First Year</option><option value="2">Second Year</option><option value="3">Third Year</option><option value="4">Fourth Year</option><option value="5">Fifth Year</option><option value="6">Sixth Year</option></select></td><td><select name="Term" " id="list'+i+'"><option value="S" selected>Summer Term</option><option value="F">Fall Term</option><option value="W">Winter Term</option></select></td><td><select name="Credits" id="number'+i+'" ><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td><td><button type="remove" id='+i+' class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	$(document).on('click','.btn_remove',function(){
		var button_id = $(this).attr("id");
		if (button_id == i){
		i--;
		$("#row"+button_id+'').remove();
	}
	else{
		alert("Please delet from the last one.");

	}
	});

	$('#submit').click(function(){
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
});

				function reload(){
    var container = document.getElementById("card");
    var content = container.innerHTML;
    container.innerHTML= content;

    //setTimeout(function(){

    	//})
   //this line is to watch the result in console , you can remove it later
    //console.log(content);
}


                        function getTotalTerm(){
                        	var z =i;
                        	return z;
                        	//console.log(z);
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
									for (c=1; c<i+1;c++){
									courseNo1 = document.getElementById("number"+c).value;
									courseNo.push(courseNo1);
                           }
                           return courseNo;
                          // console.log(courseNo);
                         }

  $(document).ready(function(){
					$('#submit').click(function(){
						$.post('backendInterface.php',{
              submitID:"Submit #Courses",
							numCoursesYearTerm:getSelectYearTerm(),
							numCoursesConstrain:getNumberOfCourse()} ,
		            function(data){

			  $('#result').html(data);
        setTimeout(window.location.reload(false), 10000) ;

			  console.log(data);

			  });

		       });
						//getSelectYearTerm();
						//getNumberOfCourse();
						//reload();


					});S
				/*
				$('#submit').click(function(){
						$.POST('backendInterface.php',{
							numCoursesTerm:getSelectYearTerm(),
							numCoursesConstrain:getNumberOfCourse()} ,
		            success:(function(data)){
		            	 someFunction( data );
                   return data;

			 // $('#result').html(data);
			  return (data);
			  	},
			  	error:(function()){
			  		alert('Error');
			  	});
			  });

	 $('#submit').click(function(){
		$.ajax({
        type: "POST",
        url: 'backendInterface.php',
        data: ({numCoursesTerm:getSelectYearTerm(),numCoursesConstrain:getNumberOfCourse()}),
        success: function(data) {
                // Call this function on success
            someFunction( data );
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
});
*/
			function someFunction( data ) {

				console.log(data);
			}



						//getSelectYearTerm();
						//getNumberOfCourse();
						//reload();



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
