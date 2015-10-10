<?
if (isset($_POST['submit']))
{
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

$sql = "SELECT id, passwordEnc FROM password, event WHERE id.id=passwordEnc.id AND passwords.passwordEnc=MD5(".$_POST['password']");";
$res = mysql_query($sql);
if(!$row){
while($row = mysql_fetch_assoc($res)) {
    // code here
    // access variables like the following:
    echo $row['id'].'<br />';
    
}
    else{
        echo "Invalid creds";
}
}
}
?>
<form action="" method="post">
                password : <input type="text" name="password" />
                 <input type="submit" name="submit" value="submit" />
        </form>