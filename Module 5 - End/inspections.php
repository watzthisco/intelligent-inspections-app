<?php

// Connects to your Database
$connection = mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;


$result = mysql_query('SELECT * FROM INSPECTIONS',$connection) or die('problem getting data');
?>
<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>

<h2>Inspections</h2>
<p><a href="newInspection.php">Create new inspection</a></p>

<table>
	<tr>
		<td>ID</td>
		<td>Customer</td>
		<td>Property</td>
		<td></td>
	</tr>
<?php

while($inspection = mysql_fetch_row($result)) {

	$inspection_id = $inspection[0];
	$inspection_property = $inspection[1];
	echo "<tr>";
	echo "<td><a href='editInspection.php?id=".$inspection_id."'>".$inspection_id."</a></td>";
	echo "<td>".$customer."</td>";
	echo "<td>".$inspection_property."</td>";
	echo "</tr>";

	}

?>
</table>
</body>
</html>