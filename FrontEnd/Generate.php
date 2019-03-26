<?php
   ob_start();
   
   if(!isset($_SESSION))
   	session_start();
?>
<?php
	if(!isset($_SESSION['loggedin'])){
		echo "Login please!";
		header('Refresh: 2; URL = ../index.php');
	}

?>
<html lang="en">
  <head>
   <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	 <title>SOEN Course Stream</title>
<style>

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
    background-image: -webkit-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,0)), url(concordia.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
  }

/*


    body {
    background:
    linear-gradient(
        rgba(255, 255, 255,9),
      rgba(230, 247, 255,0)),url(../../../../../Downloads/concordia.jpg);

        background-repeat: no-repeat;
        background-size: cover;

}

*/


/*
    body{
        background-image: url(../../../../../Downloads/concordia.jpg);
    }
*/

	table.gridtable {
		width: 750px;

		margin:50px auto;
	}

	table.gridtable th {
		background: #3498db;
		color: white;
		font-weight: bold;
	}

	table.gridtable td, th {
		padding: 10px;
		border: 1px solid #ccc;
		text-align: center;
		font-size: 18px;
	}

	.labels tr td{
		cursor:pointer;
		background-color: rgba(128, 191, 255);
		font-weight: bold;
		color: #fff;
	}

	.label tr td label{
		display: block;
	}





</style>
</head>

<body>

<!--
    <nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<span class="navbar-toggler-icon"></span>


		</button>

		<span class="navbar-text">CourseSequence</span>
		<div class="collapse navbar-collapse" id="collapse_target">



		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
					Dropdown
					<span class="caret"></span>
				</a>
			<div class="dropdown-menu" aria-labelledby="dropdown_target">
				<ul class="navbar-nav">
				<a class="dropdown-item">Item 1</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item">Item 2</a>
				<a class="dropdown-item">Item 3</a>
				<a class="dropdown-item">Item 4</a>
				</ul>
			</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link 2 </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Profile </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About Us </a>
			</li>
		</ul>
		</div>
	</nav>
-->



	<div class="container" id="container">
        <form id="generatecourse" action="formAction.php" method="POST">
		<table class="gridtable" id="tableMain" border="0">
			<thead>
				<tr class="tableheader">
					<th>Course Name</th>
					<th>Pass To Check</th>
				</tr>
			</thead>
			<tbody>


				<tbody class="labels" data-toggle="collapse" data-target="#data_1" aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="Physics">Physics &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
<!--                              <input type="checkbox" id="PHYS204" name="PHYS204" value="PHYS204">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_1">

					<tr>
                        <td>PHYS 204</td>
                        <td>
                       <label for="PHYS204">PASS</label>&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" id="PHYS204" name="PHYS204" value="PHYS204">
                        </td>
                    </tr>

					<tr><td>PHYS 205</td><td><label for="PHYS205">PASS</label>&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="PHYS205" name="PHYS205" value="PHYS205"></td></tr>
				</tbody>




				<tbody class="labels" data-toggle="collapse" href="#data_2"  aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="Mathmatics">Mathmatics &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_2">
					<tr><td>MATH 203</td><td> <label for="MATH203">PASS</label>&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="MATH203" name="MATH203" value="MATH203"> </td></tr>
					<tr><td>MATH 204</td><td> <label for="MATH204">PASS</label>&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="MATH204" name="MATH204" value="MATH204"> </td></tr>
					<tr><td>MATH 205</td><td> <label for="MATH205">PASS</label>&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="MATH205" name="MATH205" value="MATH205"> </td></tr>
				</tbody>



				<tbody class="labels" data-toggle="collapse" href="#data_3"  aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="Electrics">Electrics &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
<!--							<input type="checkbox" name="Electrics" id="Electrics" data-toggle="toggle">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_3">
					<tr class="hide"><td>ELEC 275</td><td> <label for="ELEC275">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ELEC275" name="ELEC275" value="ELEC275"> </td></tr>
				</tbody>







				<tbody class="labels" data-toggle="collapse" href="#data_4"  aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="ENCS">Engineering and Computer Science&nbsp;&nbsp;&nbsp;<i class="fas fa fa-angle-down"></i></label>
<!--							<input type="checkbox" name="ENCS" id="ENCS" data-toggle="toggle">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_4">
					<tr class="hide"><td>ENCS 282</td><td> <label for="ENCS282">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENCS282" name="ENCS282" value="ENCS282"> </td></tr>
				</tbody>



				<tbody class="labels" data-toggle="collapse" data-target="#data_5" aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="Engineering">Engineering &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
<!--							<input type="checkbox" name="Engineering" id="Engineering" data-toggle="toggle">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_5">
					<tr class="hide"><td>ENGR 201</td><td> <label for="ENGR201">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR201" name="ENGR201" value="ENGR201"> </td></tr>
					<tr class="hide"><td>ENGR 202</td><td> <label for="ENGR202">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR202" name="ENGR202" value="ENGR202"> </td></tr>
					<tr class="hide"><td>ENGR 213</td><td> <label for="ENGR213">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR213" name="ENGR213" value="ENGR213"> </td></tr>
					<tr class="hide"><td>ENGR 233</td><td> <label for="ENGR233">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR233" name="ENGR233" value="ENGR233"> </td></tr>
					<tr class="hide"><td>ENGR 301</td><td> <label for="ENGR301">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR301" name="ENGR301" value="ENGR301"> </td></tr>
					<tr class="hide"><td>ENGR 371</td><td> <label for="ENGR371">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="ENGR371" name="ENGR371" value="ENGR371"> </td></tr>
				</tbody>

				<tbody class="labels" data-toggle="collapse" data-target="#data_6" aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="Computer">Computer &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
<!--							<input type="checkbox" name="Computer" id="Computer" data-toggle="toggle">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_6">
					<tr class="hide"><td>COMP 232</td><td> <label for="COMP232">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP232" name="COMP232" value="COMP232"> </td></tr>
					<tr class="hide"><td>COMP 248</td><td> <label for="COMP248">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP248" name="COMP248" value="COMP248"> </td></tr>
					<tr class="hide"><td>COMP 249</td><td> <label for="COMP249">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP249" name="COMP249" value="COMP249"> </td></tr>
					<tr class="hide"><td>COMP 335</td><td> <label for="COMP335">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP335" name="COMP335" value="COMP335"> </td></tr>
					<tr class="hide"><td>COMP 346</td><td> <label for="COMP346">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP346" name="COMP346" value="COMP346"> </td></tr>
					<tr class="hide"><td>COMP 348</td><td> <label for="COMP348">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP348" name="COMP348" value="COMP348"> </td></tr>
					<tr class="hide"><td>COMP 352</td><td> <label for="COMP352">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="COMP352" name="COMP352" value="COMP352"> </td></tr>
				</tbody>

				<tbody class="labels" data-toggle="collapse" data-target="#data_7" aria-expanded="true">
					<tr>
						<td colspan="2">
							<label for="SOEN">Software Engineering &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i></label>
<!--							<input type="checkbox" name="SOEN" id="SOEN" data-toggle="toggle">-->
						</td>
					</tr>
				</tbody>
				<tbody class="collapse" id="data_7">
					<tr class="hide"><td>SOEN 228</td><td> <label for="SOEN228">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN228" name="SOEN228" value="SOEN228"> </td></tr>
					<tr class="hide"><td>SOEN 287</td><td> <label for="SOEN287">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN287" name="SOEN287" value="SOEN287"> </td></tr>
					<tr class="hide"><td>SOEN 321</td><td> <label for="SOEN321">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN321" name="SOEN321" value="SOEN321"> </td></tr>
					<tr class="hide"><td>SOEN 331</td><td> <label for="SOEN331">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN331" name="SOEN331" value="SOEN331"> </td></tr>
					<tr class="hide"><td>SOEN 341</td><td> <label for="SOEN341">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN341" name="SOEN341" value="SOEN341"> </td></tr>
					<tr class="hide"><td>SOEN 342</td><td> <label for="SOEN342">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN342" name="SOEN342" value="SOEN342"> </td></tr>
					<tr class="hide"><td>SOEN 343</td><td> <label for="SOEN343">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN343" name="SOEN343" value="SOEN343"> </td></tr>
					<tr class="hide"><td>SOEN 344</td><td> <label for="SOEN344">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN344" name="SOEN344" value="SOEN344"> </td></tr>
					<tr class="hide"><td>SOEN 345</td><td> <label for="SOEN345">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN345" name="SOEN345" value="SOEN345"> </td></tr>
					<tr class="hide"><td>SOEN 357</td><td> <label for="SOEN357">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN357" name="SOEN357" value="SOEN357"> </td></tr>
					<tr class="hide"><td>SOEN 384</td><td> <label for="SOEN384">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN384" name="SOEN384" value="SOEN384"> </td></tr>
					<tr class="hide"><td>SOEN 385</td><td> <label for="SOEN385">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN385" name="SOEN385" value="SOEN385"> </td></tr>
					<tr class="hide"><td>SOEN 390</td><td> <label for="SOEN390">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN390" name="SOEN390" value="SOEN390"> </td></tr>
					<tr class="hide"><td>SOEN 490</td><td> <label for="SOEN490">PASS&nbsp;&nbsp;&nbsp;
                        </label><input type="checkbox" id="SOEN490" name="SOEN490" value="SOEN490"> </td></tr>
				</tbody>
		</table>
        	<center>
                <div class="radio_buttons">

                    <p><b><u>Kindly select your start semester in order to continue!</u></b></p>

                    <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="fall" name="intake" value="Fall Intake" required>
                    <label for="fall" class="custom-control-label">Fall Intake</label></div>
                &nbsp;&nbsp;&nbsp;&nbsp;


                    <div class="custom-control custom-radio">
                 <input type="radio" class="custom-control-input" id="winter" name="intake" value="Winter Intake" required>
                        <label for="winter" class="custom-control-label">Winter Intake</label></div>
                &nbsp;&nbsp;&nbsp;&nbsp;


                        <div class="custom-control custom-radio">
				 <input type="radio" class="custom-control-input" id="summer" name="intake" value="Summer Intake" required>
                            <label for="summer" class="custom-control-label">Summer Intake</label></div>
                &nbsp;&nbsp;&nbsp;&nbsp;

                <br>

                <button class="submit-button btn-lg btn-primary" id="generate" name="generate"> Generate </button>

                </div>
<!--	   <button class="btn btn-lg btn-primary generate" id="button1" type="button">Generate</button>-->
        </center>
           </form>
	</div>
	<br><br><br><br><br>




	 
    <!-- jQuery first, then Popper.js, then Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

<!--

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->

    <script>

    // JS for my accordion
var acc = document.getElementsByClassName("labels");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      //this line below is what doesnt work
      //$(this).find($(".fa")).removeClass('fa-caret-right').addClass('fa-caret-down');
    }
    $(this)
        .find('[data-fa-i2svg]')
        .toggleClass('fa-angle-down')
        .toggleClass('fa-angle-right');
  });
}

    </script>

<script type="text/javascript">
    document.getElementById("generate").onclick = function () {
		location.href= "file:///C:/xampp/htdocs/SOEN341/Constraints.html";
	};
</script>


</body>
</html>
