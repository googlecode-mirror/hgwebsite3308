<?php

	$roll = $_GET["id"];
	connect();
	$query = mysql_query("SELECT * FROM contacts WHERE roll=".$roll);
	$row=mysql_fetch_array($query);
	$first=$row['first'];
	$middle="";
	if(isset($_SESSION['user'])){
		$middle=$row['middle'];
		$nick=$row['nick'];
		$bday=$row['b_day'];
		$bmonth=$row['b_month'];
		$byear=$row['b_year'];
		$cell=$row['cell'];
		$email=$row['email'];
	}
	$last=$row['last'];
	if($row['minor']!=""){
		$minor = "<tr><th>Minor: </th><td>$row[minor]</td></tr>";
	}
	if($row['init_day']!=""){
		$initation = "<tr><th>Initation Date: </th><td>$row[init_month] $row[init_day], $row[init_year] </td></tr>";
	}
	$query = mysql_query("SELECT first, last, roll FROM contacts WHERE roll=".$row['big_bro']);
	$big = mysql_fetch_array($query);
	$query = mysql_query("SELECT first, last, roll FROM contacts WHERE big_bro=".$roll);
	$littleCount=0;
	$littles="";
	while($little=mysql_fetch_array($query)){
		$littleCount++;
		$littles = $littles.$little['first']." ".$little['last'].', '.$little['roll']."<br>";
	}
	if($littleCount==1){
		$littles = "<tr><th>Little Brother: </th><td>".$littles."</td></tr>";
	} else if($littleCount>=2){
		$littles = "<tr><th>Little Brothers: </th><td>".$littles."</td></tr>";
	}
	if(!file_exists($_SERVER['DOCUMENT_ROOT']."/img/memberpics/$roll.jpg")){
		$rollPic="default";
	} else {
		$rollPic=$roll;
	}
echo <<< END
<table class = "lookup"><tr><td width = 155>
<img src ="/img/memberpics/$rollPic.jpg">
</td><td>
<table>
<tr>
	<th>Name: </th>
	<td>$first $middle $last</td>
</tr>
<tr>
	<th>Roll #: </th>
	<td>$roll</td>
</tr>
<tr>
	<th>Major: </th>
	<td>$row[major]</td>
</tr>
$minor
$initation
<tr>
	<th>Pledge Class: </th>
	<td>$row[pledge_class]</td>
</tr>
<tr>
	<th>Graduation: </th>
	<td>$row[alumn_sem] $row[alumn_year]</td>
</tr>
<tr>
	<th>Big Brother: </th>
	<td>$big[first] $big[last], $big[roll]<td>
</tr>
$littles
</table>
</td>
END;
if(isset($_SESSION['user'])){
echo <<< END
<td><table>
<tr>
	<th>Birthday:</th>
	<td>$bmonth $bday, $byear</td>
</tr>	
<tr>
	<th>Nick Name:</th>
	<td>$nick</td>
</tr>
<tr>
	<th>Phone Number:</th>
	<td>$cell</td>
</tr>
<tr>
	<th>Email:</th>
	<td>$email</td>
</tr>
<tr>
	<th>asd:</th>
	<td>$email</td>
</tr>

</table></td>
END;
if($row['employer']!=''){
echo "Heytrgf";
$employer=$row['employer'];
$job=$row['job'];
echo <<<END
<tr>
	<th>Employer:</th>
	<td>$employer</td>
</tr>
<tr>
	<th>Job Title:</th>
	<td>$job</td>
</tr>
END;
}
}
echo "</tr></table>";
?>