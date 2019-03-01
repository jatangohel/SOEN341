<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width">
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	 <title>SOEN Course Stream</title>
<style>

	table.gridtable {
		width: 750px;
		border-collapse: collapse;
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
		text-align: left;
		font-size: 18px;
	}

	.labels tr td{
		cursor:pointer;
		background-color: #2cc16a;
		font-weight: bold;
		color: #fff;
	}

	.label tr td label{
		display: block;
	}

	[data-toggle="toggle"]{
		display:none;
	}



</style>
</head>

<?php  ?>
<body>
	<div class="container" id="container">
		<table class="gridtable" id="tableMain" border="0">
			<thead>
				<tr class="tableheader">
					<th>Course Name</th>
					<th>Pass To Check</th>
				</tr>
			</thead>
			<tbody>
				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="Physics">Physics</label>
							<input type="checkbox" name="Physics" id="Physics" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr><td>PHYS 204</td><td><form><label for="PHYS204">PASS</label><input type="checkbox" id="PHYS204" name="PHYS204" value="PHYS204"></form></td></tr>
					<tr><td>PHYS 205</td><td><form><label for="PHYS205">PASS</label><input type="checkbox" id="PHYS205" name="PHYS205" value="PHYS205"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="Mathmatics">Mathmatics</label>
							<input type="checkbox" name="Mathmatics" id="Mathmatics" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>MATH 203</td><td><form><label for="MATH203">PASS</label><input type="checkbox" id="MATH203" name="MATH204" value="MATH203"></form></td></tr>
					<tr class="hide"><td>MATH 204</td><td><form><label for="MATH204">PASS</label><input type="checkbox" id="MATH204" name="MATH204" value="MATH204"></form></td></tr>
					<tr class="hide"><td>MATH 205</td><td><form><label for="MATH205">PASS</label><input type="checkbox" id="MATH205" name="MATH204" value="MATH205"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="Electrics">Electrics</label>
							<input type="checkbox" name="Electrics" id="Electrics" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>ELEC 275</td><td><form><label for="ELEC275">PASS</label><input type="checkbox" id="ELEC275" name="ELEC275" value="ELEC275"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="ENCS">Engineering and Computer Science</label>
							<input type="checkbox" name="ENCS" id="ENCS" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>ENCS 282</td><td><form><label for="ENCS282">PASS</label><input type="checkbox" id="ENCS282" name="ENCS282" value="ENCS282"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="Engineering">Engineering</label>
							<input type="checkbox" name="Engineering" id="Engineering" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>ENGR 201</td><td><form><label for="ENGR201">PASS</label><input type="checkbox" id="ENGR201" name="ENGR201" value="ENGR201"></form></td></tr>
					<tr class="hide"><td>ENGR 202</td><td><form><label for="ENGR202">PASS</label><input type="checkbox" id="ENGR202" name="ENGR202" value="ENGR202"></form></td></tr>
					<tr class="hide"><td>ENGR 213</td><td><form><label for="ENGR213">PASS</label><input type="checkbox" id="ENGR213" name="ENGR213" value="ENGR213"></form></td></tr>
					<tr class="hide"><td>ENGR 233</td><td><form><label for="ENGR233">PASS</label><input type="checkbox" id="ENGR233" name="ENGR233" value="ENGR233"></form></td></tr>
					<tr class="hide"><td>ENGR 301</td><td><form><label for="ENGR301">PASS</label><input type="checkbox" id="ENGR301" name="ENGR301" value="ENGR301"></form></td></tr>
					<tr class="hide"><td>ENGR 371</td><td><form><label for="ENGR371">PASS</label><input type="checkbox" id="ENGR371" name="ENGR371" value="ENGR371"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="Computer">Computer</label>
							<input type="checkbox" name="Computer" id="Computer" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>COMP 232</td><td><form><label for="COMP232">PASS</label><input type="checkbox" id="COMP232" name="COMP232" value="COMP232"></form></td></tr>
					<tr class="hide"><td>COMP 248</td><td><form><label for="COMP248">PASS</label><input type="checkbox" id="COMP248" name="COMP248" value="COMP248"></form></td></tr>
					<tr class="hide"><td>COMP 249</td><td><form><label for="COMP249">PASS</label><input type="checkbox" id="COMP249" name="COMP249" value="COMP249"></form></td></tr>
					<tr class="hide"><td>COMP 335</td><td><form><label for="COMP335">PASS</label><input type="checkbox" id="COMP335" name="COMP335" value="COMP335"></form></td></tr>
					<tr class="hide"><td>COMP 346</td><td><form><label for="COMP346">PASS</label><input type="checkbox" id="COMP346" name="COMP346" value="COMP346"></form></td></tr>
					<tr class="hide"><td>COMP 348</td><td><form><label for="COMP348">PASS</label><input type="checkbox" id="COMP348" name="COMP348" value="COMP348"></form></td></tr>
					<tr class="hide"><td>COMP 352</td><td><form><label for="COMP352">PASS</label><input type="checkbox" id="COMP352" name="COMP352" value="COMP352"></form></td></tr>
				</tbody>

				<tbody class="labels">
					<tr>
						<td colspan="2">
							<label for="SOEN">Software Engineering</label>
							<input type="checkbox" name="SOEN" id="SOEN" data-toggle="toggle">
						</td>
					</tr>
				</tbody>
				<tbody class="hide">
					<tr class="hide"><td>SOEN 228</td><td><form><label for="SOEN228">PASS</label><input type="checkbox" id="SOEN228" name="SOEN228" value="SOEN228"></form></td></tr>
					<tr class="hide"><td>SOEN 287</td><td><form><label for="SOEN287">PASS</label><input type="checkbox" id="SOEN287" name="SOEN287" value="SOEN287"></form></td></tr>
					<tr class="hide"><td>SOEN 321</td><td><form><label for="SOEN321">PASS</label><input type="checkbox" id="SOEN321" name="SOEN321" value="SOEN321"></form></td></tr>
					<tr class="hide"><td>SOEN 331</td><td><form><label for="SOEN331">PASS</label><input type="checkbox" id="SOEN331" name="SOEN331" value="SOEN331"></form></td></tr>
					<tr class="hide"><td>SOEN 341</td><td><form><label for="SOEN341">PASS</label><input type="checkbox" id="SOEN341" name="SOEN341" value="SOEN341"></form></td></tr>
					<tr class="hide"><td>SOEN 342</td><td><form><label for="SOEN342">PASS</label><input type="checkbox" id="SOEN342" name="SOEN342" value="SOEN342"></form></td></tr>
					<tr class="hide"><td>SOEN 343</td><td><form><label for="SOEN343">PASS</label><input type="checkbox" id="SOEN343" name="SOEN343" value="SOEN343"></form></td></tr>
					<tr class="hide"><td>SOEN 344</td><td><form><label for="SOEN344">PASS</label><input type="checkbox" id="SOEN344" name="SOEN344" value="SOEN344"></form></td></tr>
					<tr class="hide"><td>SOEN 345</td><td><form><label for="SOEN345">PASS</label><input type="checkbox" id="SOEN345" name="SOEN345" value="SOEN345"></form></td></tr>
					<tr class="hide"><td>SOEN 357</td><td><form><label for="SOEN357">PASS</label><input type="checkbox" id="SOEN357" name="SOEN357" value="SOEN357"></form></td></tr>
					<tr class="hide"><td>SOEN 384</td><td><form><label for="SOEN384">PASS</label><input type="checkbox" id="SOEN384" name="SOEN384" value="SOEN384"></form></td></tr>
					<tr class="hide"><td>SOEN 385</td><td><form><label for="SOEN385">PASS</label><input type="checkbox" id="SOEN385" name="SOEN385" value="SOEN385"></form></td></tr>
					<tr class="hide"><td>SOEN 390</td><td><form><label for="SOEN390">PASS</label><input type="checkbox" id="SOEN390" name="SOEN390" value="SOEN390"></form></td></tr>
					<tr class="hide"><td>SOEN 490</td><td><form><label for="SOEN490">PASS</label><input type="checkbox" id="SOEN490" name="SOEN490" value="SOEN490"></form></td></tr>
				</tbody>
			</tbody>
		</table>
	</div>


	<button class="btn btn-lg btn-primary  float-right" id="button1" type="button">Generate</button>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){
			$('[data-toggle="toggle"]').change(function(){
				$(this).parents().next('.hide').toggle();
			});
		});

	</script>

	<script type="text/javascript">
		var rowVisible = true;
		function toggleDisplay(tbl) {
		var tblRows = tbl.rows;
		for (i = 0; i < tblRows.length; i++) {
		if (tblRows[i].className != "labels") {
         tblRows[i].style.display = (rowVisible) ? "none" : "";
      }
   }
   rowVisible = !rowVisible;
}
</script>
</body>
</html>

























	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
