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

//Setting variables for connecting to db
//A connection is attempted. If it fails an
//error is printed. Otherwise, db is connected to

$hostdb = "classmysql";
$userdb = "cs340_kylear";
$passdb = "Coltm1911!";
$namedb = "cs340_kylear";

$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
if($conn->connect_errno){
   echo"Connection error " . $conn->connect_errno . " " . $conn->connect_error;
}

//Prep and execution of a SQL query
//to populate the page with information.
//Information is printed in a table
//If there is no info, that info is printed. 

$sql = "SELECT Pok_id, Pok_name, Pok_type, Reg_name FROM Pokemon, Region WHERE Pok_reg = Reg_id GROUP BY Pok_id";
$result = $conn->query($sql);

if($result->num_rows > 0){
   echo "<table><tr><th>Pokedex #</th><th>Pokemon Name</th><th>Type</th><th>Home Region</th></tr>";
   while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["Pok_id"]."</td><td>".$row["Pok_name"]."</td><td>".$row["Pok_type"]."</td><td>".$row["Reg_name"]."</td></tr>";
   }
   echo "</table>";
}
else{
   echo "There are no pokemon :(";
}

mysqli_close($conn);			//Close db connection

?>
<!--Form for adding pokemon
to the db. The user is given text prompts
for the name, and a list of selections for 
other information. addPok.php is then loaded
and returns either an error or succesful query-->
<form action="addPok.php" method="post">
	   <legend>Register a Pokemon in the Pokedex</legend>
			Pokemon Name: <input type="text" name="pname" id = "pname"><br>
			Pokemon Type: <select name="type" id = "type">
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
			Home Region: <select name="region" id = "region">
				<option>Kanto</option>
				<option>Johto</option>
				<option>Hoenn</option>
				<option>Sinnoh</option>
				<option>Unova</option>
				<option>Alola</option>
			</select><br>
		<button type="submit">Register pokemon</button>
	</form>

</body>
</html>
