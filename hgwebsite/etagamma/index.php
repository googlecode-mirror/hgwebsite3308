<?php
// this should test svn?
// creates or resumes the session cookies
session_start();
// connnects to the mysql database!
// every page should be a subset of index.php, or they will not have access to these
function connect(){
	$connection = mysql_connect('localhost', 'bensperr_etagama', 'A#N%%U=7AglJ')or die("Cannot Connect to DB");
	mysql_select_db('bensperr_thetatau')or die("Cannot find DB");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<title>Eta Gamma Chapter of Theta Tau</title>
	<meta name="description" content="The University of Colorado at Boulder chapter of Theta Tau professional engineering fraternity">
	<meta name="keywords" content="theta tau, thetatau, eta gamma">
</head>
<body  background="/img/bg2.PNG">
<style type="text/css">
table.topbar {
	border-width: 0px;
	border-spacing: 0px;
}
table.topbar td{
	padding:0px;
	width:20%;
	text-align:center;
	font-family:"Times New Roman";
	font-weight:900;
}

table.subMenu {
	border-width: 0px;
	border-spacing: 0px;
}
table.subMenu td {
	border-width:2px 2px 0px 0px;
	border-style:solid;
	border-color:#333;
	padding:0px;
	width:20%;
	text-align:center;
	font-family:"Times New Roman";
	font-weight:900;
	background-color:#777;
}
table.subMenu td.first {
	border-width:2px 2px 0px 2px;
}
table.subMenu a{
	display: block;
	text-decoration: none;
	color: #F0F0F0;
}

table.content {
	border: 2px solid #333;
	background-color: #DDD;
	font-family:"Times New Roman";
}

table.bottomBar{
	border: 2px solid #333;
	background-color: #777;
	color: #FFF;
	font-family:"Times New Roman";
}
table.bottomBar a {
	color: #FFE;
}
table.bottomBar a:hover{
	color: #A00;
}

table.lookup th{
	text-align: left;
}
table.memList tr.row1 {
	background-color: #DDD;
}
table.memList tr.row2 {
	background-color: #BBB;
}
table.memList th {
	text-align: left;
	background-color: #AAA;
}
table.content a{
	color: #000;
}
table.content a:hover{
	color: #A00;
}
h1 {
	
}
ul {
	margin:0;
	padding:0;
	list-style:none;
	width:100%;
}
ul li{
	position: relative;
}
li ul {
	position: absolute;
	top: 30;
	display: none;
}
a {
	text-decoration: none;
	font-weight:900;
}
ul li a{
	border: solid #333;
	border-width:0px 2px 2px 2px;
	display: block;
	text-decoration: none;
	color: #F0F0F0;
	background: #777;
	padding: 5px;
}

ul li a.top{
	border: solid #333;
	border-width:2px 1px 2px 1px;
}
ul li a.topLast{
	border: solid #333;
	border-width:2px 2px 2px 1px;
}
ul li a.topFirst{
	border: solid #333;
	border-width:2px 1px 2px 2px;
}

li:hover ul {
	display: block;
}

</style>
<center><table width = "800" CELLSPACING="6">
	<tr><td>
		<center><img src="/img/banner.png"></center>
	</td></tr>
	<tr><td>
		<table width = "100%" class="topbar">
		<tr>
		<td>
			<ul>
				<li>
					<a href="/#" class = "topFirst">HOME</a>
				</li>
			</ul>
		</td>
		<td>
			<ul>
				<li>
					<a href="/join" class = "top">JOIN</a>
					<ul>
					<li><a href="/join/rush">Rush</a></li>
					<li><a href="/join/pledge">Pledge</a></li>
					<li><a href="/join/faq">FAQ</a></li>
					</ul>
				</li>
			</ul>
		</td>
		<td>
			<ul>
				<li><a href="/members" class = "top">MEMBERS</a>
					<ul>
					<li><a href="/members/officers">Officers</a></li>
					<li><a href="/members/students">Student Members</a></li>
					<li><a href="/members/alumni">Alumni</a></li>
					<li><a href="/members/pledges">Pledge Class</a></li>
					</ul> 
				</li>
			</ul>
		</td>
		<td>
			<ul>
				<li><a href="/events" class = "top">EVENTS</a>
					<ul>
						<li><a href="/events/calendar">Calendar</a></li>
					</ul> 
				</li>
			</ul>
		</td>
<?php
	
	if(!isset($_SESSION['user'])){
		echo <<< END
		<td>
			<ul>
				<li>
					<a href="/login" class = "topLast">LOG IN</a>
				</li>
			</ul>
		</td>	
END;
	} else {
		echo <<< END
		<td>
			<ul>
				<li><a href="/login" class = "top">ADMIN</a>
					<ul>
					<li><a href="/login/changeinfo">Change My Info</a></li>
					<li><a href="/login/officers">Officers</a></li>
					<li><a href="/login/eventchange">Add Event</a></li>
					<li><a href="/login/addpledge">Add Pledge</a></li>
					<li><a href="/login/logout.php">Logout</a></li>
					</ul> 
				</li>
			</ul>
		</td>
		
END;
	}
?>
		
		</tr>
		</table>
	</td></tr>
	<tr height = "100%" ><td VALIGN="top">
	
<?php
	if($subMen=="members"){
		$subMen = <<< END
<table width = "100%" class="subMenu"><tr>
<td class = "first"><a href = "/members/officers">Officers</a></td>
<td><a href = "/members/students">Student Members</a></td>
<td><a href = "/members/alumni">Alumni</a></td>
<td><a href = "/members/pledges">Pledges</a></td>
</tr></table>
END;
	} else if($subMen=="events"){
$subMen = <<< END
<table width = "100%" class="subMenu"><tr>
<td class = "first"><a href = "/events">Events</a></td>
<td><a href = "/events/calendar">Calendar</a></td>
</tr></table>
END;
		
	} else if($subMen=="join"){
$subMen = 	<<< END

<table width = "100%" class="subMenu"><tr>
<td class = "first"><a href = "/join">Join</a></td>
<td><a href = "/join/rush">Rush</a></td>
<td><a href = "/join/pledge">Pledge</a></td>
<td><a href = "/join/faq">FAQ</a></td>
</tr></table>

END;
	} else {
		$subMen = "";
	}
	echo $subMen;
	echo '<table width = "100%" class="content"><tr><td>';
	if(isset($page)){
		include $page;
	} else {
		include "home.php";
	}
		
?>
	</tr></td></table>
	</td></tr>
	<tr><td>
	<table class = "bottomBar" width = "100%">
		<tr><td>
		<a href="/contact">
		Contact Us</a>
		</td><td ALIGN="RIGHT">
		<script type="text/javascript">
		//document.write("Last Updated: "+document.lastModified.substring(10,0));
		</script>
		&copy 2011</td></tr>
	</table>
	</td></tr>
	</table></center>
</body>
</html>
