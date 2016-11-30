<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//This is the directory where images will be saved
$target = "pics/";


include "includes/dbconn.php";


	$prop_id = mysqli_real_escape_string($con,$_POST['prop_id']);
	$inspectionFields = array();
	$inspectionValues = array();

foreach($_POST as $key => $value)

{
if(($key != "saveForm") && (substr($key, -7) != "picture"))//Prevent the submit button and file inputs from being saved.
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
mysqli_query($con, $query) or die(mysqli_connect_error());



//insert and move pictures
foreach($_FILES as $key => $file){


$file_url = $target.basename( $file['name']);



if( !empty( $file['tmp_name'] ) && is_uploaded_file( $file['tmp_name'] ) )
{
$query = "INSERT INTO pictures (prop_id,file_url) VALUES ('$prop_id', '$file_url')";

mysqli_query($con, $query);
// the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
// do something with it:
echo "Uploading ".$file['name']."<br>";
move_uploaded_file( $file['tmp_name'], $file_url ); // move to new location
}

}

?>
<h1>Success!</h1>