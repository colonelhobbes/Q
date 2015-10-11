<?
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if($_POST){
ReadData();



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
        $tsql = "INSERT client(clientName, clientAreaCode, eventName, clientPhone, eventID) 
        values('".$_POST['name']."', ".$_POST['area_code'].", '".$_POST['eventName'].
        	"', ".$_POST['phone_number'].", ".$_POST['eventID'].");";
    var_dump($tsql);
        $insertReview = sqlsrv_query($conn, $tsql);
        if($insertReview == FALSE)
            die(sqlsrv_errors());
        echo "Product Key inserted is :";   
        while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
        {   
            echo($row['ProductID']);
        }
        sqlsrv_free_stmt($insertReview);
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