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

$sql = "SELECT * FROM event";
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)) {
    // code here
    // access variables like the following:
    echo $row['id'].'<br />';
}
?>