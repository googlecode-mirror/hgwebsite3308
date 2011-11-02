<?php
if(!isset($_SESSION['user'])){
	echo "You're not logged in!";
	die();
} else {
	connect();
	if(isset($_POST['sub'])){
		
		
		$doc=$_FILES['datafile']['tmp_name'];
		if(move_uploaded_file($doc,'/heyo.txt')){
			echo "file uploaded";
		} else {
			echo "file failed";
		}
		$alumyear=mysql_real_escape_string($_POST['alumyear']);
		$alumsemester=mysql_real_escape_string($_POST['alumsemester']);
		$bday=mysql_real_escape_string($_POST['bday']);
		$bmonth=mysql_real_escape_string($_POST['bmonth']);
		$byear=mysql_real_escape_string($_POST['byear']);
		$cell=mysql_real_escape_string($_POST['cell']);
		$home=mysql_real_escape_string($_POST['home']);
		$work=mysql_real_escape_string($_POST['work']);
		$job=mysql_real_escape_string($_POST['job']);
		$employer=mysql_real_escape_string($_POST['employer']);
		$email=mysql_real_escape_string($_POST['email']);
		$major=mysql_real_escape_string($_POST['major']);
		$minor=mysql_real_escape_string($_POST['minor']);
		$street=mysql_real_escape_string($_POST['street']);
		$city=mysql_real_escape_string($_POST['city']);
		$zip=mysql_real_escape_string($_POST['zip']);
		$state=mysql_real_escape_string($_POST['state']);
		$country=mysql_real_escape_string($_POST['country']);
		$roll=$_SESSION['user'];
		$query = "UPDATE contacts SET alumn_year=$alumyear,b_day=$bday,b_month='$bmonth',b_year=$byear,cell=$cell,home=$home,work='$work',job='$job'";
		$query = $query.",employer='$employer',email='$email',major='$major',minor='$minor',address='$street',city='$city'";
		$query = $query.",zip='$zip',state='$state',country='$country',alumn_sem='$alumsemester' WHERE roll=$roll";
		
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
	
	$roll = $_SESSION['user'];
	$query = mysql_query("SELECT * FROM contacts WHERE roll=".$roll);
	$row=mysql_fetch_array($query);
	$first=$row['first'];
	$middle=$row['middle'];
	$last=$row['last'];
	$alumyear=$row['alumn_year'];
	$bday=$row['b_day'];
	$bmonth=$row['b_month'];
	$byear=$row['b_year'];
	$cell=$row['cell'];
	$home=$row['home'];
	$work=$row['work'];
	$job=$row['job'];
	$employer=$row['employer'];
	$email=$row['email'];
	$major=$row['major'];
	$minor=$row['minor'];
	$street=$row['address'];
	$city=$row['city'];
	$zip=$row['zip'];
	$state=$row['state'];
	$country=$row['country'];
	if($row['alumn_sem']=="Spring"){
		$isspring="selected";
		$isfall="";
	} else {
		$isfall="selected";
		$isspring="";
	}
}
echo <<<END
<form method = "POST" action="">
<table>
<tr>
	<th>Name</th>
	<td>$first $middle $last</td>
</tr>
<tr>
	<th>Roll Number</th>
	<td>$roll</td>
</tr>
<tr>
	<th>New Password</th>
	<td><input type="password" name = "pass1" size = "30"></td>
</tr>
<tr>
	<th>Confirm Password</th>
	<td><input type="password" name = "pass2" size = "30"></td>
</tr>

<tr>
	<th>Alumn Year</th>
	<td><input type="text" name = "alumyear" size = "30" value="$alumyear"></td>
</tr>

<tr>
	<th>Alumn Semester</th>
	<td>
	<select name = "alumsemester">
		<option value = "Spring" $isspring>Spring</option>
		<option value = "Fall" $isfall>Fall</option>
	</select>
	</td>
</tr>

<tr>
	<th>Birth day</th>
	<td><input type="text" name = "bday" size = "30" value="$bday"></td>
</tr>
<tr>
	<th>Birth month</th>
	<td><input type="text" name = "bmonth" size = "30" value="$bmonth"></td>
</tr>
<tr>
	<th>Birth year</th>
	<td><input type="text" name = "byear" size = "30" value="$byear"></td>
</tr>

<tr>
	<th>Cell Phone #</th>
	<td><input type="text" name = "cell" size = "30" value="$cell"></td>
</tr>
<tr>
	<th>Work Phone</th>
	<td><input type="text" name = "work" size = "30" value="$work"></td>
</tr>
<tr>
	<th>Home Phone</th>
	<td><input type="text" name = "home" size = "30" value="$home"></td>
</tr>
<tr>
	<th>Email</th>
	<td><input type="text" name = "email" size = "30" value="$email"></td>
</tr>

<tr>
	<th>Street Address</th>
	<td><input type="text" name = "street" size = "30" value="$street"></td>
</tr>

<tr>
	<th>City</th>
	<td><input type="text" name = "city" size = "30" value="$city"></td>
</tr>
<tr>
	<th>State</th>
	<td><input type="text" name = "state" size = "30" value="$state"></td>
</tr>
<tr>
	<th>Zip Code</th>
	<td><input type="text" name = "zip" size = "30" value="$zip"></td>
</tr>
<tr>
	<th>Country</th>
	<td><input type="text" name = "country" size = "30" value="$country"></td>
</tr>

<tr>
	<th>Employer</th>
	<td><input type="text" name = "employer" size = "30" value="$employer"></td>
</tr>
<tr>
	<th>Job Title</th>
	<td><input type="text" name = "job" size = "30" value="$job"></td>
</tr>

<tr>
	<th>Major</th>
	<td><input type="text" name = "major" size = "30" value="$major"></td>
</tr>
<tr>
	<th>Minor</th>
	<td><input type="text" name = "minor" size = "30" value="$minor"></td>
</tr>

<tr><th>
	Image File
</th><td>
	<input type="file" name="datafile" size="18">
</td></tr>

<tr>
	<td><input type = "submit" value = "Change" name = "sub"></td>
</tr>


</table>
</form>

END;
?>