<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php

include "includes/dbconn.php";

	$customer_id = mysqli_real_escape_string($con,$_POST['cust_id']);

	$customerUpdate = array();

foreach($_POST as $key => $value)
	{
		if(($key != "saveForm") && ($key != "cust_id")) //Prevent the submit button's name and value from being inserted into the db
		{
			
				$value=mysqli_real_escape_string($con,$_POST[$key]);
				$keyValue = $key." = '".$value."'";

				array_push($customerUpdate,$keyValue);
		}

			
	}
	
	$fieldsString = implode(',',$customerUpdate);


	$query = "UPDATE customers SET $fieldsString WHERE id = '".$customer_id."'";
	//echo $query;
	mysqli_query($con,$query) or die(mysqli_error($con));

	

?>
</body>
</html>