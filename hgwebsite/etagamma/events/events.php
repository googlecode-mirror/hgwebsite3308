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
