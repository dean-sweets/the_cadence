<?php
function pageRedirect($url, $plmsg = null)
{
  $headerstr = "Location: " . $url;
  if($plmsg == null || $plmsg == "")
  {
    $_SESSION["plmsg"] = "";
  }
  else {
    $_SESSION["plmsg"] = $plmsg;
  }
  
  header($headerstr);
  exit;
}
?>
