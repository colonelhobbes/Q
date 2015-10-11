<?
if($_POST){
$database_name = "eventDB";
$mysql_host = "nmbzrmx555.database.windows.net,1433"; //almost always 'localhost'
$database_user = "eecs";
$database_pwd = "IntelNUC777";
$dbc = mssql_connect($mysql_host, $database_user, $database_pwd);
if(!$dbc)
{
    die("We are currently experiencing very heavy traffic to our site, please be patient and try again shortly.");
}
$db = mssql_select_db($database_name);
if(!$db)
{
    die("Failed to connect to database - check your database name.");
}
$sql = "insert into client(clientName, clientAreaCode, eventName, clientPhone, eventID)
values('".$_POST['name']."', '".$_POST['area_code']."', '".$_POST['eventName']."', '".$_POST['phone_number']."', '".$_POST['eventID']."');";
$res = mssql_query($sql);

echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}