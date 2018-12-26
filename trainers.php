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

<h1> All Trainers</h1>

<?php

//Set variables for connecting to db
//Attempt to connect. Return error if fail
//Otherwise, connected

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Execute SQL query to populate page
//with info from db. Populate a table with the 
//information if it exists. If not, inform the user

$sql = "SELECT ID, Name, Reg_name, Team, Age, Gender FROM Trainer, Region WHERE Home = Reg_id GROUP BY ID";
$result = $conn->query($sql);

if($result->num_rows > 0){
   echo "<table><tr><th>ID</th><th>Name</th><th>Region</th><th>Team</th><th>Age</th><th>Gender</th></tr>";
   while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Reg_name"]."</td><td>".$row["Team"]."</td><td>".$row["Age"]."</td><td>".$row["Gender"]."</td></tr>";
   }
   echo "</table>";
}
else{
   echo "There are no trainers :(";
}

mysqli_close($conn);			//Close db connection

?>

<!--Forms for changing the trainer db. 
The first form is for adding a trainer, with
sections for the trainer name, region, etc. 
The second form is for updating a trainer, with 
a section to identify the trainer and what the 
new info should be
Finally, the third form is for deleting a trainer
from the db. The trainer ID is received.
All forms call the appropriate php file 
and return either success or an error message 
 -->

<form action="addTrainer.php" method="post">
   <legend>Register a new Trainer!</legend>
		Name: <input type="text" name="name" id = "name"><br>
		Home Region: <select name="region" id = "region">
			<option>Kanto</option>
			<option>Johto</option>
			<option>Hoenn</option>
			<option>Sinnoh</option>
			<option>Unova</option>
			<option>Alola</option>
		</select><br>
		Team ID: <input type="text" name="team" id = "team"><br>
		Age: <input type="text" name="age" id = "age"><br>
		Gender: <select name="gender" id = "gender">
			<option>Male</option>
			<option>Female</option>
		</select><br>
	<button type="submit">Register trainer</button>
</form>

<form action="updateTrainer.php" method="post">
   <legend>Update a current trainer</legend>
		Trainer ID: <input type="text" name="ID" id = "ID"><br>
		New name: <input type="text" name="name" id="name"><br>
		New Home Region: <select name="region" id = "region">
			<option>Kanto</option>
			<option>Johto</option>
			<option>Hoenn</option>
			<option>Sinnoh</option>
			<option>Unova</option>
			<option>Alola</option>
		</select><br>
		New Team ID: <input type="text" name="team" id = "team"><br>
		New Age: <input type="text" name="age" id = "age"><br>
	<button type="submit">Update trainer</button>
</form>

<form action="deleteTrainer.php" method="post">
	<legend>Delete a current trainer</legend>
		Trainer ID: <input type="text" name="ID" id = "ID"><br>
	<button type="submit">Delete trainer</button
</form>

</body>
</html>
