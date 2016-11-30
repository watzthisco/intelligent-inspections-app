<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php

include "includes/dbconn.php";



	$prop_id = mysqli_real_escape_string($con,$_POST['prop_id']);
	$propertyFields = array();
	$propertyValues = array();

foreach($_POST as $key => $value)
	{
		if($key != "saveForm") //Prevent the submit button's name and value from being inserted into the db
		{
			//echo "Key: ".$key."<br>";
			
				$value=mysqli_real_escape_string($con,$_POST[$key]);
				array_push($propertyFields,$key);
				array_push($propertyValues,$value);
		}

			
	}
	
	$fieldsString = implode(',',$propertyFields);
	$valuesString = "\"".implode('","',$propertyValues)."\"";


	$query = "INSERT INTO properties ($fieldsString) VALUES ($valuesString)";
	//echo $query;
	mysqli_query($con,$query) or die(mysqli_error($con));


?>
</body>
</html>