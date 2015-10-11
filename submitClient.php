<?
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if($_POST){
ReadData();
$sql = ""
$res = mssql_query($sql);

echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
function ReadData()
{
    try
    {
        $conn = OpenConnection();
        $tsql = "insert into client(clientName, clientAreaCode, eventName, clientPhone, eventID)
values('".$_POST['name']."', '".$_POST['area_code']."', '".$_POST['eventName']."', '".$_POST['phone_number']."', '".$_POST['eventID']."');";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            echo($row['CompanyName']);
            echo("<br/>");
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}
function OpenConnection()
{
    try
    {
        $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
        $connectionOptions = array("Database"=>"eventDB",
            "Uid"=>"eecs", "PWD"=>"IntelNUC777");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}