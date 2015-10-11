<?

if($_POST){
SendData();

echo 'Thank you for your entry!';
}
else
{
	echo 'Not POST';
}
function SendData()
{
    try
    {
        $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
        $connectionOptions = array("Database"=>"eventDB",
            "Uid"=>"eecs", "PWD"=>"IntelNUC777");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
        $tsql = "INSERT into client(clientName, clientAreaCode, eventName, clientPhone, eventID) 
        values('".$_POST['name']."', ".$_POST['area_code'].", '".$_POST['eventName'].
        	"', ".$_POST['phone_number'].", ".$_POST['eventID'].");";
        $insertReview = sqlsrv_query($conn, $tsql);
        if($insertReview == FALSE)
            die(sqlsrv_errors());
        sqlsrv_free_stmt($insertReview);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}