<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

//Block 1 - Define connection variables
$user = "epiz_23637108"; //Enter the user name
$password = "Fqmx4aIZmq"; //Enter the password
$host = "sql304.epizy.com"; //Enter the host
$dbase = "epiz_23637108_playerInfo"; //Enter the database
$table = "positionInfo"; //Enter the table name

//Block 2 - Define values to pass from HTML on to SQL
$teamID= '0';
$sheetID= '0';
$recordIDfromRoster= $_POST['recordIDfromRoster'];   	//from html variables stored from selected in availblePlayers datatable
$jerseyNumber= $_POST['jerseyNumber'];		//from html variables stored from selected in availblePlayers datatable
$htmlID= $_POST['htmlID'];
$newleft= $_POST['newleft'];
$newtop= $_POST['newtop'];

/* //Test Data
$recordIDfromRoster= '1234';   	//from html variables stored from selected in availblePlayers datatable
$jerseyNumber	= '56';		//from html variables stored from selected in availblePlayers datatable
$htmlID= 'fieldPlayer10';
$newleft= '110';
$newtop= '110'; */

//Block 3 - Check connection for errors
$connection= mysqli_connect ($host, $user, $password, $dbase);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
//Block 4 - Run query and return errors
$sqlSave = "INSERT INTO $table (teamID,sheetID,recordIDfromRoster,jerseyNumber,htmlID, htmlLeft, htmlTop)
VALUES ('$teamID','$sheetID','$recordIDfromRoster','$jerseyNumber','$htmlID', '$newleft', '$newtop')";
// $sqlLoad = "SELECT teamID,sheetID,recordIDfromRoster,jerseyNumber,htmlId, htmlLeft, htmlTop FROM $table;";
$sqlLoad = "SELECT * 
FROM  positionInfo
WHERE recordID IN (SELECT MAX(recordID) 
FROM positionInfo
GROUP BY htmlID)
ORDER BY  htmlID ASC ";



$result = mysqli_query($connection, $sqlLoad);

if (!mysqli_query($connection,$sqlSave))
  {
  echo("Error description: " . mysqli_error($connection));
  } else {
  
		while($row = mysqli_fetch_array($result)) {
		echo print_r($row);       // Print the entire row data
		}
  }

// return all our data to an AJAX call
$rtnQry = "SELECT JSON_ARRAYAGG() (teamID,sheetID,recordIDfromRoster,jerseyNumber,htmlID, htmlLeft, htmlTop) 
FROM $table 
WHERE recordID IN 
	(SELECT MAX(recordID) 
	FROM positionInfo
	GROUP BY htmlID)
ORDER BY  htmlID ASC";

echo json_encode(mysqli_query($connection,$rtnQry));

?>