<?php
  session_start();

  //TODO kick this 'check if logged in' stuff out to a function
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
  {
    $loggedin = true;
  }
  else {
    $loggedin = false;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>The Cadence</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="mainWrapper">
      <?php if(!$loggedin) { ?>

        <!-- Login page -->
        <div class="login">
          <h1>Login to Web App</h1>
          <form method="post" action="verifyadminlogin.php">
            <p><input type="text" name="login" value="" placeholder="Username"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
          </form>
        </div>

      <?php } else {?>
          <!-- Admin Console -->
          <?php require('adminconsole.php'); ?>
      <?php } ?>
    </div>
  </body>
</html>
