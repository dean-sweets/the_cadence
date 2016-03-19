<?php
function plMsgPrint()
{
  $plmsg = fetchSessionParam("plmsg");
  if($plmsg != null && $plmsg != "")
  {
    echo $plmsg;
    $_SESSION["plmsg"] = ""; //reset the plmsg back to nothing after it's printed
  }
}
?>
