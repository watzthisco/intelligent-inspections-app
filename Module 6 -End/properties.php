<?php

// Connects to your Database
$connection = mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;


$result = mysql_query('SELECT * FROM properties',$connection) or die('problem getting data');
?>
<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<h2>Properties</h2>
<p><a href="newProperty.php">Create new property</a></p>

<table>
	<tr>
		<td>Property ID</td>
		<td>Customer</td>
		<td>Address</td>
		<td>City</td>
		<td>State</td>
		<td>Zip</td>
	</tr>
<?php

while($property = mysql_fetch_row($result)) {

	$property_id = $property[0];
	$property_customer = $property[1];
	$property_address = $property[2];
	$property_city = $customer[3];
	$property_state = $property[4];
	$property_zip = $property[5];
	echo "<tr>";
	echo "<td><a href='editCustomer.php?id=".$property_id."'>".$property_id."</a></td>";
	echo "<td>".$property_customer."</td>";
	echo "<td>".$property_address."</td>";
	echo "<td>".$property_city."</td>";
	echo "<td>".$property_state."</td>";
	echo "<td>".$property_zip."</td>";
	echo "</tr>";

	}

?>
</table>
</body>
</html>