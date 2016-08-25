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


// Connects to your Database
mysql_connect("localhost", "inspector", "password") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;

	$inspection_id = mysql_real_escape_string($_POST['inspection_id']);

	$inspectionUpdate = array();

foreach($_POST as $key => $value)
	{
		if(($key != "saveForm") && ($key != "inspection_id")) //Prevent the submit button's name and value from being inserted into the db
		{
			
				$value=mysql_real_escape_string($_POST[$key]);
				$keyValue = $key." = '".$value."'";

				array_push($inspectionUpdate,$keyValue);
		}

			
	}
	
	$fieldsString = implode(',',$inspectionUpdate);


	$query = "UPDATE inspections SET $fieldsString WHERE id = '".$inspection_id."'";

	//echo $query;
	mysql_query($query) or die(mysql_error());

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