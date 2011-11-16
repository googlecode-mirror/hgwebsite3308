<?php 
if(isset($_GET['evid'])){
	
}

?>

No event content yet. Enjoy these picture of mountains:
<br><br>
<img src="/img/eventSS/100.jpg" id="slideShow" width = "800" height = "600">
<script type="text/javascript">
c=1;
SlideShow();

function SlideShow() {
switch(c){
<?php
	$dir = opendir($_SERVER['DOCUMENT_ROOT']."/img/eventSS");
	$file=readdir($dir);
	$count = 1;
	while(($file=readdir($dir))!= false){
		if(substr($file,-4)!=".jpg"){
			continue;
		}
		echo "case $count: document.getElementById('slideShow').src = '/img/eventSS/$file'; break;
		";
		$count++;
	}
?>
}
c++;
if(c>=<?php echo $count ?>){
	c=1;
}
setTimeout("SlideShow()",5000);
}
</script>
<table width = "100%" class = "memList">
<tr>
    <th>Event</th><th>Date</th><th>Committee</th>
</tr>
<?php
connect();
$query = mysql_query("SELECT * FROM events WHERE TO_DAYS(date)-TO_DAYS(NOW())<30 AND date>NOW()");
while($row = mysql_fetch_array($query)){
    $datetime=strtotime($row['date']);
    echo date('H-i',$datetime)." ";
    if($i==1)
        $i=2;
    else
        $i=1;
    echo '<tr class="row'.$i.'"><td><a href="">'.$row['title']."</a></td><td>".$row['date']."</td><td>".$row['type']."</td></tr>";
}

?>

</table>
