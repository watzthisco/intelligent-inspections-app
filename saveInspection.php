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



	$prop_id = mysql_real_escape_string($_POST['prop_id']);
	$inspectionFields = array();
	$inspectionValues = array();

foreach($_POST as $key => $value)
{
if(($key != "saveForm") && (substr($key, -7) != "picture"))//Prevent the submit button's name and value from being inserted into the db
{
//echo "Key: ".$key."<br>";

$value=mysql_real_escape_string($_POST[$key]);
array_push($inspectionFields,$key);
array_push($inspectionValues,$value);
}


}

$fieldsString = implode(',',$inspectionFields);
$valuesString = "\"".implode('","',$inspectionValues)."\"";


$query = "INSERT INTO inspections ($fieldsString) VALUES ($valuesString)";
//echo $query;
mysql_query($query) or die(mysql_error());

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

?>
<h1>Success!</h1>