<?
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if($_POST){
$database_name = "eventDB";
$mysql_host = "localhost"; //almost always 'localhost'
$database_user = "root";
$database_pwd = "root";
$dbc = mysql_connect($mysql_host, $database_user, $database_pwd);
if(!$dbc)
{
    die("We are currently experiencing very heavy traffic to our site, please be patient and try again shortly.");
}
$db = mysql_select_db($database_name);
$i=0;
if($_POST['remote_access']!=0)
    $i=1;
if(!$db)
{
    die("Failed to connect to database - check your database name.");
}
$sql = "insert into event(eventName, rmtAcc, smsP, avgWaitTime, closeF)
values('".$_POST['event_name']."', '".$i."', '".$_POST['SMS_parameters']."', '".$_POST['avg_wt']."', '".$_POST['closef']."');";
$res = mysql_query($sql);
$sql1 = "insert into passwords(passwordEnc) values(MD5('".($_POST['password'])."');";
$res1 = mysql_query($sql1);
echo $res1;
echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
?>
