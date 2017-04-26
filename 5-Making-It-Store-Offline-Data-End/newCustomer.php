<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>
  <div>

    <h2>New Customer</h2>
    <form name="inspection-report" action="saveCustomer.php" method="post" enctype="multipart/form-data">

      Customer Name: <input type="text" size="40" name="customer_name"><br><br>
      Customer Email: <input type="text" size="40" name="customer_email"><br><br>
      Customer Phone: <input type="text" size="40" name="customer_phone"><br><br>

    <input type="submit" name="saveForm" value="SAVE">

  </form>
  </div>

  </body>
</html>