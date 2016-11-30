<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/dbconn.php";


$result = mysqli_query($con,'SELECT * FROM INSPECTIONS') or die('problem getting data');
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

while($inspection = mysqli_fetch_row($result)) {
    $customer = '';
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