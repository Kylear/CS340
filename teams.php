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

<h1> Pokedex Entries</h1>

<?php

//Variables are set for connecting to the db
//A connection is attempted. Returns error if fails,
//otherwise connects

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//SQL query is prepared and executed to populate the
//page. Information is placed into a table if it exists,
//or an error is given to the user if there is no information.

$sql = "SELECT Team_ID, Mem_1, Mem_2, Mem_3, Mem_4, Mem_5, Mem_6 FROM Teams GROUP BY Team_ID";
$result = $conn->query($sql);

if($result->num_rows > 0){
   echo "<table><tr><th>Team ID</th><th>Pokemon 1</th><th>Pokemon 2</th><th>Pokemon 3</th><th>Pokemon 4</th><th>Pokemon 5</th><th>Pokemon 6</th></tr>";
   while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["Team_ID"]."</td><td>".$row["Mem_1"]."</td><td>".$row["Mem_2"]."</td><td>".$row["Mem_3"]."</td><td>".$row["Mem_4"]."</td><td>".$row["Mem_5"]."</td><td>".$row["Mem_6"]."</td></tr>";
   }
   echo "</table>";
}
else{
   echo "There are no teams :(";
}

mysqli_close($conn);			//Close db connection

?>

<!--Forms for adding information to the db.
The first form is for adding pokemon, and takes
numerical arguments(pokemon ids). The second form
is to update a team, and also takes numerical arguments
(the team to change and new pokemon ids).
Appropriate php files are then loaded upon submission
 -->

<form action="addTeam.php" method="post">
	   <legend>Register a new Pokemon team!</legend>
			Pokemon 1 ID: <input type="text" name="pname1" id = "pname1"><br>
			Pokemon 2 ID: <input type="text" name="pname2" id = "pname2"><br>
			Pokemon 3 ID: <input type="text" name="pname3" id = "pname3"><br>
			Pokemon 4 ID: <input type="text" name="pname4" id = "pname4"><br>
			Pokemon 5 ID: <input type="text" name="pname5" id = "pname5"><br>
			Pokemon 6 ID: <input type="text" name="pname6" id = "pname6"><br>
		<button type="submit">Register team</button>
	</form>

<form action="updateTeam.php" method="post">
	   <legend>Update a current team. Re-enter pokemon IDs for each member</legend>
			Team ID: <input type="text" name="team" id = "team"><br>
			Pokemon 1 ID: <input type="text" name="pname1" id = "pname1"><br>
			Pokemon 2 ID: <input type="text" name="pname2" id = "pname2"><br>
			Pokemon 3 ID: <input type="text" name="pname3" id = "pname3"><br>
			Pokemon 4 ID: <input type="text" name="pname4" id = "pname4"><br>
			Pokemon 5 ID: <input type="text" name="pname5" id = "pname5"><br>
			Pokemon 6 ID: <input type="text" name="pname6" id = "pname6"><br>
		<button type="submit">Update team</button>
	</form>

</body>
</html>
