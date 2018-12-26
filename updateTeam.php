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

<h1> Team Update Info</h1>

<?php
ini_set('display_errors', 'On');

//Set variables for connecting to the db. 
//Attempt to connect. If it fails return error. 
//Otherwise connected

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//User input is checked for bad input, trimmed
//and put in an array to check if numeric. 
//If not, $index is set to not 0 so that 
//the SQL query may be skipped

$team = trim(htmlspecialchars($_POST['team']));
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

//If user input was good, prepare
//SQL query and execute it. Error is printed
//if fails, otherwise success is printed. If input
//was bad, inform the user

if($index == 0){
   $sql = "UPDATE Teams SET Mem_1 = '$pname1', Mem_2 = '$pname2', Mem_3 = '$pname3', Mem_4 = '$pname4', Mem_5 = '$pname5', Mem_6 = '$pname6' WHERE Team_ID = '$team'";
   $retval = mysqli_query($conn, $sql);
   if(! ($retval)) {
	  echo "Could not update with given information", mysqli_error($conn);
   } 
   else 
	  echo "Updated!";
}
else{
   echo "You must enter 6 pokemon!";
}
mysqli_close($conn);			//Close the db connection
?>

</body>
</html>
