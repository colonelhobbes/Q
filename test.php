<?
$sql = "SELECT passwords.id, passwordEnc FROM passwords, event WHERE event.id = passwords.id ANd passwords.passwordEnc=MD5(".$_POST['password'].");";
?>