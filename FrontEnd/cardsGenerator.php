<style>

#table3 {
    border-radius: 5px;
    width: 50%;
    margin: 0px auto;
    float: none;
}
</style>

<?php
if (session_status() != PHP_SESSION_ACTIVE)
{
	ob_start();
	session_start();
}
function cardDisp($i)
{
  $semInfoFE = $_SESSION ['semInfo'];
	$semYearFE = $_SESSION ['semYear'];
	$semNameFE = $_SESSION ['semName'];

  echo
  '<a class="card card-body text-center height:400px" id="hello" href="weeklyschdulef.php?semester=';echo"$i";echo'"class="custom-card" style="background: #F8C471">'.
  '<thead>'.
  '<tr class="tableheader">'.
  '<th><strong>';

	if ($_SESSION['dispEng'])
		echo 'Year ';
	else
		echo 'Année ';

	echo $semYearFE[$i]; echo ', ';

	if ($_SESSION['dispEng'])
		echo $semNameFE[$i];
	else
	{
		switch ($semNameFE[$i])
		{
			case "Fall":
				echo "Automne";
			break;

			case "Winter":
				echo "Hiver";
			break;

			case "Summer":
				echo "Été";
			break;
		}
	}

	if ($_SESSION['dispEng'])
		echo ' Semester';
	else
		echo ' Semestre';

  echo ' </th>'.
  '</tr></strong>'.
  '</thead>'.
  '<div name=';echo $i; echo' >'.
  '<table class="gridtable" id="table3" border="0"onclick=window.location.href="file:///X:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.php">'.
  '<tbody>';
  if (!empty($semInfoFE[$i]))
    echo implode('<left> ', array_keys(current($semInfoFE[$i])));
  '</thead>'.
  '<tbody>'.
  '<center>';
  foreach ($semInfoFE[$i] as $row): array_map('htmlentities', $row);
    echo'<tr>'.
    '<td>'.implode('<td>&nbsp;&nbsp;',$row);
    echo '</td>'.
    '</tr>';
  endforeach;
  '</center>';
  echo '</tbody>'.
  '</table>'.
  '</div>' .
  '</a>';
} ?>


<div id="card" class ="container">
	<!-- <div id="card"  class="jumbotron jumbotron-fluid" > -->
    <h2 align="center"class="header margin-top:0px">
			<?php
				if($_SESSION['dispEng'])
					echo "General Course Schedule";
				else
					echo "Horaire des cours";
			?>
		</h2>
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
