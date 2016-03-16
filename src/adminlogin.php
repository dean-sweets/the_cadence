<?php
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
  {
    $loggedin = true;
    echo "you're logged in!!!";
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

        <div class="login">
          <h1>Login to Web App</h1>
          <form method="post" action="verifyadminlogin.php">
            <p><input type="text" name="login" value="" placeholder="Username"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
          </form>
        </div>

      <?php } ?>
    </div>
  </body>
</html>
