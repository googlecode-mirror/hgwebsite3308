<?php
connect();
if(isset($_POST['roll'])){
	$password=$_POST['pass'];
	$hash = hash('sha256',$password);
	$roll = mysql_real_escape_string($_POST['roll']);
	$query = "SELECT * FROM contacts WHERE roll='$roll' and password='$hash';";
	$result = mysql_query($query);
	$rowcount = mysql_num_rows($result);
	if($rowcount==1){
		$_SESSION['user']=$roll;
		echo <<< END
			Login Successful!<br>
			<a href = "/#">Homepage</a>
			<script type="text/javascript">
			function redirect(){
				window.location="/#";
			}
			setTimeout('redirect()',1000);
		</script>
END;
	} else if($rowcount==0) {
		echo 'Login Failed!';
		if(strtoupper($password)==$password){
			echo "<br><br>Was caps lock on?";
		}
		die();
	} else {
		echo 'fuck you ben!';
	}
	
} else {
	echo <<< END
	<center>
	<form method = "POST" action=""><table><tr>
	<td><b>Roll Number</b></td>
	<td><input type="text" name = "roll" size = "15"></td>
	<tr><td><b>Password</b></td><td><input type="password" name = "pass" size = "15"></td>
	</tr><tr><td><input type = "submit" value = "Login"></td>
	</tr></table></form>

	<br><a href="forgotpass.php">Forgot your password?</a></center>

END;
}?>
