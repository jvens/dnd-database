<html>
<body>

<form method='post'>

Name: <input type='text' name='name' autofocus> <br>
Proficiency: <input list='proficiency' name='proficiency' multiple><br>
Type: <br>
<ul>
	<li><input type='checkbox' name='type[]' value='Melee'> Melee
	<li><input type='checkbox' name='type[]' value='Ranged'> Ranged
	<li><input type='checkbox' name='type[]' value='Thrown'> Thrown
</ul>

Cost: <input type='number'  step='0.01' name='cost'> gp<br>
Damage: <input type='text' name='damage'><br>
Damage Type: <input list='damage_type' name='damage_type'><br>
Range: <input type='text' name='range'><br>

Weight: <input type='number' step='0.01' name='weight'> lb<br>
Properties:<br>
<ul>
	<li><input type='checkbox' name='properties[]' value='Finesse'> Finesse
	<li><input type='checkbox' name='properties[]' value='Heavy'> Heavy
	<li><input type='checkbox' name='properties[]' value='Light'> Light
	<li><input type='checkbox' name='properties[]' value='Loading'> Loading
	<li><input type='checkbox' name='properties[]' value='Reach'> Reach
	<li><input type='checkbox' name='properties[]' value='Special'> Special
	<li><input type='checkbox' name='properties[]' value='Two-Handed'> Two-Handed
	<li><input type='checkbox' name='properties[]' value='Versatile'> Versatile
</ul>

Discription (Markdown):<br>
<textarea name='description'></textarea><br>


<input type='submit'>


<datalist id="proficiency">
	<option value="Simple">
	<option value="Martial">
</datalist>

<datalist id="damage_type">
	<option value="1">Acid
	<option value="2">Bludgeoning
	<option value="3">Cold
	<option value="4">Fire
	<option value="5">Force
	<option value="6">Lightning
	<option value="7">Necrotic
	<option value="8">Piercing
	<option value="9">Poison
	<option value="10">Psychic
	<option value="11">Radiant
	<option value="12">Slashing
	<option value="13">Thunder
</datalist>

</form>


</body>
</html>

<?php
ini_set('display_errors', 1);
$servername = "23.229.141.5";
$username = "";
$password = "";
$db = "dnddb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";
echo "<br>";



if(isset($_POST['name']))
{


	$query = "INSERT INTO weapon ";
	$query.= "(name,description,proficiency,type,`range`,cost,damage,damage_type_id,weight,properties)";
	$query.= " VALUES (";
	$query.= "'{$_POST['name']}', '{$_POST['description']}', '{$_POST['proficiency']}', ('";
	foreach ($_POST['type'] as $type) {
		$query.= "{$type},";
	}
	$query = rtrim($query, ",");
	$query.= "'),";
	$query.= "{$_POST['range']}, {$_POST['cost']}, '{$_POST['damage']}', {$_POST['damage_type']}, {$_POST['weight']}, ('";
	foreach ($_POST['properties'] as $property) {
		$query.= "{$property},";
	}
	$query = rtrim($query, ",");
	$query.= "'));";


	if ($conn->query($query) === TRUE) {
    	$alertString = '<script language="javascript">';
		$alertString .= 'alert("New record created successfully")';
		$alertString .= '</script>';
	} else {
	    $alertString .= '<script language="javascript">';
		$alertString .= 'alert("Error: " . $sql . "<br>" . $conn->error)';
		$alertString .= '</script>';
	}
}

if(isset($alertString))
{
	echo $alertString;
}

$conn->close();
?>