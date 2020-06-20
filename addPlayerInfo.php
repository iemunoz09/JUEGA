<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$queryString = $_SERVER["QUERY_STRING"];

//Block 1 - Define connection variables
$user = "epiz_23637108"; //Enter the user name
$password = "Fqmx4aIZmq"; //Enter the password
$host = "sql304.epizy.com"; //Enter the host
$dbase = "epiz_23637108_playerInfo"; //Enter the database
$table = "playerInfo"; //Enter the table name

//Block 2 - Define values to pass from HTML on to SQL
$firstName= $_POST['firstName'];
$lastName= $_POST['lastName'];
$dob= $_POST['dob'];
$phoneNumber= $_POST['phoneNumber'];
$playerID= $_POST['playerID'];
$prefComm = $_POST['prefComm']?? '';
$email= $_POST['inputEmail'];
$prefLang = $_POST['prefLang'] ?? '';
$nickName= $_POST['nickName'];
$altPhNum= $_POST['altPhNum'];
$jerseyNum= $_POST['jerseyNumber'];
$uniformSize= $_POST['uniformSize'];
$position1= $_POST['position1'];
$position2= $_POST['position2'] ?? '';
$commentsBox= $_POST['commentsBox'];

//Test Data
/* $firstName= 'firstName';
$lastName= 'lastName';
$dob= '11/26/1986';
$phoneNumber= '(562)415-4008';
$playerID= '1010100';
$prefComm = 'sms';
$email= 'iemunoz09@gmail.com';
$prefLang = 'English';
$nickName= 'Ernie';
$altPhNum= '(323)569-6397';
$jerseyNum= '12';
$uniformSize= 'XL';
$position1= 'LF';
$position2= 'RM';
$commentsBox= 'text'; */


//Reformat for SQL entry
$phoneNumber = (int)preg_replace('/\D+/','',$phoneNumber);
$altPhNum = (int)preg_replace('/\D+/','',$altPhNum);

 
$date = str_replace('/', '-', $dob );
$dobSQL = date("Y-m-d", strtotime($date));


//Block 3 - Check connection for errors
$connection= mysqli_connect ($host, $user, $password, $dbase);
if (mysqli_connect_errno())
  {
  echo "<script>console.log(".mysqli_connect_error().")</script>";
  }

  
//Block 4 - Check for queryString to determine update or addition of new player.  Run query and return errors
if (!is_null($queryString)){
		$sql = 	"UPDATE $table 
				   SET firstName='$firstName', 
						lastName='$lastName', 
						dOB='$dobSQL', 
						phoneNumber='$phoneNumber', 
						playerID='$playerID', 
						prefComm='$prefComm', 
						emailAddress='$email', 
						prefLang='$prefLang', 
						nickName='$nickName', 
						altPhone='$altPhNum', 
						jerseyNumber='$jerseyNum', 
						uniformSize='$uniformSize', 
						primaryPosition='$position1', 
						secondaryPosition='$position2', 
						playerComments='$commentsBox'
					WHERE recordId='$queryString'";
} else {
	$sql = "INSERT INTO $table (firstName, lastName, dOB, phoneNumber, playerID, prefComm, emailAddress, prefLang, nickName, altPhone, jerseyNumber, uniformSize, primaryPosition, secondaryPosition, playerComments)
	VALUES ('$firstName','$lastName','$dobSQL','$phoneNumber','$playerID','$prefComm','$email','$prefLang','$nickName','$altPhNum','$jerseyNum','$uniformSize','$position1','$position2','$commentsBox')";
}



$queryError = mysqli_error($connection);


if (!mysqli_query($connection,$sql))
  {
  echo "<script>console.log({$queryError})</script>";
  }


// return all our data to an AJAX call
$rtnSQL = "SELECT firstName, lastName, dOB, phoneNumber, playerID, prefComm, emailAddress, prefLang, nickName, altPhone, jerseyNumber, uniformSize, primaryPosition, secondaryPosition, playerComments
			FROM $table;";
$rtnQry = mysqli_query($connection,$rtnSQL);


//Check query for Errors

if (!mysqli_query($connection,$rtnSQL))
  {
  echo("Error description: " . mysqli_error($connection));
  } /* else {
  
		while($row = mysqli_fetch_array($rtnQry)) {
		echo print_r($row);       // Print the entire row data
		}
  } */


  
//Test JSON Encoding with while loop
  
/* while($row = mysqli_fetch_assoc($rtnQry))
    $test[] = $row; 
return json_encode($test, JSON_THROW_ON_ERROR); */

echo json_encode($rtnQry);


?>
