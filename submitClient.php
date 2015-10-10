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

if(!$db)
{
    die("Failed to connect to database - check your database name.");
}
$sql = "insert into client(clientName, clientAreaCode, eventName, clientPhone, eventID)
values('".$_POST['name']."', '".$_POST['area_code']."', '".$_POST['eventName']."', '".$_POST['phone_number']."', '".$_POST['eventID']."');";
$res = mysql_query($sql);
echo(mysql_error());

echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
?>
