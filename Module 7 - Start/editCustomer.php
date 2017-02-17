<?php

include "includes/dbconn.php";


$customer_id = mysqli_real_escape_string($con,$_GET['id']);
$query = "SELECT * FROM CUSTOMERS WHERE id=".$customer_id;
$result = mysqli_query($con,$query) or die('problem getting data');
$customer = mysqli_fetch_assoc($result);
?>
<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>

    <h2>Edit Customer <?php echo $customer['id'] ?></h2>
    <form name="customerUpdate" action="updateCustomer.php" method="post">
    	<input type="hidden" name="cust_id" value="<?= $customer_id ?>">
      Customer Name: <input type="text" size="40" name="customer_name" value="<?= $customer['customer_name'] ?>"><br><br>
      Customer Email: <input type="text" size="40" name="customer_email" value="<?= $customer['customer_email'] ?>"><br><br>
      Customer Phone: <input type="text" size="40" name="customer_phone" value="<?= $customer['customer_phone'] ?>"><br><br>

    <input type="submit" name="saveForm" value="SAVE">
</body>
</html>