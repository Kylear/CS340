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

<h1> Gym Update Info</h1>

<?php
ini_set('display_errors', 'On');

//Variables set to connect to the db
//A connection is attempted, and an error
//is returned if it fails. 

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//User input is checked for bad chars and trimmed. 

$team = trim(htmlspecialchars($_POST['team']));
$leader = trim(htmlspecialchars($_POST['leader']));
$ID = trim(htmlspecialchars($_POST['ID']));

//Checking if there was bad input.
//If there was, set $index to 1 to skip
//SQL query

$index = 0;

if(!(is_numeric($team)) || empty($leader)){
   $index = 1;
}

//If there was no bad input, set up UPDATE SQL query
//and attempt it. If it fails an error is returned 
//and printed to the screen. If input was bad, 
//inform the user

if($index == 0){
   $sql = "UPDATE Gym SET Leader_name = '$leader', Gym_team = '$team' WHERE Gym_id = '$ID'";
   $retval = mysqli_query($conn, $sql);
   if(! ($retval)) {
	  echo "Could not update with given information", mysqli_error($conn);
   } 
   else 
	  echo "Updated!";
}
else{
   echo "You must enter a leader name and team number";
}
mysqli_close($conn);		//Close the db connection
?>

</body>
</html>
