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

<h1> Gym Leaders</h1>

<?php

//Setting vars for connecting to the db
//A connection is attempted. If it fails
//the user is given an error. Otherwise
//connected to db

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Prepare a SQL query and execute it
//to get relevant information for this page
//If there are no rows, print that there are
//no gyms. 

$sql = "SELECT Gym_id, Leader_name, Gym_team, Reg_name, Gym_type FROM Gym, Region WHERE Gym_reg = Reg_id GROUP BY Gym_id";
$result = $conn->query($sql);

//For each row in the query,
//print the information in a table.

if($result->num_rows > 0){
   echo "<table><tr><th>Gym ID</th><th>Leader</th><th>Team</th><th>Region</th><th>Type</th></tr>";
   while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["Gym_id"]."</td><td>".$row["Leader_name"]."</td><td>".$row["Gym_team"]."</td><td>".$row["Reg_name"]."</td><td>".$row["Gym_type"]."</td></tr>";
   }
   echo "</table>";
}
else{
   echo "There are no gyms :(";
}

mysqli_close($conn);			//close db connection

?>
<!--These are the forms for user input
The first form is for adding a gym to the db
with text inputs and selections. The second form
is for updating a gym in the db. Once submitted with
information, the listed php file is executed and return 
either an error or a success
 -->
<form action="addGym.php" method="post">
	   <legend>Register a new Pokemon gym!</legend>
			Leader Name: <input type="text" name="leader" id = "leader"><br>
			Team: <input type="text" name="team" id = "team"><br>
			Region: <select name="region" id = "region">
				<option>Kanto</option>
				<option>Johto</option>
				<option>Hoenn</option>
				<option>Sinnoh</option>
				<option>Unova</option>
				<option>Alola</option> 
			</select><br>
			Type: <select name="type" id = "type">
				<option>Fire</option>
				<option>Water</option>
				<option>Grass</option>
				<option>Electric</option>
				<option>Rock</option>
				<option>Steel</option> 
				<option>Dark</option>
				<option>Flying</option>
				<option>Fighting</option>
				<option>Psychic</option>
				<option>Fairy</option>
				<option>Bug</option> 
				<option>Poison</option>
				<option>Ground</option>
				<option>Dragon</option>
				<option>Ice</option>
			</select><br>
		<button type="submit">Register team</button>
	</form>

<form action="updateGym.php" method="post">
	   <legend>Update a current gym</legend>
			Gym ID: <input type="text" name="ID" id = "ID"><br>
			Leader Name: <input type="text" name="leader" id = "leader"><br>
			Team: <input type="text" name="team" id = "team"><br>
		<button type="submit">Update gym</button>
	</form>

</body>
</html>
