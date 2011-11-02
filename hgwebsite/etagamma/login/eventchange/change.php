<?php

if(isset($_POST['sub'])){
	$query = "INSERT INTO events (title, description, date, location,type) VALUES ('$title','$description',$date,'$location','$type')";
} else {
echo <<<END
<form method = "POST" action="">
<table>

<tr><th>Title</th><td><input type="text" name = "title" size = "106"></td></tr>

<tr><th>Description</th><td>
<textarea name="description" cols="80" rows="5">
</textarea></td></tr>

<tr><th>Location</th><td><input type="text" name = "location" size = "106"></td></tr>

<tr><th>Event Type</th><td>

<select>
	<option value="Brotherhood">Brotherhood</option>
	<option value="Rush">Rush</option>
	<option value="Community Service">Community Service</option>
</select>

</td></tr>

<tr><td><input type = "submit" value = "Add Event" name = "sub"></td></tr>

</table></form>

END;
}
?>