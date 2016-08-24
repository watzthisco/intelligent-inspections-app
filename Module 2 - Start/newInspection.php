<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>
  <?php include "includes/header.php"; ?>

  
    <h2>New Inspection</h2>
    <form name="inspection-report" action="saveInspection.php" method="post" enctype="multipart/form-data">

      Property Number: <input type="text" size="10" name="prop_id"><br><br>


  <div id="form-container">

    <table border="1">
      <tr>
        <th>GENERAL INTERIOR</th>
        <th colspan="5">Condition</th>
        <th>NOTES</th>
        <th>Pictures</th>
      </tr>
      <tr>
        <td>Interior Walls</td>
        <td class="na"><input type="radio" name="interior_walls" value="0"></td>
        <td class="poor"><input type="radio" name="interior_walls" value="1"></td>
        <td class="fair"><input type="radio" name="interior_walls" value="2"></td>
        <td class="good"><input type="radio" name="interior_walls" value="3"></td>
        <td class="great"><input type="radio" name="interior_walls" value="4"></td>
        <td><textarea name="interior_walls_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="interior_walls_picture"></td>
      </tr>
      <tr>
        <td>Interior Ceilings</td>
        <td class="na"><input type="radio" name="interior_ceilings" value="0"></td>
        <td class="poor"><input type="radio" name="interior_ceilings" value="1"></td>
        <td class="fair"><input type="radio" name="interior_ceilings" value="2"></td>
        <td class="good"><input type="radio" name="interior_ceilings" value="3"></td>
        <td class="great"><input type="radio" name="interior_ceilings" value="4"></td>
        <td><textarea name="interior_ceilings_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="interior_ceilings_picture"></td>
      </tr>
      <tr>
        <td>Interior Flooring</td>
        <td class="na"><input type="radio" name="interior_flooring" value="0"></td>
        <td class="poor"><input type="radio" name="interior_flooring" value="1"></td>
        <td class="fair"><input type="radio" name="interior_flooring" value="2"></td>
        <td class="good"><input type="radio" name="interior_flooring" value="3"></td>
        <td class="great"><input type="radio" name="interior_flooring" value="4"></td>
        <td><textarea name="interior_flooring_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="interior_flooring_picture"></td>
      </tr>
      <tr>
        <td>Interior Lighting</td>
        <td class="na"><input type="radio" name="interior_lighting" value="0"></td>
        <td class="poor"><input type="radio" name="interior_lighting" value="1"></td>
        <td class="fair"><input type="radio" name="interior_lighting" value="2"></td>
        <td class="good"><input type="radio" name="interior_lighting" value="3"></td>
        <td class="great"><input type="radio" name="interior_lighting" value="4"></td>
        <td><textarea name="interior_lighting_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="interior_lighting_picture"></td>
      </tr>
      <tr>
        <td>Windows, Screens, Shutters</td>
        <td class="na"><input type="radio" name="windows_screens_shutters" value="0"></td>
        <td class="poor"><input type="radio" name="windows_screens_shutters" value="1"></td>
        <td class="fair"><input type="radio" name="windows_screens_shutters" value="2"></td>
        <td class="good"><input type="radio" name="windows_screens_shutters" value="3"></td>
        <td class="great"><input type="radio" name="windows_screens_shutters" value="4"></td>
        <td><textarea name="windows_screens_shutters_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="windows_screens_shutters_picture"></td>
      </tr>
      <tr>
        <td>Doors, Knobs, Locks</td>
        <td class="na"><input type="radio" name="doors_knobs_locks" value="0"></td>
        <td class="poor"><input type="radio" name="doors_knobs_locks" value="1"></td>
        <td class="fair"><input type="radio" name="doors_knobs_locks" value="2"></td>
        <td class="good"><input type="radio" name="doors_knobs_locks" value="3"></td>
        <td class="great"><input type="radio" name="doors_knobs_locks" value="4"></td>
        <td><textarea name="doors_knobs_locks_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="doors_knobs_locks_picture"></td>
      </tr>
      <tr>
        <td>Ceiling Fans</td>
        <td class="na"><input type="radio" name="ceiling_fans" value="0"></td>
        <td class="poor"><input type="radio" name="ceiling_fans" value="1"></td>
        <td class="fair"><input type="radio" name="ceiling_fans" value="2"></td>
        <td class="good"><input type="radio" name="ceiling_fans" value="3"></td>
        <td class="great"><input type="radio" name="ceiling_fans" value="4"></td>
        <td><textarea name="ceiling_fans_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="ceiling_fans_picture"></td>
      </tr>
      <tr>
        <td>Stairs and Handrails</td>
        <td class="na"><input type="radio" name="stairs_handrails" value="0"></td>
        <td class="poor"><input type="radio" name="stairs_handrails" value="1"></td>
        <td class="fair"><input type="radio" name="stairs_handrails" value="2"></td>
        <td class="good"><input type="radio" name="stairs_handrails" value="3"></td>
        <td class="great"><input type="radio" name="stairs_handrails" value="4"></td>
        <td><textarea name="stairs_handrails_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="stairs_handrails_picture"></td>
      </tr>
      <tr>
        <td>Smoke Alarms</td>
        <td class="na"><input type="radio" name="smoke_alarms" value="0"></td>
        <td class="poor"><input type="radio" name="smoke_alarms" value="1"></td>
        <td class="fair"><input type="radio" name="smoke_alarms" value="2"></td>
        <td class="good"><input type="radio" name="smoke_alarms" value="3"></td>
        <td class="great"><input type="radio" name="smoke_alarms" value="4"></td>
        <td><textarea name="smoke_alarms_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="smoke_alarms_picture"></td>
      </tr>
      <tr>
        <td>Fireplaces</td>
        <td class="na"><input type="radio" name="fireplaces" value="0"></td>
        <td class="poor"><input type="radio" name="fireplaces" value="1"></td>
        <td class="fair"><input type="radio" name="fireplaces" value="2"></td>
        <td class="good"><input type="radio" name="fireplaces" value="3"></td>
        <td class="great"><input type="radio" name="fireplaces" value="4"></td>
        <td><textarea name="fireplaces_notes" cols="40" rows="4"></textarea></td>
        <td><input type="file" name="fireplaces_picture"></td>
      </tr>
    </table>

    <input type="submit" name="saveForm" value="SAVE">



  </div>
  </form>
  </body>
</html>