<?php

if(isset($_POST['sub'])){
	connect();
	$title =	mysql_real_escape_string($_POST['title']);
	$location =	mysql_real_escape_string($_POST['location']);
	$type =		mysql_real_escape_string($_POST['type']);
	$desc =		mysql_real_escape_string($_POST['title']);
	$date =		mysql_real_escape_string($_POST['date']);
	$time =		mysql_real_escape_string($_POST['time']);
	
	$datetime =		$date.' '.$time;
	$query = "INSERT INTO events (title, description, date, location,type) VALUES ('$title','$desc','$datetime','$location','$type')";
	echo $query;
	mysql_query($query);
	
} else {
echo <<<END
<form method = "POST" action="">
<table>

<tr><th>Title</th><td><input type="text" name = "title" size = "80"></td></tr>

<tr><th>Description</th><td>
<textarea name="description" cols="80" rows="5">
</textarea></td></tr>

<tr><th>Location</th><td><input type="text" name = "location" size = "80"></td></tr>

<tr><th>Event Type</th><td>

<select name="type">
	<option value="Brotherhood">Brotherhood</option>
	<option value="Rush">Rush</option>
	<option value="Community Service">Community Service</option>
</select>

</td></tr>

<tr>
<th>Date</th>

<td><input type = "text" value = "YEAR-MO-DA" name = "date"></td></tr>
<tr>
<th>Time</th>
<td><input type = "text" value = "HH:MM:SS" name = "time"></td></tr>
<tr><td><input type = "submit" value = "Add Event" name = "sub"></td></tr>
</table></form>

END;
}
?>
