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

<h1> Trainer Deletion Info</h1>

<?php
ini_set('display_errors', 'On');

//Setting variables for connecting to db
//If the connection fails, a message is printed. 
//Otherwise connect to db

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//User input is checked for bad chars and
//trimmed. If it is not bad, a query is attempted.
//A message with query status is given. If the input 
//was bad, the user is givent a error message

$ID = trim(htmlspecialchars($_POST['ID']));
if(!(empty($ID))){
   $sql = "DELETE FROM Trainer WHERE ID = '$ID'";
   $retval = mysqli_query($conn, $sql);

   if(! ($retval)) {
	  echo "Could not delete with given information", mysqli_error($conn);
   } else echo "deleted";
}
else
   echo "Please enter a trainer ID";
   mysqli_close($conn);				//Close the db connection
?>

</body>
</html>
