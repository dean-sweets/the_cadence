<?php
require("includes/commonincludes.php");

$mysqli = getMysqlConnection();
if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
$query = "select * from gigs where expired = 0;";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>The Cadence</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="mainWrapper">
      <div class="navbar">
        <a href="#" class="logo-link">
          <img src="assets/images/logo.png" class="logo">
        </a>
        <div class="menubutton-container">
          <a href="#" class="menubutton">
            Home
          </a>
          <a href="#" class="menubutton">
            Media
          </a>
          <a href="#" class="menubutton">
            Gigs
          </a>
          <a href="#" class="menubutton">
            Contact
          </a>
        </div>
      </div>
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
      <div class="footer">

      </div>
    </div>
  </body>
</html>
