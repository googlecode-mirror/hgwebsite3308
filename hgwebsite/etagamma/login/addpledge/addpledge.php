<?php
if(!isset($_SESSION['user'])){
	echo "You're not logged in!";
	die();
} else {
	connect();
	if(isset($_POST['sub'])){

		$firstname	 =mysql_real_escape_string($_POST['firstname']);
		$middlename	 =mysql_real_escape_string($_POST['middlename']);
		$lastname	 =mysql_real_escape_string($_POST['lastname']);
		$pledgeclass =mysql_real_escape_string($_POST['pledgeclass']);
		$alumyear	 =mysql_real_escape_string($_POST['alumyear']);
		$alumsemester=mysql_real_escape_string($_POST['alumsemester']);
		$bday		 =mysql_real_escape_string($_POST['bday']);
		$bmonth		 =mysql_real_escape_string($_POST['bmonth']);
		$byear		 =mysql_real_escape_string($_POST['byear']);
		$cell		 =mysql_real_escape_string($_POST['cell']);
		$email		 =mysql_real_escape_string($_POST['email']);
		$major		 =mysql_real_escape_string($_POST['major']);
		$minor		 =mysql_real_escape_string($_POST['minor']);
		$street		 =mysql_real_escape_string($_POST['street']);
		$city		 =mysql_real_escape_string($_POST['city']);
		$zip		 =mysql_real_escape_string($_POST['zip']);
		$state		 =mysql_real_escape_string($_POST['state']);
		$country	 =mysql_real_escape_string($_POST['country']);
		$roll		 =-10;

		$query = "INSERT INTO contacts (alumn_year, alumn_sem, b_day, b_month, b_year, cell, address,";
		$query = $query." city, state, zip, country, email, major, minor, first, middle, last, roll, status)";
		$query = $query." VALUES ($alumyear, '$alumsemester', $bday, '$bmonth', $byear, $cell,";
		$query = $query." '$street', '$city', '$state', '$zip', '$country', '$email', '$major', '$minor',";
		$query = $query." '$firstname', '$middlename', '$lastname', $roll, 'pledge')";
		echo "$query";
		
		if($_POST['pass1']!=''){
			if($_POST['pass1']!=$_POST['pass2']||strlen($_POST['pass1'])>30){
				echo "Passwords do not match!<br>";

			} else {
				$hash = hash('sha256', $_POST['pass1']);
				mysql_query("UPDATE contacts SET password='$hash' WHERE roll=$roll");
				echo "Password changed!<br>";

			}
		}

		mysql_query($query);
		echo "<br><br>";
	}
}
?>
<form method = "POST" action="">
<table border="0">
<tr><td>
<table>
<tr>
	<th>First Name</th>
	<td><input type="text" name = "firstname"  size = "30"></td>
</tr>
<tr>
	<th>Middle Name</th>
	<td><input type="text" name = "middlename" size = "30"></td>
</tr>
<tr>
	<th>Last Name</th>
	<td><input type="text" name   = "lastname"   size = "30"></td>
</tr>
<tr>
	<th>Password</th>
	<td><input type="password" name = "pass1" size = "30"></td>
</tr>
<tr>
	<th>Confirm Password</th>
	<td><input type="password" name = "pass2" size = "30"></td>
</tr>
<tr>
	<th>Pledge Class</th>
	<td><input type="text" name = "pledgeclass" size = "30"></td>
</tr>
<tr>
	<th>Alumn Year</th>
	<td><input type="text" name = "alumyear" size = "30"></td>
</tr>

<tr>
	<th>Alumn Semester</th>
	<td>
	<select name = "alumsemester">
		<option value = "Spring" selected>Spring</option>
		<option value = "Fall">Fall</option>
	</select>
	</td>
</tr>

<tr>
	<th>Birth day</th>
	<td><input type="text" name = "bday" size = "30""></td>
</tr>
<tr>
	<th>Birth month</th>
	<td><input type="text" name = "bmonth" size = "30"></td>
</tr>
<tr>
	<th>Birth year</th>
	<td><input type="text" name = "byear" size = "30"></td>
</tr>

</table></td><td><table>
<tr>
	<th>Cell Phone #</th>
	<td><input type="text" name = "cell" size = "30"></td>
</tr>
<tr>
	<th>Email</th>
	<td><input type="text" name = "email" size = "30"></td>
</tr>

<tr>
	<th>Street Address</th>
	<td><input type="text" name = "street" size = "30"></td>
</tr>

<tr>
	<th>City</th>
	<td><input type="text" name = "city" size = "30"></td>
</tr>
<tr>
	<th>State</th>
	<td><input type="text" name = "state" size = "30"></td>
</tr>
<tr>
	<th>Zip Code</th>
	<td><input type="text" name = "zip" size = "30"></td>
</tr>
<tr>
	<th>Country</th>
	<td><input type="text" name = "country" size = "30"></td>
</tr>

<tr>
	<th>Major</th>
	<td><input type="text" name = "major" size = "30"></td>
</tr>
<tr>
	<th>Minor</th>
	<td><input type="text" name = "minor" size = "30"></td>
</tr>

<tr><th>
	Image File
</th><td>
	<input type="file" name="datafile" size="18">
</td></tr>

<tr>
	<td></td>
</tr>
</table>
</td></tr>
</table>
<center><input type = "submit" value = "Submit" name = "sub"></center>
</form>
