<?php

///////////////////////////////////////////
//check if Simple PHP Poll has setup or not
///////////////////////////////////////////

if (file_exists("user/info.txt"))
{
	$info = file_get_contents("user/info.txt");
	$info = explode("|", $info);
	$password = strrev($info[0]);
	$email = $info[1];
	$web = $info[2];
}
else
{
	header('Location: setup.php');
}

///////////////////////////////////////////
//check cookies to see if user is logged in
///////////////////////////////////////////

$cookie = $_COOKIE["login_cookie"];
if($_GET['action'] != "logout")
{
	$pass_info=explode(";",$cookie);
	$s=$pass_info[0];
}

if ($_GET['action']==""){ //if user isn't doing anything

?>
<center><table align=middle><td align=left width=20%>
<tr><td height=27 colspan=2><FONT SIZE=4 COLOR=#000000>:: Poll Administration Panel ::</FONT></td><tr><td>Please enter the password.</td></tr><tr><form method=post action=?action=login><td>Password:</td><td><input type=password name=pass>&nbsp;<input type=submit value=Submit></td></tr></form></table></center>
<?php

}

///////////////////////////////////////////
//Create the Simple PHP Poll main menu
///////////////////////////////////////////
function pmenu(){
?>
<script type='text/javascript'>
function clear_iplog(link){
	link.href = "#"; //add non-javascript support
	var answer = confirm('Doing so will allow all users to vote again. Do you want to continue?');
	if (answer){
		window.location = '?action=cip_log';
	}
}
function clear_vcount(link){
	link.href = "#"; //add non-javascript support
	var answer = confirm('Doing so will delete the AMOUNT of votes made. Do you want to continue?');
	if (answer){
		window.location = '?action=cvt_cnt';
	}
}</script>
<table align=center width=100%><tr><td><A HREF="?action=edit&filename=question.txt">Edit Poll Question</A></td><td><A HREF="?action=edit&filename=ans.txt">Edit Poll Answers</A></td><td><A href="?action=cip_log" onclick="clear_iplog(this);">Clear IP Logs</A></td><td><A href="?action=cvt_cnt" onclick="clear_vcount(this);">Delete Vote Count</A></td><td><A HREF="admin.php?action=logout">Logout</A></td></tr></table>
<?php
}

///////////////////////////////////////////
//Login and check if the password matches
///////////////////////////////////////////
$pass = md5($_POST['pass']);
if ($_GET['action']=="login")
{
	if ($pass==$password)
	{
		setCookie("login_cookie", $password, time() + 850);
		echo "<font size=6><b>Simple PHP Poll Administration Panel</b></font><br><br><br>
		You are now logged in. From here, you can edit the question and answers, clear the IP logs, and more.<br><hr>";
		pmenu(); //load the menu if password matches
	}
	else
	{
		echo "Invalid Passsword";
	}
}

///////////////////////////////////////////
//Perform editing on Question / Answers
///////////////////////////////////////////
if ($_GET['action']=="edit" && $s==$password) //Remember, $s = the password in your cookies!!
{
	echo "<font size=6><b>Now Editing: " . $_GET['filename'] . "</b></font><br><br>";
	$fd = fopen($_GET['filename'], "r");
	$stuff = fread($fd, filesize($_GET['filename']));
	fclose ($fd);
	//if editing the answers, display the warning
	if($_GET['filename'] == "ans.txt")
	{
		$text="<div align=center><FONT COLOR=red>Note: Vote count and IP logs will be DELETED upon changing.</FONT></div>";
	}
?>
<center>
<form method="post" action="?action=temp2&fil=<?php echo $filename ?>">
<table width="" border="1" bordercolor="#00000" cellpadding="0" cellspacing="0">
<tr>
<td width="86%" align=middle>
<textarea name="cont" cols="45" rows="8"><?php echo $stuff ?></textarea>
</td>
</tr>
<td><?php echo "$text"; ?></td>
<tr>
<td width="86%" align=middle>&nbsp;
<input type="submit" name="Submit" value="Save">&nbsp;<input type="button" name="Cancel" value="Cancel" onclick="javascript: history.back(1);">
</td>
</tr>
<tr>
</tr>
</table></center>
</form>
<?php
}elseif($_GET['action']=="edit" && $s!=$password){
echo "Please Login"; //but if pass is incorrect dump to "please login"
}

///////////////////////////////////////////
//Do actual editing on Questions / Answers
///////////////////////////////////////////
if ($_GET['action']=="temp2" && $s==$password)
{
	$cont=stripslashes($_POST['cont']);
	$fp = fopen($_GET['fil'], "w");
	fwrite($fp, $cont);
	fclose($fp);
	//if editing the answers, delete poll_data.txt
	if ($_GET['fil']=="ans.txt")
	{
		$fp = fopen("poll_data.txt", "w");
		$mplsr = file("ans.txt");
		for($x=0; $x<sizeof($mplsr); $x++)
		{
			fwrite($fp, "0");
			fwrite($fp, "\n");
		}
		fclose($fp);
	}
?>
<table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td align=middle>Changes saved.<hr><?php pmenu(); ?></td>
</tr>
</table>
<?php
}elseif($_GET['action']=="temp2" && $s!=$password){
echo "Please Login";
}

///////////////////////////////////////////
//Clear IP Logs and Clear Vote Count
///////////////////////////////////////////
if ($_GET['action']=="cip_log" && $s==$password)
{
	$fp = fopen("logger.txt", "w");
	fwrite($fp, "Bot IPs:\n");
	fwrite($fp, "0.0.0.0\n");
	fwrite($fp, "127.0.0.1\n");
	fwrite($fp, "255.255.255.0\n");
	fwrite($fp, "192.168.0.1\n");
	fwrite($fp, "1.1.1.1\n");
	fwrite($fp, "9.9.9.9\n");
	fwrite($fp, "\nUser IPs:");
	fclose($fp);
	echo "<font color=blue face=arial>All IP Logs have been cleared.<br><br>Remember to delete the vote count if you want it back to 0.</font><hr>";
	pmenu();
}elseif($_GET['action']=="cip_log" && $s!=$password){
echo "Please Login";
}
if ($_GET['action']=="cvt_cnt" && $s==$password)
{
	$fp = fopen("poll_data.txt", "w");
	$mplsr = file("ans.txt");
	for($x=0; $x<sizeof($mplsr); $x++)
	{
		fwrite($fp, "0");
		fwrite($fp, "\n");
	}
	fclose($fp);
	echo "<font color=blue face=arial>The vote count has been deleted.<br><br>Remember to clear the IP logs if you want people to vote again.</font><hr>";
	pmenu();
}elseif($_GET['action']=="cvt_cnt" && $s!=$password){
echo "Please Login";
}

///////////////////////////////////////////
//Logout and Delete Cookies
///////////////////////////////////////////
if($_GET['action']=="logout")
{
	setCookie("login_cookie","0;",time() - 850);
	$pass_info=explode(";",$cookie);
	$s=$pass_info[0];
	echo "You are now logged out.<br /><br />
<a href='admin.php'>Click here to go back to the login page.</a><br />
<a href='" . $web . "'>Click here to go back to your site.</a><br />
<a href='preview.php'>Click here to test out the poll ALONE.</a>
<br /><br />
Thanks for updating!";
}
///////////////////////////////////////////
//Display the Footer at the Bottom
///////////////////////////////////////////
if($_GET['action']=="")
{
echo "<HR><CENTER><font face=arial><a href='javascript:history.go(-1);'>Did you arrive here by mistake? Click here to go back.</a></font></CENTER>";
}
else
{
echo "<HR><CENTER><font face=arial><a href='" . $web . "' target='_blank'>Click here to preview the site in a new window.</a><br><a href='preview.php' target='_blank'>Click here to preview the poll ALONE in a new window.</a></font></CENTER>";
}
?>
