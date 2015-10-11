<?
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
function SendData()
{
    try
    {
        $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
        $connectionOptions = array("Database"=>"eventDB",
            "Uid"=>"eecs", "PWD"=>"IntelNUC777");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die((sqlsrv_errors()));
        $tsql = "insert into event(eventName, rmtAcc, smsP, avgWaitTime, closeF) values('".$_POST['event_name']."', '".$_POST['remote_access']."', '".$_POST['SMS_parameters']."', '".$_POST['avg_wt']."', '".$_POST['closef']."');";
        $insertReview = sqlsrv_query($conn, $tsql);
        
        if($insertReview == FALSE)
            die(sqlsrv_errors());
        $sql1 = "insert into passwords(passwordEnc) values(('". ($_POST['password'])."'));";
         
        $insertReview = sqlsrv_query($conn, $sql1);
        if($insertReview == FALSE)
            die(sqlsrv_errors());
        $sql1 = "select id from event where eventName=".$_POST['event_name'].";";
        
        $insertReview = sqlsrv_query($conn, $sql1);
        $row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC);
        echo $row;
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
if($_POST){
    SendData();
    
       echo 'Thank you for your entry! ';
        
}
else
{
    echo 'Not POST';
}
?>