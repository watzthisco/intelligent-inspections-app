<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php



include "includes/dbconn.php";

	$customerFields = array();
	$customerValues = array();

foreach($_POST as $key => $value)
	{
		if($key != "saveForm") //Prevent the submit button's name and value from being inserted into the db
		{
			//echo "Key: ".$key."<br>";
			
				$value=mysqli_real_escape_string($con,$_POST[$key]);
				array_push($customerFields,$key);
				array_push($customerValues,$value);
		}

			
	}
	
	$fieldsString = implode(',',$customerFields);
	$valuesString = "\"".implode('","',$customerValues)."\"";


	$query = "INSERT INTO customers ($fieldsString) VALUES ($valuesString)";
	//echo $query;
	mysqli_query($con,$query) or die(mysqli_error($con));


?>
</body>
</html>