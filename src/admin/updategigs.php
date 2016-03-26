<?php
//////////////////////////////////////////////////////
// this file adds or removes a gig from the database
//////////////////////////////////////////////////////

  function validateDate($date)
  {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;
  }

  include_once('../includes/commonincludes.php');

  if(isset($_GET["addOrRemove"]))
  {
    $addOrRemove = $_GET["addOrRemove"];

    ////////////////////////////////////////////
    //  ADD
    if($addOrRemove == 'add')
    {
      //grab the post parameters
      $gigname = fetchGetParam("gigname");
      $date = fetchGetParam("date");
      $time = fetchGetParam("time");
      $address = fetchGetParam("address");
      $phone = fetchGetParam("phone");

      //validate the parameters
      //TODO expand on this, just doing date for now
      $validDate = validateDate($date);
      if(!$validDate)
      {
        pageRedirect("add_gig.php", $GIG_DATE_FORMAT_ERROR);
      }

      //add the gig to the database
      $mysqli = getMysqlConnection();
      if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
      $query = $phone != "" ? "insert into gigs (name, date, time, address, phone) " . "values ('{$gigname}', '{$date}', '{$time}', '{$address}', {$phone});"
      : "insert into gigs (name, date, time, address) " . "values ('{$gigname}', '{$date}', '{$time}', '{$address}');";
      if ($mysqli->query($query)) {
        pageRedirect("admin.php", $GIG_ADD_SUCCESS);
      }
      else {
        echo "Error: " . $query . "<br>" . $mysqli->error;//TODO FIXME this should also redirect to admin.php, but with an error message
      }
      $mysqli->close();
    }

    //////////////////////////////////////////
    //  REMOVE
    else
    {
      $mysqli = getMysqlConnection();
      if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());exit();}
      $query = "delete from gigs where gig_id = " . fetchGetParam("gig_id") . ";";
      if ($mysqli->query($query)) {
        pageRedirect("admin.php", $GIG_REMOVE_SUCESS);
      }
      else {
        echo "Error: " . $query . "<br>" . $mysqli->error; //TODO FIXME this should also redirect to admin.php, but with an error message
      }
      $mysqli->close();
    }
  }

  pageRedirect("admin.php");

?>
