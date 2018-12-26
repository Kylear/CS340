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

<h1> Trainer Registration Info</h1>

<?php
ini_set('display_errors', 'On');

//Variables are being set up for a connection to the db
//If the connection fails, an error message is returned.
//Otherwise connected to db

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Checking user input and trimming it. Converting
//text based selection to integers for SQL statement

$name = trim(htmlspecialchars($_POST['name']));
$team = trim(htmlspecialchars($_POST['team']));
if($_POST['region'] == "Kanto")
   $region = "1";
else if($_POST['region'] == "Johto")
   $region = "2";
else if($_POST['region'] == "Hoenn")
   $region = "3";
else if($_POST['region'] == "Sinnoh")
   $region = "4";
else if($_POST['region'] == "Unova")
   $region = "5";
else if($_POST['region'] == "Alola")
   $region = "6";
$gender = $_POST['gender'];
$age = trim(htmlspecialchars($_POST['age']));

//Checking that there was no bad user input.
//If there was, index is set to 1 so that
//no SQL statement is prepared

$index = 0;

if(empty($name) || !(is_numeric($team)) || !(is_numeric($age))){
   $index = 1;
}

//If there were no errors, a SQL statement is prepared
//and queried. The user is given a status
//message with the results of the query

if($index == 0){
   $sql = "INSERT INTO Trainer(Name, Home, Team, Age, Gender) VALUES ('$name', '$region', '$team', '$age', '$gender')";
   $retval = mysqli_query($conn, $sql);

   if(! ($retval)) {
	  echo "Could not create with given information", mysqli_error($conn);
   } else echo "Created";
}
else
   echo "You muster enter a valid trainer name, team number, and age";
mysqli_close($conn);			//Closing the db connection
?>

</body>
</html>
