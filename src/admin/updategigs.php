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

  if(isset($_POST["addOrRemove"]))
  {
    $addOrRemove = $_POST["addOrRemove"];

    ////////////////////////////////////////////
    //  ADD
    if($addOrRemove == 'add')
    {
      //grab the post parameters
      $gigname = fetchPostParam("gigname");
      $date = fetchPostParam("date");
      $time = fetchPostParam("time");
      $address = fetchPostParam("address");
      $phone = fetchPostParam("phone");

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
        echo "Error: " . $query . "<br>" . $mysqli->error;
      }
      $mysqli->close();
    }

    //////////////////////////////////////////
    //  REMOVE
    else {
      echo 'remove';
    }
  }

  pageRedirect("admin.php");

?>
