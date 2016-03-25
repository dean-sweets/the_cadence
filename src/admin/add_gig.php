<?php
  require('../includes/commonincludes.php');

  //if you aren't logged in, you can't view this page
  redirectIfNotLoggedIn("admin.php");
?>

<h1>Add a Gig</h1>
<form method="post" action="updategigs.php">
  <p><input type="text" name="gigname" value="" placeholder="Venue / Name" required></p>
  <p><input type="text" name="date" value="" placeholder="Date" required></p>
  <p><input type="text" name="time" value="" placeholder="Time" required></p>
  <p><input type="text" name="address" value="" placeholder="Address" required></p>
  <p><input type="number" name="phone" value="" placeholder="Contact Phone"></p>
  <p><input type="text" name="addOrRemove" value="add" style="display: none;"></p>
  <p class="submit"><input type="submit" name="addgig" value="Add"></p>
</form>

<h5 style="color: #e33;"><?php plMsgPrint(); ?></h5>
