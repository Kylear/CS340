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

<h1> Trainer Update Info</h1>

<?php
ini_set('display_errors', 'On');

//Set variables for connecting to the db
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

//Check user input for bad chars and trim it. 
//Input is the checked for proper form. If not, 
//set $input to 1 so that SQL query may be skipped

$team = trim(htmlspecialchars($_POST['team']));
$name = trim(htmlspecialchars($_POST['name']));
$ID = trim(htmlspecialchars($_POST['ID']));
$age = trim(htmlspecialchars($_POST['age']));
if($_POST['region'] == "Kanto")
   $region = "1";
if($_POST['region'] == "Johto")
   $region = "2";
if($_POST['region'] == "Hoenn")
   $region = "3";
if($_POST['region'] == "Sinnoh")
   $region = "4";
if($_POST['region'] == "Unova")
   $region = "5";
if($_POST['region'] == "Alola")
   $region = "6";

$index = 0;

if(!(is_numeric($team)) || empty($name) || !(is_numeric($age))){
   $index = 1;
}

//If user input was in the correct format, prepare
//and execute SQL query. If it fails, an error message is printed
//Otherwise return success. If user input was bad, inform the user.

if($index == 0){
   $sql = "UPDATE Trainer SET Name = '$name', Team = '$team', Age = '$age', Home = $region WHERE ID = '$ID'";
   $retval = mysqli_query($conn, $sql);
   if(! ($retval)) {
	  echo "Could not update with given information", mysqli_error($conn);
   } 
   else 
	  echo "Updated!";
}
else{
   echo "You must enter a valid name, team number, age, and ID to change";
}
mysqli_close($conn);				//Close the connection
?>

</body>
</html>
