<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
  <?php include "includes/dbconn.php"; ?>


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

$query = 'SELECT * FROM customers';
if($result = mysqli_query($con,$query)) {

while($customer = mysqli_fetch_row($result)) {

	$customer_id = $customer[0];
	$customer_name = $customer[1];
	$customer_email = $customer[2];
	$customer_phone = $customer[3];
	print "<tr>";
	print "<td><a href='editCustomer.php?id=".$customer_id."'>".$customer_id."</a></td>";
	print "<td>".$customer_name."</td>";
	print "<td>".$customer_email."</td>";
	print "<td>".$customer_phone."</td>";
	print "</tr>";

	}
}
?>
</table>
</body>
</html>