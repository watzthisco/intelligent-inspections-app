<?php

include "includes/dbconn.php";

$inspection_id = mysqli_real_escape_string($con,$_GET['id']);
$query = "SELECT * FROM INSPECTIONS WHERE id=".$inspection_id;
$result = mysqli_query($con,$query) or die('problem getting data');
$inspection = mysqli_fetch_assoc($result);
?>
<html>
  <head>
    <title>Intelligent Inspections, Inc. Inspection Form</title>
    <link rel="stylesheet" type="text/css" href="css/ii.css">
  </head>
  <body>

  <?php include "includes/header.php"; ?>

    <h2>Edit Inspection</h2>
    <form name="inspection-report" action="updateInspection.php" method="post" enctype="multipart/form-data">

      Property Number: <input type="text" size="10" name="inspection_id" value="<?php echo $inspection["prop_id"] ?>"><br><br>

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
        <td class="na"><input type="radio" name="interior_walls" value="0" <?php echo ($inspection['interior_walls'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="interior_walls" value="1" <?php echo ($inspection['interior_walls'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="interior_walls" value="2" <?php echo ($inspection['interior_walls'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="interior_walls" value="3" <?php echo ($inspection['interior_walls'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="interior_walls" value="4" <?php echo ($inspection['interior_walls'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="interior_walls_notes" cols="40" rows="4"><?php echo $inspection["interior_walls_notes"] ?></textarea></td>
        <td><input type="file" name="interior_walls_picture" value="<?php echo $inspection["interior_walls_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Interior Ceilings</td>
        <td class="na"><input type="radio" name="interior_ceilings" value="0" <?php echo ($inspection['interior_ceilings'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="interior_ceilings" value="1" <?php echo ($inspection['interior_ceilings'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="interior_ceilings" value="2" <?php echo ($inspection['interior_ceilings'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="interior_ceilings" value="3" <?php echo ($inspection['interior_ceilings'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="interior_ceilings" value="4" <?php echo ($inspection['interior_ceilings'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="interior_ceilings_notes" cols="40" rows="4"><?php echo $inspection["interior_ceilings_notes"] ?></textarea></td>
        <td><input type="file" name="interior_ceilings_picture" value="<?php echo $inspection["interior_ceilings_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Interior Flooring</td>
        <td class="na"><input type="radio" name="interior_flooring" value="0" <?php echo ($inspection['interior_flooring'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="interior_flooring" value="1" <?php echo ($inspection['interior_flooring'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="interior_flooring" value="2" <?php echo ($inspection['interior_flooring'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="interior_flooring" value="3" <?php echo ($inspection['interior_flooring'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="interior_flooring" value="4" <?php echo ($inspection['interior_flooring'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="interior_flooring_notes" cols="40" rows="4"><?php echo $inspection["interior_flooring_notes"] ?></textarea></td>
        <td><input type="file" name="interior_flooring_picture" value="<?php echo $inspection["interior_flooring_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Interior Lighting</td>
        <td class="na"><input type="radio" name="interior_lighting" value="0" <?php echo ($inspection['interior_lighting'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="interior_lighting" value="1" <?php echo ($inspection['interior_lighting'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="interior_lighting" value="2" <?php echo ($inspection['interior_lighting'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="interior_lighting" value="3" <?php echo ($inspection['interior_lighting'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="interior_lighting" value="4" <?php echo ($inspection['interior_lighting'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="interior_lighting_notes" cols="40" rows="4"><?php echo $inspection["interior_lighting_notes"] ?></textarea></td>
        <td><input type="file" name="interior_lighting_picture" value="<?php echo $inspection["interior_lighting_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Windows, Screens, Shutters</td>
        <td class="na"><input type="radio" name="windows_screens_shutters" value="0" <?php echo ($inspection['windows_screens_shutters'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="windows_screens_shutters" value="1" <?php echo ($inspection['windows_screeens_shutters'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="windows_screens_shutters" value="2" <?php echo ($inspection['windows_screens_shutters'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="windows_screens_shutters" value="3" <?php echo ($inspection['windows_screens_shutters'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="windows_screens_shutters" value="4" <?php echo ($inspection['windows_screens_shutters'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="windows_screens_shutters_notes" cols="40" rows="4"><?php echo $inspection["windows_screens_shutters_notes"] ?></textarea></td>
        <td><input type="file" name="windows_screens_shutters_picture" value="<?php echo $inspection["windows_screens_shutters_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Doors, Knobs, Locks</td>
        <td class="na"><input type="radio" name="doors_knobs_locks" value="0" <?php echo ($inspection['doors_knobs_locks'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="doors_knobs_locks" value="1" <?php echo ($inspection['doors_knobs_locks'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="doors_knobs_locks" value="2" <?php echo ($inspection['doors_knobs_locks'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="doors_knobs_locks" value="3" <?php echo ($inspection['doors_knobs_locks'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="doors_knobs_locks" value="4" <?php echo ($inspection['doors_knobs_locks'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="doors_knobs_locks_notes" cols="40" rows="4"><?php echo $inspection["doors_knobs_locks_notes"] ?></textarea></td>
        <td><input type="file" name="doors_knobs_locks_picture" value="<?php echo $inspection["doors_knobs_locks_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Ceiling Fans</td>
        <td class="na"><input type="radio" name="ceiling_fans" value="0" <?php echo ($inspection['ceiling_fans'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="ceiling_fans" value="1" <?php echo ($inspection['ceiling_fans'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="ceiling_fans" value="2" <?php echo ($inspection['ceiling_fans'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="ceiling_fans" value="3" <?php echo ($inspection['ceiling_fans'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="ceiling_fans" value="4" <?php echo ($inspection['ceiling_fans'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="ceiling_fans_notes" cols="40" rows="4"><?php echo $inspection["ceiling_fans_notes"] ?></textarea></td>
        <td><input type="file" name="ceiling_fans_picture" value="<?php echo $inspection["ceiling_fans_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Stairs and Handrails</td>
        <td class="na"><input type="radio" name="stairs_handrails" value="0" <?php echo ($inspection['stairs_handrails'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="stairs_handrails" value="1" <?php echo ($inspection['stairs_handrails'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="stairs_handrails" value="2" <?php echo ($inspection['stairs_handrails'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="stairs_handrails" value="3" <?php echo ($inspection['stairs_handrails'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="stairs_handrails" value="4" <?php echo ($inspection['stairs_handrails'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="stairs_handrails_notes" cols="40" rows="4"><?php echo $inspection["stairs_handrails_notes"] ?></textarea></td>
        <td><input type="file" name="stairs_handrails_picture" value="<?php echo $inspection["stairs_handrails_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Smoke Alarms</td>
        <td class="na"><input type="radio" name="smoke_alarms" value="0" <?php echo ($inspection['smoke_alarms'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="smoke_alarms" value="1" <?php echo ($inspection['smoke_alarms'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="smoke_alarms" value="2" <?php echo ($inspection['smoke_alarms'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="smoke_alarms" value="3" <?php echo ($inspection['smoke_alarms'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="smoke_alarms" value="4" <?php echo ($inspection['smoke_alarms'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="smoke_alarms_notes" cols="40" rows="4"><?php echo $inspection["smoke_alarms_notes"] ?></textarea></td>
        <td><input type="file" name="smoke_alarms_picture" value="<?php echo $inspection["smoke_alarms_picture"] ?>"></td>
      </tr>
      <tr>
        <td>Fireplaces</td>
        <td class="na"><input type="radio" name="fireplaces" value="0" <?php echo ($inspection['fireplaces'] == '0') ? 'checked="checked"' : ''; ?>></td>
        <td class="poor"><input type="radio" name="fireplaces" value="1" <?php echo ($inspection['fireplaces'] == '1') ? 'checked="checked"' : ''; ?>></td>
        <td class="fair"><input type="radio" name="fireplaces" value="2" <?php echo ($inspection['fireplaces'] == '2') ? 'checked="checked"' : ''; ?>></td>
        <td class="good"><input type="radio" name="fireplaces" value="3" <?php echo ($inspection['fireplaces'] == '3') ? 'checked="checked"' : ''; ?>></td>
        <td class="great"><input type="radio" name="fireplaces" value="4" <?php echo ($inspection['fireplaces'] == '4') ? 'checked="checked"' : ''; ?>></td>
        <td><textarea name="fireplaces_notes" cols="40" rows="4"><?php echo $inspection["fireplaces_notes"] ?></textarea></td>
        <td><input type="file" name="fireplaces_picture" value="<?php echo $inspection["fireplaces_picture"] ?>"></td>
      </tr>
    </table>

    <input type="submit" name="saveForm" value="SAVE">



  </div>
  </form>
  </body>
</html>

