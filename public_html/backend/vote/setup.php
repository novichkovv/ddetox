<?php

/************************************************
*************************************************
**                                             **
** Simple PHP Poll by X-Fi6 and Scriptsez Inc. **
**                                             **
*************************************************
*************************************************

     <Licensed with the General GNU License>

*************************************************
** File: setup.php                             **
************************************************/

//////////////////////////////////////////////////////////
//NOTE: You may modify this installation file as you wish,
//but modifications made to this file will not be
//accepted into our official database. ~X-Fi6
//////////////////////////////////////////////////////////

$error = "";

if(file_exists('user/info.txt'))
{
	die('Setup has completed already completed. Please delete setup.php.<br><br>
	If an error has occured, delete user/info.txt and run setup.php again.');
}

if($_GET['submit'])
{
	$putmessage = 0;
	if($_POST['pass'] != $_POST['pass2'] || !$_POST['pass'] || !$_POST['email'] || !$_POST['web'])
	{
		$putmessage = 1;
		$error = "<center><font color=red><b>You forgot a field, or your passwords don't match.</b></font></center>";
	}
	else
	{
		$fp = fopen("user/info.txt", "w");
		$pass = strrev(md5($_POST['pass'])) . "|";
		fwrite($fp, $pass);
		fwrite($fp, $_POST['email']);
		fwrite($fp, "|");
		fwrite($fp, $_POST['web']);
		fclose($fp);
		if(file_exists('user/info.txt'))
		{
			if($_POST['chmod'])
			{
				chmod("user/info.txt", 0644);
			}
		}
		else
		{
			$putmessage = 1;
			$error = "<center><font color=red><b>There was an error writing or reading user/info.txt.</b></font></center>";
		}
	}
}
else
{
	$putmessage = 1;
}

if($putmessage)
{
	$message = $error . "<form method=post action=?submit=1><center><table border=1><tr><td><table><td align=left width=40%>
<tr><td height=27 colspan=2><FONT SIZE=4 COLOR=#000000><b>:: Simple PHP Poll 2.0 SETUP ::</b></FONT></td><tr><td>Create your Password:</td></tr><tr><td>Password:</td><td><input type=password name=pass></td></tr><tr><td>Confirm:</td><td><input type=password name=pass2></td></tr><tr><td>&nbsp;</td></tr>
<tr><td>Config Settings:</td></tr><tr><td>CHMOD:</td><td><input name=chmod type=checkbox value=1>Yes</td></tr><tr><td>&nbsp;</td></tr>
<tr><td>Other Information:</td></tr><tr><td>Email:</td><td><input name=email></td></tr><tr><td>Webpage to have poll:</td><td><input name=web> (Example: http://www.mysite.com/dailypoll.php)</td></tr></table></td></tr></table><br><input type=submit value=Submit>&nbsp;&nbsp;<input type=reset value=Clear></center><br>
<HR><CENTER><font face=arial><a href='javascript:history.go(-1)'>Did you arrive here by mistake? Click here to go back.</a></font></CENTER>";
}
else
{
	$chmod = ($_POST['chmod']) ? " and by CHMODing it to 644" : "";
	$message = "Installation is complete.<br><br><font size=5><b>Please delete setup.php NOW.<br><br>Simple PHP Poll has protected user/info.txt by protecting it with .htaccess" . $chmod . ". Further protection may be necessary, however.</b></font>";
}

echo $message;

?>