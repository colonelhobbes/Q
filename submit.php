<?
if($_POST){

 $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
   $userName = 'eecs@nmbzrmx555';
   $userPassword = 'IntelNUC777';
   $dbName = "eventDB";
   $table = "event";
   $server = "tcp:nmbzrmx555.database.windows.net,1433";
$user = "eecs@nmbzrmx555";
$pwd = "IntelNUC777";
$db = "eventDB";
$sUsername = 'eecs@nmbzrmx555';
$sPassword = 'IntelNUC777';
$sHost = 'tcp:nmbzrmx555.database.windows.net,1433';
$sDb = 'eventDB';
$dsn = "sqlsrv:Server=$server;Database=$db";
try {
    $oConn = new PDO('mysql:host='.$sHost.';dbname='.$sDb, $sUsername, $sPassword);
    $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $oStmt = $oConn->prepare('SELECT * FROM events');
    $oResult = $oStmt->fetchAll();

    foreach ($oResult as $aRow) {
        print_r($aRow['data']);
    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
if(!$dbc)
{
    die("We are curresntly experiencing very heavy traffic to our site, please be patient and try again shortly.");
}
$db = mssql_select_db($database_name);
$i=0;
if($_POST['remote_access']!=0)
    $i=1;
if(!$db)
{
    die("Failed to connect to database - check your database name.");
}
$sql = "insert into event(eventName, rmtAcc, smsP, avgWaitTime, closeF)
values('".$_POST['event_name']."', '".$i."', '".$_POST['SMS_parameters']."', '".$_POST['avg_wt']."', '".$_POST['closef']."');";
$res = mssql_query($sql);
$sql1 = "insert into passwords(passwordEnc) values(MD5('".($_POST['password'])."'));";
$res1 = mssql_query($sql1);
echo $res1['_msg'];
echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
?>
