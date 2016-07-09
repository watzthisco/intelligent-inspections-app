<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Inspection Saved</title>
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="sectionue">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        <meta http-equiv="cleartype" content="on">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" sizes="196x196" href="img/touch/touch-icon-196x196.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <!-- SEO: If mobile URL is different from desktop URL, add a canonical link to the desktop page -->
        <!--
        <link rel="canonical" href="http://www.example.com/" >
        -->

        <!-- Add to homescreen for Chrome on Android -->

        <meta name="mobile-web-app-capable" content="yes">


        <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="">

        <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->

        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.prevendivefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body>
    <h2>Inspection Saved</h2>
<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

//This is the directory where images will be saved
$target = "pics/";


// Connects to your Database
mysql_connect("mysql.codingjsfordummies.com", "intelinspector", "inspectme!") or die(mysql_error()) ;
mysql_select_db("intelligentinspections") or die(mysql_error()) ;



	$prop_id = mysql_real_escape_string($_POST['prop_id']);
	$inspectionFields = array();
	$inspectionValues = array();

foreach($_POST as $key => $value)
	{
		if($key != "saveForm") //Prevent the submit button's name and value from being inserted into the db
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
    	$file_name = microtime(true).$file['name'];
    	$file_url = $target.basename($file_name);
    	


		if( !empty( $file['tmp_name'] ) && is_uploaded_file( $file['tmp_name'] ) )
        {
        	$query = "INSERT INTO pictures (prop_id,file_url) VALUES ('$prop_id', '$file_url')";

			mysql_query($query);
            // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
            // do something with it:
			echo "Uploading ".$file_name."<br>";
            move_uploaded_file( $file['tmp_name'], $file_url ); // move to new location perhaps?
        }

    }

?>
</body>
</html>