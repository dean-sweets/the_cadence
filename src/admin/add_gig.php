<?php
  require('../includes/commonincludes.php');
  //if you aren't logged in, you can't view this page
  //TODO kick this 'check if logged in' stuff out to a function
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
  {
    header("Location: admin.php");
    exit;
  }
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

<h5><?php plMsgPrint(); ?></h5>
