<?php
if(isset($_SESSION['officer'])){
echo <<< END
Add Pledge<br>
Make pledge member<br>
Modify contact info<br>
Summon Golgoloth, Undead king of Pain<br>
END;
} else {
	if(isset($_POST['position'])){
		$_SESSION['officer']=$_POST['position'];
		echo "Logged in as ".$_SESSION['officer']." without a password";
	} else {
echo <<<END
<form method = "POST" action="">
<table>
<tr>
<th>Position</th><td>

<select name = "position">
	<option value = "webadmin">Website Admin</option>
	<option value = "corsec">Cor Sec</option>
	<option value = "scribe">Scribe</option>
	<option value = "pledgem">Pledge Master</option>
</select>
</td>
<tr><td><b>Password</b></td><td><input type="password" name = "pass" size = "15"></td></tr>
<tr><td><input type = "submit" value = "Login"></td></tr>
</table>
</form>
END;
	}
}
?>