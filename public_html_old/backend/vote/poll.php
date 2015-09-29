<?php

///////////////////////////////////////////
//Specify Variables And Such
///////////////////////////////////////////
if(!isset($v_path)) //do some checking for $v_path
{
	$v_path = "|"; //check the GET and POST and see if it's defined there
	$v_path = (isset($_GET['v_path'])) ? $_GET['v_path'] : $v_path;
	$v_path = (isset($_POST['v_path'])) ? $_POST['v_path'] : $v_path;
	//if it's not there, consider this shorthand and default to "vote/"
	$v_path = ($v_path == "|") ? "vote/" : $v_path = $v_path;
}

//whether voting multiple times is enabled or not,
//the IP address will still be logged for security purposes
$ip = getenv(REMOTE_ADDR);

$plsr = file($v_path . "logger.txt");
$c_pl = file_get_contents($v_path . "logger.txt");

///////////////////////////////////////////
//Check if the user has voted or not.
///////////////////////////////////////////
if(preg_match("/$ip/", $c_pl))
{
	$ipf = "1";
	$disb = " disabled='disabled'";
}
else
{
	$ipf = "0";
	$disb = "";
}
///////////////////////////////////////////
//Specify more variables (for filenames)
///////////////////////////////////////////
$RESULT_FILE_NAME = $v_path . "poll_data.txt";
$que = $v_path . "question.txt";
$ans = $v_path . "ans.txt";
$fn = fopen ($que, "r");
$puff = fread ($fn, filesize($que));
fclose ($fn);
$QUESTION = $puff;
$lis = 0;
$plsr = file($ans);

for($x=0;$x<sizeof($plsr);$x++)
{
	$temp = explode("|",$plsr[$x]);
	$list[$lis] = $temp[0];
	$lis++;
}
$ANSWER = $list;

if (!isset($_GET['answer']) && !$_POST['vresult'])
{
	if($submit)
	{
		echo "<h2><b>Error!</b></h2>\nYou voted but didn't pick anything! If you want to vote, check the option you want and click Vote.";
	}
	else
	{
		echo "<FORM METHOD=\"GET\" ACTION=\"" . $v_path . "poll.php\" TARGET=\"votewindow\" NAME=\"vform\"><input type=hidden name=v_path value=\"" . $v_path . "\" />\n";
		echo "<TABLE align=center border=1 borderColor=#3399CC cellPadding=2 class=normaltext style=\"BORDER-BOTTOM-COLOR: #3399CC; BORDER-COLLAPSE: collapse; BORDER-LEFT-COLOR: #3399CC; BORDER-RIGHT-COLOR: #3399CC; BORDER-TOP-COLOR: #3399CC\" >\n";
		echo "<TR><TH>$QUESTION</TH></TR>\n";
		while (list($key, $val) = each($ANSWER))
		{
			echo "<TR><TD align=\"left\"><INPUT TYPE=\"radio\" NAME=\"answer\"$disb VALUE=\"$key\"> $val</TD></TR>\n";
		}
		echo "<TR><TD align=\"center\"><INPUT TYPE=\"submit\" NAME=\"vote\" onClick=\"voteForm()\" VALUE=\" Vote \"" . $disb . "></TD></TR>\n";
		echo "<TR><TD align=\"center\"></form><form method=post action=\"" . $v_path . "poll.php\" target=votewindow name=vformb><input type=hidden name=v_path value=\"" . $v_path . "\" /><input type=hidden name=vresult value=1><INPUT TYPE=\"Submit\" NAME=\"submit\" VALUE=\"Current Results\" onClick=\"voteFormb();\">\n";
		echo "</TABLE></form>";
	}
}

if (strlen($_GET['answer'])>0 || $_POST['vresult'])
{
	echo "<body onload='resizeTo(512, document.body.offsetHeight + 75)'>";
	if($ipf || $_POST['vresult'])
	{
		$file_array = file($RESULT_FILE_NAME);
		$old_answer = $file_array[$_GET['answer']];
		$old_answer = preg_replace("/\n\r*/", "", $old_answer);
		$file_array[$_GET['answer']] = $old_answer . "\n";
		if($_POST['vresult'])
		{
			echo "<div align=center><b>Here are the current results:</b></div>";
		}
		else
		{
			echo "<font color=red><div align=center><b>Sorry, you have already voted.</b></div></font>";
		}
	}
	else
	{
		if ($_GET['answer'] < count($ANSWER))
		{
			$file_array = file($RESULT_FILE_NAME);
			$old_answer = $file_array[$_GET['answer']];
			$old_answer = preg_replace("/\n\r*/", "", $old_answer);
			$file_array[$_GET['answer']] = ($old_answer + 1)."\n";
			$fname=$v_path . "logger.txt";
			$fq = fopen($fname, "a++");
			fwrite($fq, "\n");
			fwrite($fq, $ip);
			fclose($fq);
			$file = join('', $file_array);
			$fp = fopen($RESULT_FILE_NAME, "w");
			fwrite($fp, $file);
			fclose($fp);
			echo "<div align=center>Vote saved.</div>";
		}
		else
		{
			$file_array = file($RESULT_FILE_NAME);
			$old_answer = $file_array[$_GET['answer']];
			$old_answer = preg_replace("/\n\r*/", "", $old_answer);
			$file_array[$_GET['answer']] = ($old_answer + 1)."\n";
			echo "<font color=red><div align=center><b>The poll has been updated. Vote again.</b></div></font>";
		}
	}
	while(list($key, $val) = each($file_array))
	{
		$total += $val;
	}
	echo "<TABLE align=center border=1 borderColor=#3399CC cellPadding=2 class=normaltext style=\"BORDER-BOTTOM-COLOR: #3399CC; BORDER-COLLAPSE: collapse; BORDER-LEFT-COLOR: #3399CC; BORDER-RIGHT-COLOR: #3399CC; BORDER-TOP-COLOR: #3399CC\" width=95%>\n";
	echo "<tr><th>Options</th><th>Percentage</th><th>Votes</th></tr>";
	while(list($key, $val) = each($ANSWER))
	{
		$percent = ($file_array[$key] > 0) ? $file_array[$key] * 100 / $total : 0;
		//avoid divisions by zero, especially for the PHP5 crowd
		$percent_int = floor($percent);
		$percent_float = number_format($percent, 1);
		$tp += $percent_float;
		if($percent_int>=75)
		{
			$color="blue";
		}
		elseif($percent_int>=50)
		{
			$color="green";
		}
		elseif($percent_int>=25)
		{
			$color="orange";
		}
		elseif($percent_int<25)
		{
			$color="red";
		}
		echo "<tr><td> $ANSWER[$key] </td><td><table cellpadding=1 cellspacing=0 width=100% border=0 background='" . $v_path . "images/white.gif'><tr><td><table cellpadding=0 cellspacing=0 border=0 width=100%>
<tr>
<td background='" . $v_path . "images/$color.gif' width=$percent_int% height=10 style=border:0 >
<spacer type=block width=2 height=8>
</td>
<td class=white width=91% height=10 style=border:0>
<spacer type=block width=2 height=8>
</td>
</tr>
</table>
</td>
</tr>
</table>$percent_float%</td><td>$file_array[$key]</td></tr>";
	}
	echo "<td>Total Votes: " . $total . "</td></TABLE></body>";
}

?>
