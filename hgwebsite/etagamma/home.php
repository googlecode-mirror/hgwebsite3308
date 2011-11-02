<img src="/img/mainSS/100.jpg" id="slideShow" width = "100%" height = "200">
<!-- A slidshow of some of our pictures -->
<script type="text/javascript">
c=1;
// slideshow gets called, it takes and displays the first picture
SlideShow();
function SlideShow() {
switch(c){
<?php
	// This code runs through all the images in img/mainS[lide]S[how]
	// and then writes code to slideshow them
	// opens mainss sets the imagecount to one
	$dir = opendir($_SERVER['DOCUMENT_ROOT']."/img/mainSS");
	$file=readdir($dir);
	$count = 1;
	// for every file in mainss, check to make sure it's a jpg. if not, skip
	// otherwise fill a case-switch with that image
	while(($file=readdir($dir))!= false){
		if(substr($file,-4)!=".jpg"){
			continue;
		}
		//    the img #    The slideshow image's source gets set to...    the current file!
		echo "case $count: document.getElementById('slideShow').src = '/img/mainSS/$file'; break;";
		$count++;
	}
?>
}
// increments for the next picture
c++;
// if c is greater than the total pictures, reset it
if(c>=<?php echo $count ?>){
	c=1;
}
// wait 5 seconds and then proceed to next slide
setTimeout("SlideShow()",5000);
}
</script>
<table><tr><td>
<p>
&nbsp&nbsp&nbsp&nbsp Welcome to the homepage for the Eta Gamma Chapter of <a href="http://www.thetatau.org">Theta Tau Fraternity</a>.
We are a National Co-Ed Professional Engineering Fraternity with the <a href="http://www.colorado.edu/">University of Colorado at Boulder</a>.
<br><br>
&nbsp&nbsp&nbsp&nbsp We host a great deal of fun, professional, social and philanthropic <a href = "/events">events</a>. 
Being a group of engineering students, we aim to prepare our members for a successful future career in engineering,
but also have a great time hanging out with each other at Fraternity events. 
Most of all, we are a big group of friends who support one another through the rigors of engineering school. 
Please feel free to browse our website and come to any of our <a href = "/join/rush">rush</a> events 
every spring and fall to learn more about Theta Tau, the oldest, and still foremost, Fraternity for Engineers.
</p></td><td>
</td></tr></table>
