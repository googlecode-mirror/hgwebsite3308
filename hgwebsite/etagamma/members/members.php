
<?php

connect();
$query = mysql_query("SELECT roll,first,last FROM contacts WHERE status='active' ORDER BY roll");
echo "<center></center><table width = \"100%\"><tr>";
for($i=0;$row = mysql_fetch_array($query);$i++){
$roll = $row[0];
if(!file_exists($_SERVER['DOCUMENT_ROOT']."/img/memberpics/$roll.jpg")){
	$rollPic="default";
} else {
	$rollPic=$roll;
}
echo <<< END
<td><center><a href = "lookup.php?id=$row[0]">
	<img src="/img/memberpics/$rollPic.jpg" alt="$row[1]" BORDER=0 width = "150" height="200"></a>
	<br>
	$row[1] $row[2]
</center></td>
END;
	if($i%5==4){
		echo "</tr><tr>";
	}
}
echo "</tr></table>";
	

?>