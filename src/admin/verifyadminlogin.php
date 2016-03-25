<?php
  include_once('../includes/commonincludes.php');

  $username = $_POST["login"];
  $password = $_POST["password"];

  // A higher "cost" is more secure but consumes more processing power
  $cost = 10;

  $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

  // this is so php can recognize / verify this later. "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
  $salt = sprintf("$2a$%02d$", $cost) . $salt;
  $hash = crypt($password, $salt);

  //grab the username/password from the database
  $mysqli = new mysqli("localhost", "cadence_admin", "cadence3jk1h", "cadence_db");
  if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
  $query = "SELECT * FROM admin_creds where active = 1";
  if ($result = $mysqli->query($query)) {
      while ($row = $result->fetch_assoc()) {
        $dbusername = $row["username"];
        $dbhash = $row["password"];
      }
      $result->close();
  }
  $mysqli->close();

  if($username == $dbusername && password_verify($password, $dbhash))
  {
    //match!  add login flag to session then reroute back to admin.php
    $_SESSION["loggedin"] = true;
    header("Location: admin.php");
    exit;
  }
  else
  {
    //username or password did not match.  reroute back to admin.php
    header("Location: admin.php");
    exit;
  }
?>
