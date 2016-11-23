<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/



// Connects to your Database
mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;

	$customerFields = array();
	$customerValues = array();

foreach($_POST as $key => $value)
	{
		if($key != "saveForm") //Prevent the submit button's name and value from being inserted into the db
		{
			//echo "Key: ".$key."<br>";
			
				$value=mysql_real_escape_string($_POST[$key]);
				array_push($customerFields,$key);
				array_push($customerValues,$value);
		}

			
	}
	
	$fieldsString = implode(',',$customerFields);
	$valuesString = "\"".implode('","',$customerValues)."\"";


	$query = "INSERT INTO customers ($fieldsString) VALUES ($valuesString)";
	//echo $query;
	mysql_query($query) or die(mysql_error());


?>
</body>
</html>