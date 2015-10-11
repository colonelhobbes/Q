

<?

echo ('<!DOCTYPE html>
<html>

  <head>
    <title> Admin GUI </title>
    <link rel = "stylesheet" type = "text/css" href = "AdminGuiStyle.css" >
  </head>
');
if(isset($_POST['submit'])){ //check if form was submitted
$input = $_POST['password']; //get input text
echo "Success! You enstered: ".$input;
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
if(!$db){
	echo ('not valid db');
}
$md5 = md5($_POST['password']);
$sql = "select clientName, clientAreaCode, clientPhone, position, passwords.id, passwordEnc from passwords inner join client on client.eventID = passwords.id and passwords.passwordEnc='".$md5."';";
$res = mysql_query($sql);
echo(mysql_error());
if(mysql_num_rows($res) != 0){
	echo('valid');

echo('<body>
  <h1> '. $row['eventName'].' </h1>
  <table style="width:100%">
    <thead>
      <th>Queue #</th>
      <th>Name</th>
      <th>Area Code </th>
      <th>Phone # </th>
    </thead>
    <tbody>');
while($row = mysql_fetch_assoc($res)) {

    echo ('<tr style = "background-color: DarkSeaGreen">');
    echo ('<td>'.$row['position'].'</td>');
    echo ('<td>'.$row['clientName'].'</td>');
    echo ('<td>'.$row['clientAreaCode'].'</td>');
    echo ('<td>'.$row['clientPhone'].'</td>');
    echo('</tr>');
}
}
else{
        echo("Invalid creds");
}
}
echo('
  </tbody>
</table>

</body>
</html>
');
?>

<html>
<body>
<form action="" method="post">
  <input type="text" name="password"/>
  <input type="submit" name="submit"/>
</form>
</body>
</html>
