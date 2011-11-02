<script type="text/javascript">
var prev;
function init()
{
	window.eb.document.write('<form name="f"><textarea name="ta" cols="150" rows="15"><\/textarea><\/form>');
	
	//write();
}

function write()
{
	var textarea = window.eb.document.f.ta.value;
	if (prev != textarea) {
		df.document.open();
		prev = textarea;
		df.document.write(prev);
		df.document.close();
	}
	window.setTimeout(write, 300);
}
</script>
<frameset resizable="yes" rows="50%,*" onload="init();">
<frame name="eb" src=""><frame name="df" src="indexMain.php"></frameset>