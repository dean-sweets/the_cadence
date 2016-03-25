<?php
session_start();
function fetchPostParam($param)
{
  return isset($_POST[$param]) ? $_POST[$param] : "";
}

function fetchGetParam($param)
{
  return isset($_GET[$param]) ? $_GET[$param] : "";
}

function fetchSessionParam($param)
{
  return isset($_SESSION[$param]) ? $_SESSION[$param] : "";
}



?>
