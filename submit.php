<?
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
values('".clean($_POST['event_name'])."', '".$i."', '".clean ($_POST['SMS_parameters'])."', '".clean($_POST['avg_wt'])."', '".clean ($_POST['closef'])."');";
$res = mysql_query($sql);
echo 'Thank you for your response!';
}
?>