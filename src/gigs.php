<?php
require("includes/commonincludes.php");

$mysqli = getMysqlConnection();
if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
$query = "select * from gigs where expired = 0;";
?>
<!DOCTYPE html>
<html>
  <?php require("includes/html_partials/html_head.php"); ?>
  <body>
    <div class="mainWrapper">
      <?php require("includes/html_partials/navbar.php") ?>
      <div class="content">
        <h1>Gigs</h1>
        <table border="1">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date</th>
            <th>Address</th>
            <th>Time</th>
            <th>Phone</th>
          </tr>
          <?php if ($result = $mysqli->query($query)) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $row["gig_id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["time"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
              </tr>
            <?php } ?>
            <?php $result->free();?>
          <?php } $mysqli->close(); ?>
        </table>
      </div>
      <?php require("includes/html_partials/footer.php"); ?>
    </div>
  </body>
</html>
