<html>
<body>

<form>

Name: <input type=text name=name> <br>
Proficiency: <input list=proficiency name=proficiency multiple><br>
Type: <br>
<ul>
	<li><input type=checkbox name=melee> Melee
	<li><input type=checkbox name=ranged> Ranged
	<li><input type=checkbox name=thrown> Thrown
</ul>

Cost: <input type=number  step='0.01' name=cost> gp<br>
Damage: <input type=text name=damage><br>
Damage Type: <input list=damage_type name=damage_type><br>
Range: <input type=text name=range><br>

Weight: <input type=number step='0.01' name=weight> lb<br>
Properties:<br>
<ul>
	<li><input type=checkbox name=finess> Finesse
	<li><input type=checkbox name=heavy> Heavy
	<li><input type=checkbox name=light> Light
	<li><input type=checkbox name=loading> Loading
	<li><input type=checkbox name=reach> Reach
	<li><input type=checkbox name=special> Special
	<li><input type=checkbox name=two_handed> Two-Handed
	<li><input type=checkbox name=versatile> Versatile
</ul>

Discription (Markdown):<br>
<textarea name=discription></textarea><br>


<input type=submit>


<datalist id="proficiency">
	<option value="Simple">
	<option value="Martial">
</datalist>

<datalist id="damage_type">
	<option value="Acid">
	<option value="Bludgeoning">
	<option value="Cold">
	<option value="Fire">
	<option value="Force">
	<option value="Lightning">
	<option value="Necrotic">
	<option value="Piercing">
	<option value="Poison">
	<option value="Psychic">
	<option value="Radiant">
	<option value="Slashing">
	<option value="Thunder">
</datalist>

</form>


</body>
</html>
