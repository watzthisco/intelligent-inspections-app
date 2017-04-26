<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
<?php

//This is the directory where images will be saved
$target = "pics/";


include "includes/dbconn.php";



	$prop_id = mysqli_real_escape_string($con,$_POST['prop_id']);
	$inspectionFields = array();
	$inspectionValues = array();

foreach($_POST as $key => $value)
	{
		if($key != "saveForm") //Prevent the submit button's name and value from being inserted into the db
		{
			//echo "Key: ".$key."<br>";
			
				$value=mysqli_real_escape_string($con,$_POST[$key]);
				array_push($inspectionFields,$key);
				array_push($inspectionValues,$value);
		}

			
	}
	
	$fieldsString = implode(',',$inspectionFields);
	$valuesString = "\"".implode('","',$inspectionValues)."\"";


	$query = "INSERT INTO inspections ($fieldsString) VALUES ($valuesString)";
	//echo $query;
	mysqli_query($con,$query) or die(mysqli_error($con));

	//insert and move pictures
	foreach($_FILES as $file){
    	
    	$file_url = $target.basename( $file['name']);
    	


		if( !empty( $file['tmp_name'] ) && is_uploaded_file( $file['tmp_name'] ) )
        {
        	$query = "INSERT INTO pictures (prop_id,file_url) VALUES ('$prop_id', '$file_url')";

			mysqli_query($con,$query);
            // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
            // do something with it:
			echo "Uploading ".$file['name']."<br>";
            move_uploaded_file( $file['tmp_name'], $file_url ); // move to new location perhaps?
        }

    }

?>
</body>
</html>