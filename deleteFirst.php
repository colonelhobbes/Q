<?
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
function Delete()
{
    try
    {
        $serverName = "tcp:nmbzrmx555.database.windows.net,1433";
        $connectionOptions = array("Database"=>"eventDB",
            "Uid"=>"eecs", "PWD"=>"IntelNUC777");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die((sqlsrv_errors()));
        $tsql = "delete from client order by position LIMIT 1;";
        var_dump($tsql);
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
if($_POST){
    
}
else
{
   // echo 'Not POST';
}
Delete();
?>