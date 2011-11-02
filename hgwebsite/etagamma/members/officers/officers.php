<?php
connect();
$offQ = mysql_query("SELECT id,office,roll FROM officers ORDER BY id");
echo "<center><h1>Officers</h1><table width = \"100%\"><tr>";
for($i=0;$rollFetch = mysql_fetch_array($offQ);$i++){

	$roll = $rollFetch['roll'];
	$query = mysql_query("SELECT roll,first,last,email FROM contacts WHERE roll=".$roll);
	$row = mysql_fetch_array($query);
	echo <<< END
	<td><center>
		<a href = "/members/lookup.php?id=$row[0]">
		<img src="/img/memberpics/$row[0].jpg" alt=$row[1] BORDER=0 width = "150" height="200">
		</a><br>
		<b>$rollFetch[office]</b><br>
		$row[1] $row[2]<br>
		$row[3]<br><br>
		</center>
	</td>
END;
	if($i%3==2){
		echo "</tr><tr>";
	}
	
}
echo "</tr></table></center>";
	

?>