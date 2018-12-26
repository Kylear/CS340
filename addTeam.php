<!DOCTYPE html>
<html>
<head>

<h1> Nav Bar</h1>

<p><a href="index.html">Home</a>
   <a href="region.php">Region</a>
   <a href="pokemon.php">Pokedex</a>
   <a href="teams.php">Teams</a>
   <a href="trainers.php">Trainers</a>
   <a href="gyms.php">Gyms</a>

</head>
<body>

<h1> Team Registration Info</h1>

<?php
ini_set('display_errors', 'On');

//Setting variables for connecting to the db
//A connection is attempted. If it fails, an
//error message is returned. 

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Here user input is being checked for bad chars
//and trimmed. It is then entered in an array for check for 
//bad input. If input is bad, that index is saved so
//the appropriate query is made

$pname1 = trim(htmlspecialchars($_POST['pname1']));
$pname2 = trim(htmlspecialchars($_POST['pname2']));
$pname3 = trim(htmlspecialchars($_POST['pname3']));
$pname4 = trim(htmlspecialchars($_POST['pname4']));
$pname5 = trim(htmlspecialchars($_POST['pname5']));
$pname6 = trim(htmlspecialchars($_POST['pname6']));
$tests = array(
	$pname1,
	$pname2,
	$pname3,
	$pname4,
	$pname5,
	$pname6
);

$index = 0;

foreach($tests as $element){
	if(!(is_numeric($element))){
	   $index = key($tests);
	   break;
	}
}

//If there was no issue with the user input, a SQL 
//statement is prepared. The query is attempted, and 
//a status message is returned.
//If input was bad, a user is given an error message

if($index == 0){
   $sql = "INSERT INTO Teams(Mem_1, Mem_2, Mem_3, Mem_4, Mem_5, Mem_6) VALUES ('$pname1', '$pname2', '$pname3', '$pname4', '$pname5', '$pname6')";
   $retval = mysqli_query($conn, $sql);
   if(! ($retval)) {
	  echo "Could not register with given information ", mysqli_error($conn);
   } else 
	  echo "Registered!";
}
else{
   echo "You must enter 6 pokemon!";
}
mysqli_close($conn);			//Closing the db connection
?>

</body>
</html>
