<?php

/********************************************/
/* This is a simple demonstration on how to */
/* place the poll on your pages.            */
/********************************************/

?>
<html>
<head>
<title>Simple PHP Poll Demonstration</title>
<!-- The JavaScript makes the pop-up window. -->
<script type="text/javascript">
window.name = "parent";
function voteForma()
{
	window.open("","votewindow","menubar=0,resizable=0,width=512,height=256");
	document.vform.submit();
	setTimeOut("document.location.reload()", 1000);
}

function voteFormb()
{
	window.open("","votewindow","menubar=0,resizable=0,width=512,height=256");
	document.vformb.submit();
}
</script>
<!-- The JavaScript makes the pop-up window. -->
</head>
<body>
<?php
$v_path = ""; //This is the path from here to the poll.
include $v_path . "poll.php"; //Now we include it.
//Yes, you NEED to define $v_path!!

//Also, if you're using XHTML, make sure to include this:
//$xhtml = "1";
//So your coding remains compliant
?>
</body>
</html>