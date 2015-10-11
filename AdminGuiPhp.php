<? 
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
        $tsql = "select clientName, clientAreaCode, clientPhone, position, passwords.id, passwordEnc from passwords inner join client on client.eventID = passwords.id and passwords.passwordEnc='" . $_POST['password'] . "';";
        $insertReview = sqlsrv_query($conn, $tsql);
        if($insertReview == FALSE)
            die(sqlsrv_errors());
        PrintHTML($row);
        sqlsrv_free_stmt($insertReview);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}
function PrintHTML($row)
{
echo ('<!DOCTYPE html>
<html>
  <head>
    <title> Admin GUI </title>
    <link rel = "stylesheet" type = "text/css" href = "AdminGuiStyle.css" >
  </head>
');
    if (sqlsrv_num_rows($res) != 0)
		{
		echo ('''<body style = "font-family: Verdana">
  <h1 style = "text.align: center"> ' . $row['eventName'] . ' </h1>
  <table style="width:95%; border-spacing: 0px;">
    <thead style = "background-color: #E3A20B; height = 35px">
      <th>Queue #</th>
      <th>Name</th>
      <th>Area Code </th>
      <th>Phone # </th>
    </thead>
    <tbody>''');
		while ($row = sqlsrv_fetch_assoc($res))
			{
			if ($row['position'] % 2 == 0)
				{
				echo ('''<tr style = "/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+0,207cca+11,207cca+11,2989d8+50,7db9e8+100 */
background: #1e5799; /* Old browsers */
background: -moz-linear-gradient(left,  #1e5799 0%, #207cca 11%, #207cca 11%, #2989d8 50%, #7db9e8 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,#1e5799), color-stop(11%,#207cca), color-stop(11%,#207cca), color-stop(50%,#2989d8), color-stop(100%,#7db9e8)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  #1e5799 0%,#207cca 11%,#207cca 11%,#2989d8 50%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  #1e5799 0%,#207cca 11%,#207cca 11%,#2989d8 50%,#7db9e8 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  #1e5799 0%,#207cca 11%,#207cca 11%,#2989d8 50%,#7db9e8 100%); /* IE10+ */
background: linear-gradient(to right,  #1e5799 0%,#207cca 11%,#207cca 11%,#2989d8 50%,#7db9e8 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#1e5799", endColorstr="#7db9e8",GradientType=1 ); /* IE6-9 ">''');
				}
			  else
				{
				echo ('<tr style = "/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#398235+0,398235+0,8ab66b+44,c9de96+100 */
background: #398235; /* Old browsers */
background: -moz-linear-gradient(left,  #398235 0%, #398235 0%, #8ab66b 44%, #c9de96 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,#398235), color-stop(0%,#398235), color-stop(44%,#8ab66b), color-stop(100%,#c9de96)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  #398235 0%,#398235 0%,#8ab66b 44%,#c9de96 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  #398235 0%,#398235 0%,#8ab66b 44%,#c9de96 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  #398235 0%,#398235 0%,#8ab66b 44%,#c9de96 100%); /* IE10+ */
background: linear-gradient(to right,  #398235 0%,#398235 0%,#8ab66b 44%,#c9de96 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#398235", endColorstr="#c9de96",GradientType=1 ); /* IE6-9 */
">');
				}

			echo ('<td>' . $row['position'] . '</td>');
			echo ('<td>' . $row['clientName'] . '</td>');
			echo ('<td>' . $row['clientAreaCode'] . '</td>');
			echo ('<td>' . $row['clientPhone'] . '</td>');
			echo ('</tr>');
			}
		}
	  else
		{
		echo ("Invalid creds");
		}
	

echo ('
  </tbody>
</table>
</body>
</html>
');
}


if (isset($_POST['submit']))
	{ //check if form was submitted
	ReadData();
}
?>

<html>
<body>
<form action="" method="post">
  <input type="text" name="password"/>
  <input type="submit" name="submit"/>
</form>
</body>
</html>
