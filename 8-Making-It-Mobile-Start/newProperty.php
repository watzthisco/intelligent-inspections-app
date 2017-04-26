<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>

  <div>

    <h2>New Property</h2>

    <form name="inspection-report" action="saveProperty.php" method="post" enctype="multipart/form-data">

      Customer Number: <input type="text" size="10" name="cust_id"><br><br>
      Address: <input type="text" size="40" name="address"><br><br>
      City: <input type="text" size="40" name="city">
      State: <input type="text" size="10" name="state">
      Zip: <input type="text" size="10" name="zip"><br><br>
  </div>
  
    <input type="submit" name="saveForm" value="SAVE">


  </div>
  </form>
  </body>
</html>

