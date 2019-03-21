<?php
require_once 'backendInterface.php';
?>
<!doctype html>
<html lang="en">
  <head>
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

	<title>SOEN Course Stream</title>
	<style>
	        :root{
          --mainColor: #14162B;
          --background: #2cc16a;

          --fadedText: #36384D;

          --mainButtons: rgb(241, 48, 78);

        }
	
	  body {

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
	
	        .container {
          font-family: 'Montserrat', sans-serif;
          position: fixed;
          background: var(--mainColor);
          height: 490px;
          width: 800px;
        /*   overflow: scroll; */
          border-radius: 6px;
          box-shadow: 0px 0px 47px -1px rgba(0,0,0,0.75);
          /*   centering a fixed element in the middle of screen */
          margin: -245px -400px;
          top: 50%;
          left: 50%;

        }
	 .topHeader {

          color: white;
          background: var(--mainColor);
          height: 80px;
          width: 100%;
          padding: 15px 0px 15px 0px;
          text-align: center;
          z-index: 30;
          box-shadow: 0px 10px 28px -11px rgba(0,0,0,0.35);
        }

        h1 {
          font-size: 30px;
          margin-top: 0px;
          margin-bottom: 30px;
          display: inline-block;
          font-weight: 100;

        }

        .topHeader, th {
          font-size: 15px;
        }

        .tableHeader th {
          color: black;
		  font-weight:500;
          
        }

        table {
          width: 100%;
          border-spacing: 0px;

        }
        td, th {
          width: 100px;
        }
        td {
          height: 12px;
          border-left: 1px solid rgba(120,120,255,0.5);


        }
		
		tr{
		
		}
        .time {
          color: black;
          font-size: 20px;
          text-align: center;
          font-weight: 100;
					  border:1px solid black;

        }

        tr:nth-child(2n) {
          background: rgba(120,120,255,0.06);
        }

#monday8,#wednesday8{
      color:rgb(0,0,0);background-color:rgb(182,209,100);text-align: center;
}
	.myTable{
	background-color: white;
	color:black;
	opacity: 0.75;
	}
	
	.dropdown-menu{
	background-color: #80ffbf;
	opacity:0.86;
	}
	

	
	
	</style>
	 <body>
	 
 <div class="topHeader">
        <button class="btn btn-warning" style="float:left; margin-left:20px;"><strong>Save Schedule</strong></button>

        <h1 class="text-center">Weekly Schedule</h1>
		<div class="dropdown" style="float:right;margin-right:10px;">
			<button class="btn btn-primary dropdown-toggle" name="btndropdown"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Time Constrain</button>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="form-group">
						<form name="add_name" id="add_name">
							<table class="table table-bordered" id="dynamic_field">
								<tr>
									<th class="text-center">Days</th>
									<th class="text-center">Start Time</th>
									<th class="text-center">End Time</th>
									<th class="text-center"x>Status</th>
								</tr>
								<tr>
									<td><select name="Days">
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
									</td>
									
									<td></select><input type="time" id="starting1" name="starting1" placeholder="Starting Time"></td>
									<td><input type="time" id="ending1" name="ending1" placeholder="Ending Time"></td>
									<td><button type="button" name="add" id="add" class="btn btn-secondary">Next</button></td>
								</tr>
								<input type="button" class="btn btn-success btn-sm"style="float:right; margin-right:20px;" value="submit"/>
							</table>
						</form>
					</div>
				</div>
	</div>
		
		<div class="myTable">
        
      <table class="tableTimes" >
	          <tr>
          <th style="margin-left:20px">Time</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
          <th>Sunday</th>
        </tr>

        <tr style="border-top: 2px solid black; ">
          <td class="time" rowspan="4" scope="row"><span class>8:00</span></td>
          <!--<td name=<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getDays()[0] . $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime();?>
		  id=<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getDays()[0] . $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime();?>
		  rowspan="5" style="color:rgb(0,0,0);background-color:rgb(182,209,146);text-align: center;">
            <span class style="color:rgb(0,0,0);background-color:rgb(182,209,146);">SOEN  341 - S<br>Lecture<br>8:00AM - 9:15AM<br>Faubourg Building (FG) C080</span>
          </td>-->
		  		  <td 
				  name=<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getDays()[0] . $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime();?>
				  rowspan= <?php echo ($userSched->getListOfSemesters()[0]->getLecs()[0]->getEndTime() - $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime())/0.15; ?>>
            <span>
				<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getDays()[0] . $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime();
				echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getCourseName() . " - " . $userSched->getListOfSemesters()[0]->getLecs()[0]->getSection() . " " . $userSched->getListOfSemesters()[0]->getLecs()[0]->getSubSection();?>
				<br>Lecture<br>
				<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime()/10000 . ":" . $userSched->getListOfSemesters()[0]->getLecs()[0]->getStartTime()/100?>
				-
				<?php echo $userSched->getListOfSemesters()[0]->getLecs()[0]->getEndTime()/10000 . ":" . $userSched->getListOfSemesters()[0]->getLecs()[0]->getEndTime()/100?></span>
          </td>
          <td class="tuesday" name="tuesday8" id="tuesday8">&nbsp;</td>
		  
          <td class="wednesday" name="wednesday8" id="wednesday8">5555&nbsp;</td>
          <td class="thursday" name="thursday8" id="thursday8">&nbsp;</td>
          <td class="friday" name="friday8" id="friday8">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		      <td class="sunday">&nbsp;</td>
 		  

			  
        </tr>
        <tr >   

          <td class="monday" name="monday815" id="monday815">&nbsp;</td>
          <td class="tuesday" name="tuesday815" id="tuesday815">&nbsp;</td>
          <td class="wednesday" name="wednesday815" id="wednesday815">&nbsp;</td>
          <td class="thursday" name="thursday815" id="thursday815">&nbsp;</td>
          <td class="friday" name="friday815" id="friday815">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>    
        </tr>        
        <tr >
          <td class="monday" name="monday830" id="monday830">&nbsp;</td>
          <td class="tuesday" name="tuesday830" id="tuesday830">&nbsp;</td>
          <td class="wednesday" name="wednesday830" id="wednesday830">&nbsp;</td>
          <td class="thursday" name="thursday830" id="thursday830">&nbsp;</td>
          <td class="friday" name="friday830" id="friday830">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>    
        </tr>        
        <tr >
          <td class="monday" name="monday845" id="monday845">&nbsp;</td>
          <td class="tuesday" name="tuesday845" id="tuesday845"rowspan="5" style="color:rgb(0,0,0);background-color:rgb(182,209,146);text-align: center;">
            <span class style="color:rgb(0,0,0);background-color:rgb(182,209,146);">COEN  390 - S<br>Lecture<br>8:45AM - 10:00AM<br>Faubourg Building (FG) C090</span>
			</td>
          <td class="wednesday" name="wednesday845" id="wednesday845">&nbsp;</td>
          <td class="thursday" name="thursday845" id="thursday845">&nbsp;</td>
          <td class="friday" name="friday845" id="friday845">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>    
        </tr>



        <tr>
          <td class="time" rowspan="4" scope="row"><span class>9:00</span>&nbsp;</td>
          <td class="monday" name="monday9" id="monday9">&nbsp;</td>
          <td class="tuesday" name="tuesday9" id="tuesday9">&nbsp;</td>
          <td class="wednesday" name="wednesday9" id="wednesday9">&nbsp;</td>
          <td class="thursday" name="thursday9" id="thursday9">&nbsp;</td>
          <td class="friday" name="friday9" id="friday9">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		      <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday915" id="monday9">&nbsp;</td>
          <td class="tuesday" name="tuesday915" id="tuesday9">&nbsp;</td>
          <td class="wednesday" name="wednesday915" id="wednesday9">&nbsp;</td>
          <td class="thursday" name="thursday915" id="thursday9">&nbsp;</td>
          <td class="friday" name="friday915" id="friday9">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>  
        <tr>
          <td class="monday" name="monday930" id="monday930">&nbsp;</td>
          <td class="tuesday" name="tuesday930" id="tuesday930">&nbsp;</td>
          <td class="wednesday" name="wednesday930" id="wednesday930">&nbsp;</td>
          <td class="thursday" name="thursday930" id="thursday930">&nbsp;</td>
          <td class="friday" name="friday930" id="friday930">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>      
        <tr>
          <td class="monday" name="monday945" id="monday945">&nbsp;</td>
          <td class="tuesday" name="tuesday945" id="tuesday945">&nbsp;</td>
          <td class="wednesday" name="wednesday945" id="wednesday945">&nbsp;</td>
          <td class="thursday" name="thursday945" id="thursday945">&nbsp;</td>
          <td class="friday" name="friday945" id="friday945">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>



        <tr>
          <td class="time" rowspan="4" scope="row"><span class>10:00</span>&nbsp;</td>
          <td class="monday" name="monday10" id="monday10">&nbsp;</td>
          <td class="tuesday" name="tuesday10" id="tuesday10">&nbsp;</td>
          <td class="wednesday" name="wednesday10" id="wednesday10">&nbsp;</td>
          <td class="thursday" name="thursday10" id="thursday10">&nbsp;</td>
          <td class="friday" name="friday10" id="friday10">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		       <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1015" id="monday10">&nbsp;</td>
          <td class="tuesday" name="tuesday1015" id="tuesday10">&nbsp;</td>
          <td class="wednesday" name="wednesday1015" id="wednesday10">&nbsp;</td>
          <td class="thursday" name="thursday1015" id="thursday10">&nbsp;</td>
          <td class="friday" name="friday1015" id="friday10">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
           <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1030" id="monday1030">&nbsp;</td>
          <td class="tuesday" name="tuesday1030" id="tuesday1030">&nbsp;</td>
          <td class="wednesday" name="wednesday1030" id="wednesday1030">&nbsp;</td>
          <td class="thursday" name="thursday1030" id="thursday1030">&nbsp;</td>
          <td class="friday" name="friday1030" id="friday1030">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
           <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1045" id="monday1045">&nbsp;</td>
          <td class="tuesday" name="tuesday1045" id="tuesday1045">&nbsp;</td>
          <td class="wednesday" name="wednesday1045" id="wednesday1045">&nbsp;</td>
          <td class="thursday" name="thursday1045" id="thursday1045">&nbsp;</td>
          <td class="friday" name="friday1045" id="friday1045">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
           <td class="sunday">&nbsp;</td>
        </tr>





        <tr>
          <td class="time" rowspan="4" scope="row"><span class>11:00</span>&nbsp;</td>
          <td class="monday" name="monday11" id="monday11">&nbsp;</td>
          <td class="tuesday" name="tuesday11" id="tuesday11">&nbsp;</td>
          <td class="wednesday" name="wednesday11" id="wednesday11">&nbsp;</td>
          <td class="thursday" name="thursday11" id="thursday11">&nbsp;</td>
          <td class="friday" name="friday11" id="friday11">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		      <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1115" id="monday11">&nbsp;</td>
          <td class="tuesday" name="tuesday1115" id="tuesday11">&nbsp;</td>
          <td class="wednesday" name="wednesday1115" id="wednesday11">&nbsp;</td>
          <td class="thursday" name="thursday1115" id="thursday11">&nbsp;</td>
          <td class="friday" name="friday1115" id="friday11">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1130" id="monday1130">&nbsp;</td>
          <td class="tuesday" name="tuesday1130" id="tuesday1130">&nbsp;</td>
          <td class="wednesday" name="wednesday1130" id="wednesday1130">&nbsp;</td>
          <td class="thursday" name="thursday1130" id="thursday1130">&nbsp;</td>
          <td class="friday" name="friday1130" id="friday1130">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1145" id="monday1145">&nbsp;</td>
          <td class="tuesday" name="tuesday1145" id="tuesday1145">&nbsp;</td>
          <td class="wednesday" name="wednesday1145" id="wednesday1145">&nbsp;</td>
          <td class="thursday" name="thursday1145" id="thursday1145">&nbsp;</td>
          <td class="friday" name="friday1145" id="friday1145">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>12:00</span>&nbsp;</td>
          <td class="monday" name="monday12" id="monday12">&nbsp;</td>
          <td class="tuesday" name="tuesday12" id="tuesday12">&nbsp;</td>
          <td class="wednesday" name="wednesday12" id="wednesday12">&nbsp;</td>
          <td class="thursday" name="thursday12" id="thursday12">&nbsp;</td>
          <td class="friday" name="friday12" id="friday12">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		      <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1215" id="monday12">&nbsp;</td>
          <td class="tuesday" name="tuesday1215" id="tuesday12">&nbsp;</td>
          <td class="wednesday" name="wednesday1215" id="wednesday12">&nbsp;</td>
          <td class="thursday" name="thursday1215" id="thursday12">&nbsp;</td>
          <td class="friday" name="friday1215" id="friday12">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1230" id="monday1230">&nbsp;</td>
          <td class="tuesday" name="tuesday1230" id="tuesday1230">&nbsp;</td>
          <td class="wednesday" name="wednesday1230" id="wednesday1230">&nbsp;</td>
          <td class="thursday" name="thursday1230" id="thursday1230">&nbsp;</td>
          <td class="friday" name="friday1230" id="friday1230">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1245" id="monday1245">&nbsp;</td>
          <td class="tuesday" name="tuesday1245" id="tuesday1245">&nbsp;</td>
          <td class="wednesday" name="wednesday1245" id="wednesday1245">&nbsp;</td>
          <td class="thursday" name="thursday1245" id="thursday1245">&nbsp;</td>
          <td class="friday" name="friday1245" id="friday1245">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>

     


        <tr>
          <td class="time" rowspan="4" scope="row"><span class>13:00</span>&nbsp;</td>
          <td class="monday" name="monday13" id="monday13">&nbsp;</td>
          <td class="tuesday" name="tuesday13" id="tuesday13">&nbsp;</td>
          <td class="wednesday" name="wednesday13" id="wednesday13">&nbsp;</td>
          <td class="thursday" name="thursday13" id="thursday13">&nbsp;</td>
          <td class="friday" name="friday13" id="friday13">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
		      <td class="sunday">&nbsp;</td>
        </tr>
          <tr>
          <td class="monday" name="monday1315" id="monday13">&nbsp;</td>
          <td class="tuesday" name="tuesday1315" id="tuesday13">&nbsp;</td>
          <td class="wednesday" name="wednesday1315" id="wednesday13">&nbsp;</td>
          <td class="thursday" name="thursday1315" id="thursday13">&nbsp;</td>
          <td class="friday" name="friday1315" id="friday13">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
          <tr>
          <td class="monday" name="monday1330" id="monday1330">&nbsp;</td>
          <td class="tuesday" name="tuesday1330" id="tuesday1330">&nbsp;</td>
          <td class="wednesday" name="wednesday1330" id="wednesday1330">&nbsp;</td>
          <td class="thursday" name="thursday1330" id="thursday1330">&nbsp;</td>
          <td class="friday" name="friday1330" id="friday1330">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
          <tr>
          <td class="monday" name="monday1345" id="monday1345">&nbsp;</td>
          <td class="tuesday" name="tuesday1345" id="tuesday1345">&nbsp;</td>
          <td class="wednesday" name="wednesday1345" id="wednesday1345">&nbsp;</td>
          <td class="thursday" name="thursday1345" id="thursday1345">&nbsp;</td>
          <td class="friday" name="friday1345" id="friday1345">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>14:00</span>&nbsp;</td>
          <td class="monday" name="monday14" id="monday14">&nbsp;</td>
          <td class="tuesday" name="tuesday14" id="tuesday14">&nbsp;</td>
          <td class="wednesday" name="wednesday14" id="wednesday14">&nbsp;</td>
          <td class="thursday" name="thursday14" id="thursday14">&nbsp;</td>
          <td class="friday" name="friday14" id="friday14">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1415" id="monday14">&nbsp;</td>
          <td class="tuesday" name="tuesday1415" id="tuesday14">&nbsp;</td>
          <td class="wednesday" name="wednesday1415" id="wednesday14">&nbsp;</td>
          <td class="thursday" name="thursday1415" id="thursday14">&nbsp;</td>
          <td class="friday" name="friday1415" id="friday14">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1430" id="monday1430">&nbsp;</td>
          <td class="tuesday" name="tuesday1430" id="tuesday1430">&nbsp;</td>
          <td class="wednesday" name="wednesday1430" id="wednesday1430">&nbsp;</td>
          <td class="thursday" name="thursday1430" id="thursday1430">&nbsp;</td>
          <td class="friday" name="friday1430" id="friday1430">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1445" id="monday1445">&nbsp;</td>
          <td class="tuesday" name="tuesday1445" id="tuesday1445">&nbsp;</td>
          <td class="wednesday" name="wednesday1445" id="wednesday1445">&nbsp;</td>
          <td class="thursday" name="thursday1445" id="thursday1445">&nbsp;</td>
          <td class="friday" name="friday1445" id="friday1445">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>15:00</span>&nbsp;</td>
          <td class="monday" name="monday15" id="monday15">&nbsp;</td>
          <td class="tuesday" name="tuesday15" id="tuesday15">&nbsp;</td>
          <td class="wednesday" name="wednesday15" id="wednesday15">&nbsp;</td>
          <td class="thursday" name="thursday15" id="thursday15">&nbsp;</td>
          <td class="friday" name="friday15" id="friday15">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1515" id="monday15">&nbsp;</td>
          <td class="tuesday" name="tuesday1515" id="tuesday15">&nbsp;</td>
          <td class="wednesday" name="wednesday1515" id="wednesday15">&nbsp;</td>
          <td class="thursday" name="thursday1515" id="thursday15">&nbsp;</td>
          <td class="friday" name="friday1515" id="friday15">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1530" id="monday1530">&nbsp;</td>
          <td class="tuesday" name="tuesday1530" id="tuesday1530">&nbsp;</td>
          <td class="wednesday" name="wednesday1530" id="wednesday1530">&nbsp;</td>
          <td class="thursday" name="thursday1530" id="thursday1530">&nbsp;</td>
          <td class="friday" name="friday1530" id="friday1530">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
         <tr>
          <td class="monday" name="monday1545" id="monday1545">&nbsp;</td>
          <td class="tuesday" name="tuesday1545" id="tuesday1545">&nbsp;</td>
          <td class="wednesday" name="wednesday1545" id="wednesday1545">&nbsp;</td>
          <td class="thursday" name="thursday1545" id="thursday1545">&nbsp;</td>
          <td class="friday" name="friday1545" id="friday1545">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
 




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>16:00</span>&nbsp;</td>
          <td class="monday" name="monday16" id="monday16">&nbsp;</td>
          <td class="tuesday" name="tuesday16" id="tuesday16">&nbsp;</td>
          <td class="wednesday" name="wednesday16" id="wednesday16">&nbsp;</td>
          <td class="thursday" name="thursday16" id="thursday16">&nbsp;</td>
          <td class="friday" name="friday16" id="friday16">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1615" id="monday16">&nbsp;</td>
          <td class="tuesday" name="tuesday1615" id="tuesday16">&nbsp;</td>
          <td class="wednesday" name="wednesday1615" id="wednesday16">&nbsp;</td>
          <td class="thursday" name="thursday1615" id="thursday16">&nbsp;</td>
          <td class="friday" name="friday1615" id="friday16">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1630" id="monday1630">&nbsp;</td>
          <td class="tuesday" name="tuesday1630" id="tuesday1630">&nbsp;</td>
          <td class="wednesday" name="wednesday1630" id="wednesday1630">&nbsp;</td>
          <td class="thursday" name="thursday1630" id="thursday1630">&nbsp;</td>
          <td class="friday" name="friday1630" id="friday1630">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1645" id="monday1645">&nbsp;</td>
          <td class="tuesday" name="tuesday1645" id="tuesday1645">&nbsp;</td>
          <td class="wednesday" name="wednesday1645" id="wednesday1645">&nbsp;</td>
          <td class="thursday" name="thursday1645" id="thursday1645">&nbsp;</td>
          <td class="friday" name="friday1645" id="friday1645">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>17:00</span>&nbsp;</td>
          <td class="monday" name="monday17" id="monday17">&nbsp;</td>
          <td class="tuesday" name="tuesday17" id="tuesday17">&nbsp;</td>
          <td class="wednesday" name="wednesday17" id="wednesday17">&nbsp;</td>
          <td class="thursday" name="thursday17" id="thursday17">&nbsp;</td>
          <td class="friday" name="friday17" id="friday17">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1715" id="monday17">&nbsp;</td>
          <td class="tuesday" name="tuesday1715" id="tuesday17">&nbsp;</td>
          <td class="wednesday" name="wednesday1715" id="wednesday17">&nbsp;</td>
          <td class="thursday" name="thursday1715" id="thursday17">&nbsp;</td>
          <td class="friday" name="friday1715" id="friday17">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1730" id="monday1730">&nbsp;</td>
          <td class="tuesday" name="tuesday1730" id="tuesday1730">&nbsp;</td>
          <td class="wednesday" name="wednesday1730" id="wednesday1730">&nbsp;</td>
          <td class="thursday" name="thursday1730" id="thursday1730">&nbsp;</td>
          <td class="friday" name="friday1730" id="friday1730">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1745" id="monday1745">&nbsp;</td>
          <td class="tuesday" name="tuesday1745" id="tuesday1745">&nbsp;</td>
          <td class="wednesday" name="wednesday1745" id="wednesday1745">&nbsp;</td>
          <td class="thursday" name="thursday1745" id="thursday1745">&nbsp;</td>
          <td class="friday" name="friday1745" id="friday1745">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>18:00</span>&nbsp;</td>
          <td class="monday" name="monday18" id="monday18">&nbsp;</td>
          <td class="tuesday" name="tuesday18" id="tuesday18">&nbsp;</td>
          <td class="wednesday" name="wednesday18" id="wednesday18">&nbsp;</td>
          <td class="thursday" name="thursday18" id="thursday18">&nbsp;</td>
          <td class="friday" name="friday18" id="friday18">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1815" id="monday18">&nbsp;</td>
          <td class="tuesday" name="tuesday1815" id="tuesday18">&nbsp;</td>
          <td class="wednesday" name="wednesday1815" id="wednesday18">&nbsp;</td>
          <td class="thursday" name="thursday1815" id="thursday18">&nbsp;</td>
          <td class="friday" name="friday1815" id="friday18">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1830" id="monday1830">&nbsp;</td>
          <td class="tuesday" name="tuesday1830" id="tuesday1830">&nbsp;</td>
          <td class="wednesday" name="wednesday1830" id="wednesday1830">&nbsp;</td>
          <td class="thursday" name="thursday1830" id="thursday1830">&nbsp;</td>
          <td class="friday" name="friday1830" id="friday1830">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday1845" id="monday1845">&nbsp;</td>
          <td class="tuesday" name="tuesday1845" id="tuesday1845">&nbsp;</td>
          <td class="wednesday" name="wednesday1845" id="wednesday1845">&nbsp;</td>
          <td class="thursday" name="thursday1845" id="thursday1845">&nbsp;</td>
          <td class="friday" name="friday1845" id="friday1845">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>




        <tr>
          <td class="time" rowspan="4" scope="row"><span class>19:00</span>&nbsp;</td>
          <td class="monday" name="monday19" id="monday19">&nbsp;</td>
          <td class="tuesday" name="tuesday19" id="tuesday19">&nbsp;</td>
          <td class="wednesday" name="wednesday19" id="wednesday19">&nbsp;</td>
          <td class="thursday" name="thursday19" id="thursday19">&nbsp;</td>
          <td class="friday" name="friday19" id="friday19">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr> 
        <tr>
          <td class="monday" name="monday1915" id="monday19">&nbsp;</td>
          <td class="tuesday" name="tuesday1915" id="tuesday19">&nbsp;</td>
          <td class="wednesday" name="wednesday1915" id="wednesday19">&nbsp;</td>
          <td class="thursday" name="thursday1915" id="thursday19">&nbsp;</td>
          <td class="friday" name="friday1915" id="friday19">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr> 
        <tr>
          <td class="monday" name="monday1930" id="monday1930">&nbsp;</td>
          <td class="tuesday" name="tuesday1930" id="tuesday1930">&nbsp;</td>
          <td class="wednesday" name="wednesday1930" id="wednesday1930">&nbsp;</td>
          <td class="thursday" name="thursday1930" id="thursday1930">&nbsp;</td>
          <td class="friday" name="friday1930" id="friday1930">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr> 
        <tr>
          <td class="monday" name="monday1945" id="monday1945">&nbsp;</td>
          <td class="tuesday" name="tuesday1945" id="tuesday1945">&nbsp;</td>
          <td class="wednesday" name="wednesday1945" id="wednesday1945">&nbsp;</td>
          <td class="thursday" name="thursday1945" id="thursday1945">&nbsp;</td>
          <td class="friday" name="friday1945" id="friday1945">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>    





        <tr>
          <td class="time" rowspan="4" scope="row"><span class>20:00</span>&nbsp;</td>
          <td class="monday" name="monday20" id="monday20">&nbsp;</td>
          <td class="tuesday" name="tuesday20" id="tuesday20">&nbsp;</td>
          <td class="wednesday" name="wednesday20" id="wednesday20">&nbsp;</td>
          <td class="thursday" name="thursday20" id="thursday20">&nbsp;</td>
          <td class="friday" name="friday20" id="friday20">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday2015" id="monday20">&nbsp;</td>
          <td class="tuesday" name="tuesday2015" id="tuesday20">&nbsp;</td>
          <td class="wednesday" name="wednesday2015" id="wednesday20">&nbsp;</td>
          <td class="thursday" name="thursday2015" id="thursday20">&nbsp;</td>
          <td class="friday" name="friday2015" id="friday20">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday2030" id="monday2030">&nbsp;</td>
          <td class="tuesday" name="tuesday2030" id="tuesday2030">&nbsp;</td>
          <td class="wednesday" name="wednesday2030" id="wednesday2030">&nbsp;</td>
          <td class="thursday" name="thursday2030" id="thursday2030">&nbsp;</td>
          <td class="friday" name="friday2030" id="friday2030">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>
        <tr>
          <td class="monday" name="monday2045" id="monday2045">&nbsp;</td>
          <td class="tuesday" name="tuesday2045" id="tuesday2045">&nbsp;</td>
          <td class="wednesday" name="wednesday2045" id="wednesday2045">&nbsp;</td>
          <td class="thursday" name="thursday2045" id="thursday2045">&nbsp;</td>
          <td class="friday" name="friday2045" id="friday2045">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>
        </tr>






        <tr>
          <td class="time" rowspan="4" scope="row"><span class>21:00</span>&nbsp;</td>
          <td class="monday" name="monday21" id="monday21">&nbsp;</td>
          <td class="tuesday" name="tuesday21" id="tuesday21">&nbsp;</td>
          <td class="wednesday" name="wednesday21" id="wednesday21">&nbsp;</td>
          <td class="thursday" name="thursday21" id="thursday21">&nbsp;</td>
          <td class="friday" name="friday21" id="friday21">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>		  
        </tr>
        <tr>
          <td class="monday" name="monday2115" id="monday21">&nbsp;</td>
          <td class="tuesday" name="tuesday2115" id="tuesday21">&nbsp;</td>
          <td class="wednesday" name="wednesday2115" id="wednesday21">&nbsp;</td>
          <td class="thursday" name="thursday2115" id="thursday21">&nbsp;</td>
          <td class="friday" name="friday2115" id="friday21">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>      
        </tr>
        <tr>
          <td class="monday" name="monday2130" id="monday2130">&nbsp;</td>
          <td class="tuesday" name="tuesday2130" id="tuesday2130">&nbsp;</td>
          <td class="wednesday" name="wednesday2130" id="wednesday2130">&nbsp;</td>
          <td class="thursday" name="thursday2130" id="thursday2130">&nbsp;</td>
          <td class="friday" name="friday2130" id="friday2130">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>      
        </tr>
        <tr>
          <td class="monday" name="monday2145" id="monday2145">&nbsp;</td>
          <td class="tuesday" name="tuesday2145" id="tuesday2145">&nbsp;</td>
          <td class="wednesday" name="wednesday2145" id="wednesday2145">&nbsp;</td>
          <td class="thursday" name="thursday2145" id="thursday2145">&nbsp;</td>
          <td class="friday" name="friday2145" id="friday2145">&nbsp;</td>
          <td class="saturday">&nbsp;</td>
          <td class="sunday">&nbsp;</td>      
        </tr>


      </table>



      </div>
	    </div>
    <!-- end of schedule area   -->


    
    <!--  end of container  -->
	
	</div>
	</div>
 <script>
	$(document).ready(function(){
	var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="Days"><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select>&nbsp;</td><td><input type="time" id="starting'+i+'" name="starting'+i+'">&nbsp;</td><td><input type="time" id="ending'+i+'" name="ending'+i+'">&nbsp;</td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>&nbsp;</td></tr>');
	});
	$(document).on('click','.btn_remove',function(){
		var button_id = $(this).attr("id");
		$("#row"+button_id+'').remove();
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

/*$(document).ready(function() {
  $('table tr').each(function(i, v) {
    var cols = $(this).find('td');
    $(this).find('td[rowspan]').each(function() {
      var idx = $(this).index();
      console.log(idx);
      for(var j = 1; j < $(this).prop('rowspan'); j++) {
        $('table tr').eq(i+j).find('td').eq(idx).hide();
      }
    });
  });
});*/
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 		
</body>		
</html>	