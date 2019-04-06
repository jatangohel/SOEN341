<?php
if (session_status() != PHP_SESSION_ACTIVE)
	session_start();
function cardDisp($i)
{
  $semInfoFE = $_SESSION ['semInfo'];
  // echo
  // '<div class="card card-body text-center height:400px" style="background: #F8C471" >' .
  echo
  '<a class="card card-body text-center height:400px" id="hello" href="weeklyschdulef.php?semester=';echo"$i";echo'"class="custom-card" style="background: #F8C471">'.
  '<thead>'.
  '<tr class="tableheader">'.
  '<th><strong>Semester ';  echo $i + 1;
  echo ' </th>'.
  '</tr></strong>'.
  '</thead>'.
  '<div name=';echo $i; echo' >'.
  '<table class="gridtable" id="table3" border="0"onclick=window.location.href="file:///X:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.php">'.
  '<tbody>';
  if (!empty($semInfoFE[$i]))
    echo implode('&nbsp;&nbsp;&nbsp;&nbsp;', array_keys(current($semInfoFE[$i])));
  '</thead>'.
  '<tbody>';
  foreach ($semInfoFE[$i] as $row): array_map('htmlentities', $row);
    echo'<tr>'.
    '<td>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp'; echo implode('<td>&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $row);
    echo '</td>'.
    '</tr>';
  endforeach;
  echo '</tbody>'.
  '</table>'.
  '</div>' .
  '</a>';
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
