<?
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if($_POST){
$database_name = "eventDB";
$mysql_host = "nmbzrmx555.database.windows.net"; //almost always 'localhost'
$database_user = "eecs";
$database_pwd = "IntelNUC777";
$dbc = OpenConnection();
echo('hi');
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

function OpenConnection()
{
    try
    {
        $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
        $connectionOptions = array("Database"=>"eventDB",
            "Uid"=>"eecs@nmbzrmx555", "PWD"=>"IntelNUC777");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}