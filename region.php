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

<h1> Region Info</h1>

<?php

//Variables are set for a db connection
//Connection is attempted. If it fails, returns
//an error. Otherwise connected

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//SQL query to db for relevant information. 
//This information populates a table. If there
//is no information, a message with that status
//is printed for the user

$sql = "SELECT Reg_id, Reg_name FROM Region GROUP BY Reg_id";
$result = $conn->query($sql);

if($result->num_rows > 0){
   echo "<table><tr><th>Region ID</th><th>Region Name</th></tr>";
   while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["Reg_id"]."</td><td>".$row["Reg_name"]."</td></tr>";
   }
   echo "</table>";
}
else{
   echo "The earth is dead :[";
}

mysqli_close($conn);		//close db connection

?>

</body>
</html>
