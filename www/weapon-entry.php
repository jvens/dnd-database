<html>
<body>

<form method='post'>

Name: <input type='text' name='name' autofocus required="true"> <br>
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
<textarea name='description' required="true"></textarea><br>


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

<div id="conStatus"></div>



</body>
</html>

<?php
ini_set('display_errors', 1);
$servername = "23.229.141.5";
//$username = "burneykb";
//$password = "007zombie";
$db = "dnddb";

// Get $username and $password
$success = include "credentials.php";
if (!$success) {
    echo "<p>Failed to get credentials.  Please create a file called `credentials.php` in the " . getcwd() . " directory.  "
    echo "In that file copy the following text filling in the sections in /</>.<br>"
    echo "<code>\n"
    echo "$username = \"<username>\"\n";
    echo "$password = \"<password>\"\n";
    echo "<\code>\n"
    exit();
}

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "<span style='background-color: #00ff00'>Connected successfully";
echo "<br>";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if ($_POST['cost'] == '')
	{
		$_POST['cost'] = '0';
	}
	// var_dump($_POST);
	$query = "INSERT INTO weapon ";
	$query.= "(name,description,proficiency,";
	if (isset($_POST['type']))
	{
		$query.= "type,";
	}
	$query.= "`range`,cost,damage,damage_type_id,weight";
	if (isset($_POST['properties']))
	{
		$query.= ",properties";
	}
	$query.= ")";
	$query.= " VALUES (";
	$query.= "'{$_POST['name']}', '{$_POST['description']}', '{$_POST['proficiency']}', ";
	if (isset($_POST['type']) && is_array($_POST['type']))
	{
		$query.= "('";
		foreach ($_POST['type'] as $type) {
			$query.= "{$type},";
		}	
		$query = rtrim($query, ",");
		$query.= "'),";
	}
	$query.= "'{$_POST['range']}', {$_POST['cost']}, '{$_POST['damage']}', {$_POST['damage_type']}, {$_POST['weight']}";
	if (isset($_POST['properties']) && is_array($_POST['properties']))
	{
		$query.= ", ('";
		foreach ($_POST['properties'] as $property) {
			$query.= "{$property},";
		}
		$query = rtrim($query, ",");
		$query.= "')";
	}
	$query.= ");";
	if ($conn->query($query) === TRUE) {
    	$alertString = 'New record created successfully';
	} else {
	    echo 'Error: "' . $query . "<br>" . $conn->error;
	}
}

if(isset($alertString))
{
	echo '<script language="javascript">';
	echo 'alert("'. $alertString .'");';
	echo '</script>';
}

$conn->close();
?>
