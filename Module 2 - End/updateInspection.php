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

//This is the directory where images will be saved
$target = "pics/";


include "includes/dbconn.php";

	$inspection_id = mysqli_real_escape_string($con,$_POST['inspection_id']);

	$inspectionUpdate = array();

foreach($_POST as $key => $value)
	{
		if(($key != "saveForm") && ($key != "inspection_id")) //Prevent the submit button's name and value from being inserted into the db
		{
			
				$value=mysqli_real_escape_string($con,$_POST[$key]);
				$keyValue = $key." = '".$value."'";

				array_push($inspectionUpdate,$keyValue);
		}

			
	}
	
	$fieldsString = implode(',',$inspectionUpdate);


	$query = "UPDATE inspections SET $fieldsString WHERE id = '".$inspection_id."'";

	//echo $query;
	mysqli_query($con,$query) or die(mysqli_error($con));

	/*
	//insert and move pictures
	foreach($_FILES as $file){
    	
    	$file_url = $target.basename( $file['name']);
    	


		if( !empty( $file['tmp_name'] ) && is_uploaded_file( $file['tmp_name'] ) )
        {
        	$query = "INSERT INTO pictures (prop_id,file_url) VALUES ('$prop_id', '$file_url')";

			mysql_query($query);
            // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
            // do something with it:
			echo "Uploading ".$file['name']."<br>";
            move_uploaded_file( $file['tmp_name'], $file_url ); // move to new location perhaps?
        }

    }
    */

?>
</body>
</html>