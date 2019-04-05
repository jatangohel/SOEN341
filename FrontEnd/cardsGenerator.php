<?php
if (session_status() != PHP_SESSION_ACTIVE)
	session_start();
function cardDisp($i)
{
  $semInfoFE = $_SESSION ['semInfo'];
  echo
  '<div class="card card-body text-center height:400px" style="background: #F8C471" >' .
    // '<p> Minimum Credits This Semester'.
    //   '<input type="number" min="0" max="18" id="credits1"/> &nbsp;&nbsp;<input type="button" class="btn btn-success btn-sm" name="btncredits3" id="btncredits3" value="submit"/></p>' .
      '<table class="gridtable" id="table3" border="0"onclick=window.location.href="file:///X:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.php">'.
         '<thead>'.
          '<tr class="tableheader">'.
            '<th>Semester ';  echo $i;
            echo ' </th>'.
          '</tr>'.
        '</thead>'.
        '<tbody>'.
          '<tbody class="labels">'.
            '<tr>'.
              '<td colspan="2">'.
              //  '<label>Course Name</label>'.
              // '<label>Credits</label>'.
              '</td>'.
            '</tr>'.
          '<tr>';
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
} ?>


<div id="card" class ="container1">
	<!-- <div id="card"  class="jumbotron jumbotron-fluid" > -->
				<h2 align="center"class="header margin-top:0px">General Course Schedule</h2>
		<br />
		<div  class="card-cloumns">
      <div class = "row">

<?php
for ($i = 0; $i < count ($_SESSION['semInfo']); $i++)
  cardDisp($i);
 ?>

		</div>
  </div>
</div>
