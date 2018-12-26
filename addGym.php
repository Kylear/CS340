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

<h1> Gym Registration Info</h1>

<?php
ini_set('display_errors', 'On');

//Setting variables for database connection
//A connection is attempted, and an error
//message is returned if the connection fails

$hostdb = "classmysql";				
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);		
if($conn->connect_errno){									
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Checking user input and changing into appropriate
//form if needed. Text input is checked for bad chars
//and trimmed, while selections from a list are converted
//into integers as needed. 

$leader = trim(htmlspecialchars($_POST['leader']));			
$team = trim(htmlspecialchars($_POST['team']));		
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

//This section checks if there was any bad input, and skips the sql query if so

$index = 0;

if(empty($leader) || !(is_numeric($team))){				
   $index = 1;
}

//If there was no bad input, prepare a SQL statement
//And attempt to query with it. If the query fails, return
//the error message

if($index == 0){									
   $sql = "INSERT INTO Gym(Leader_name, Gym_team, Gym_reg, Gym_type) VALUES ('$leader', '$team', '$region', '$type')";
   $retval = mysqli_query($conn, $sql);					

   if(! ($retval)) {								
	  echo "Could not create with given information", mysqli_error($conn);
   } else echo "Created";
}
else												
   echo "You muster enter a valid leader name and team number";
mysqli_close($conn);									//Close db connection
?>

</body>
</html>
