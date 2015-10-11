<?php
// the message
$msg = "Notification";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("satej1210@live.com","My subject",$msg);
?>