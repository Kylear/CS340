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

<h1> Pokedex Registration Info</h1>

<?php
ini_set('display_errors', 'On');		//Turn error display on

//This is setting up variables to connect to the database
//The connection is attempted, and an error is given 
//if the connection fails. 

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//This section is checking user input. Manual input is 
//checked for bad characters and trimmed, while options
//that are chosen from a list are converted into appropriate 
//form if needed. 

$pname = trim(htmlspecialchars($_POST['pname']));
$type = $_POST['type'];
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

//Checking if any user input was bad
//If it was, set $index to 1 to skip sql query and
//print an error message

$index = 0;

if(empty($pname)){
	$index = 1;
}

//This block prepares the SQL statement before submitting the query
//If the query fails, an error is given. Otherwise a success message is given
if($index == 0){
   $sql = "INSERT INTO Pokemon(Pok_name, Pok_type, Pok_reg) VALUES ('$pname', '$type', '$region')";
   $retval = mysqli_query($conn, $sql);

   if(! ($retval)) {
	  echo "Could not update with given information", mysqli_error($conn);
   } else echo "updated";
} else echo "Please enter a pokemon name";
mysqli_close($conn);			//Close db connection
?>

</body>
</html>
