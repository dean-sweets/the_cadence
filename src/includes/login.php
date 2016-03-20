<?php
//this file manages everything and anything having to do with logging in, and the login session

function login()
{
  $_SESSION["loggedin"] = true;
}

function logout()
{
  $_SESSION["loggedin"] = false;
}

function isLoggedIn()
{
  $loggedin = fetchSessionParam("loggedin");
  if($loggedin === true)
  {
    return true;
  }
  return false;
}

function redirectIfNotLoggedIn($redirectUrl)
{
  $isLoggedIn = isLoggedIn();
  if(!$isLoggedIn)
  {
    pageRedirect($redirectUrl, "You need to be logged in to do that.  Please log in.");
  }
}

?>
