<?php
connect();
$query = mysql_query("SELECT roll,first,last,pledge_class,grad_year,major FROM contacts WHERE status='active' ORDER BY roll");
echo <<<END
<center>
<h1>Student Members</h1>
<table class = "memList"><tr>
<th width = "40">Roll</th>
<th>Name</th>
<th>Major</th>
<th width = "80">Grad Year </th>
<th>Pledge Class</th>
</tr>
END;
for($i=0;$row = mysql_fetch_array($query);$i++){
if($i%2==0){
	$class = "row1";
} else {
	$class = "row2";
}
echo <<< END
<tr class = "$class">
	
	<td>$row[0]</td>
	<td><a href = "/members/lookup.php?id=$row[0]">
	$row[1] $row[2]
	</a></td>
	<td>$row[5]</td>
	<td>$row[4]</td>
	<td>$row[3]</td>
</tr>
END;
}
echo "</table></center><br>";
	

?>