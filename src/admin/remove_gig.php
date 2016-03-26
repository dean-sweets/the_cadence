<?php
require("../includes/commonincludes.php");

$mysqli = getMysqlConnection();
if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
$query = "select * from gigs where expired = 0;";
?>
<!DOCTYPE html>
<html>
<head><title>Remove Gig</title></head>
<body>
<table border="1">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Date</th>
    <th>Address</th>
    <th>Time</th>
    <th>Action</th>
  </tr>
  <?php if ($result = $mysqli->query($query)) { ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row["gig_id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["date"]; ?></td>
        <td><?php echo $row["address"]; ?></td>
        <td><?php echo $row["time"]; ?></td>
        <td><a href="updategigs.php?addOrRemove=remove&gig_id=<?php echo $row["gig_id"]; ?>">Delete</a></td>

      </tr>
    <?php } ?>
    <?php $result->free();?>
  <?php } $mysqli->close(); ?>
</table>
</body>
</html>
