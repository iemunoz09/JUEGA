<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

//Block 1 - Define connection variables
$user = "epiz_23637108"; //Enter the user name
$password = "Fqmx4aIZmq"; //Enter the password
$host = "sql304.freecluster.eu"; //Enter the host
$dbase = "epiz_23637108_playerInfo"; //Enter the database
$table = "positionInfo"; //Enter the table name

//Block 2 - Define values to pass from HTML on to SQL

//Block 3 - Check connection for errors
$connection= mysqli_connect ($host, $user, $password, $dbase);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
//Block 4 - Run query and return errors
$sqlLoad = "SELECT * 
FROM  positionInfo
WHERE recordID IN (SELECT MAX(recordID) 
FROM positionInfo
GROUP BY htmlID)
ORDER BY  htmlID ASC ";
			
			
$result = mysqli_query($connection, $sqlLoad);

if (!mysqli_query($connection,$sqlLoad))
  {
  echo("Error description: " . mysqli_error($connection));
  } else {
  
	for ($array=array(); $row = mysqli_fetch_assoc($result); $array[] = $row);
	
	echo json_encode($array);
			
	}
?>