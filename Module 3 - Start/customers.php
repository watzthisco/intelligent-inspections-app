<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>

<?php

// Connects to your Database
$connection = mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;


$result = mysql_query('SELECT * FROM customers',$connection) or die('problem getting data');
?>
<h2>Customers</h2>
<p><a href="newCustomer.php">Create new customer</a></p>
<table>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Email</td>
		<td>Phone</td>
	</tr>
<?php

while($customer = mysql_fetch_row($result)) {

	$customer_id = $customer[0];
	$customer_name = $customer[1];
	$customer_email = $customer[2];
	$customer_phone = $customer[3];
	echo "<tr>";
	echo "<td><a href='editCustomer.php?id=".$customer_id."'>".$customer_id."</a></td>";
	echo "<td>".$customer_name."</td>";
	echo "<td>".$customer_email."</td>";
	echo "<td>".$customer_phone."</td>";
	echo "</tr>";

	}

?>
</table>
</body>
</html>