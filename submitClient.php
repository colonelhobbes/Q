<?

if($_POST){
	echo "Server: nmbzrmx555.database.windows.net,1433 \r\nSQL Database: eventDB\r\nUser Name: eecs\r\n\r\nPHP Data Objects(PDO) Sample Code:\r\n\r\ntry {\r\n   $conn = new PDO ( \"sqlsrv:server = tcp:nmbzrmx555.database.windows.net,1433; Database = eventDB\", \"eecs\", \"{your_password_here}\");\r\n    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );\r\n}\r\ncatch ( PDOException $e ) {\r\n   print( \"Error connecting to SQL Server.\" );\r\n   die(print_r($e));\r\n}\r\n\rSQL Server Extension Sample Code:\r\n\r\n$connectionInfo = array(\"UID\" => \"eecs@nmbzrmx555\", \"pwd\" => \"{your_password_here}\", \"Database\" => \"eventDB\", \"LoginTimeout\" => 30, \"Encrypt\" => 1);\r\n$serverName = \"tcp:nmbzrmx555.database.windows.net,1433\";\r\n$conn = sqlsrv_connect($serverName, $connectionInfo);";
$database_name = "eventDB";
$mysql_host = "nmbzrmx555.database.windows.net,1433"; //almost always 'localhost'
$database_user = "eecs";
$database_pwd = "IntelNUC777";
echo('hello1');
$dbc = mssql_connect($mysql_host, $database_user, $database_pwd);
echo('hello');
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
echo(mssql_get_last_message());

echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
?>
