<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php

// Connects to your Database
mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;

	$customer_id = mysql_real_escape_string($_POST['cust_id']);

	$customerUpdate = array();

foreach($_POST as $key => $value)
	{
		if(($key != "saveForm") && ($key != "cust_id")) //Prevent the submit button's name and value from being inserted into the db
		{
			
				$value=mysql_real_escape_string($_POST[$key]);
				$keyValue = $key." = '".$value."'";

				array_push($customerUpdate,$keyValue);
		}

			
	}
	
	$fieldsString = implode(',',$customerUpdate);


	$query = "UPDATE customers SET $fieldsString WHERE id = '".$customer_id."'";
	//echo $query;
	mysql_query($query) or die(mysql_error());

	

?>
</body>
</html>