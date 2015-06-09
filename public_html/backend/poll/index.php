<?php

session_start();
include("config.php");

// Do login
$login_error = FALSE;
if(isset($_POST['txtlogin'])){
	if($_POST['txtlogin'] == $config['password']){
		$_SESSION['loggedin'] = TRUE;
	}else{
		$login_error = TRUE;
	}
}

// Declaration
$openQuestion = "";

// If loggedin
if(isset($_SESSION['loggedin'])){

	include("Poll.php");
	$Poll = new Poll(null, $config['data'], true);
	
	// Add poll
	if(isset($_GET['add_poll']) && !isset($_POST['txtsave'])){
		$id = $Poll->Add("New poll");	
		$Poll->Save();
		$openQuestion = $id;
	}
	
	// Delete poll
	if(isset($_GET['delete_poll']) && is_numeric($_GET['delete_poll']) && !isset($_POST['txtsave'])){
		$Poll->Remove($_GET['delete_poll']);
		$Poll->Save();
	}
	
	// Save all
	if(isset($_POST['txtsave'])){
		$Poll->AdminSave($_POST);
	}
	
	$Questions = $Poll->GetQuestions();
	
	// Add new answer
	if(isset($_POST['txtaddanswer']) && is_numeric($_POST['txtaddanswer'])){
		$Questions[$_POST['txtaddanswer']]->AddAnswer("");
		$Poll->Save();
		$openQuestion = $_POST['txtaddanswer'];
	}
	
	// Delete answer
	if(isset($_GET['delete_answer']) && !isset($_POST['txtsave'])){
		$parts = explode("_", $_GET['delete_answer']);
		$Questions[$parts[0]]->RemoveAnswer($parts[1]);
		$Poll->Save();
		$openQuestion = $parts[0];
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Poll Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function editPoll(id){
	var element 		= document.getElementById('poll' + id);
	var titlespan 		= document.getElementById('titlespan' + id);
	var titleinput 		= document.getElementById('titleinput' + id);
	if(element.style.display == "none"){
		element.style.display = "block";
		titleinput.value = titlespan.innerHTML.replace('&amp;', '&');
		titlespan.style.display = "none";	
		titleinput.style.display = "block";
	}else{
		element.style.display = "none";	
		 titlespan.innerHTML = titleinput.value;
		titlespan.style.display = "block";	
		titleinput.style.display = "none";
	}
}
function addAnswer(id){
	document.getElementById('txtaddanswer').value = id;
	document.forms[0].submit();
}
</script>

<style type="text/css">
<!--
#globaldescription {	float: right;
	width: 410px;
	padding: 10px;
}
#globalinfo {	border-right:1px solid #EEEEEE;
	float: left;
	width: 180px;
	padding: 10px;
	font-weight: bold;
}
-->
</style>
</head>

<body onload="document.getElementById('adminform').style.display='block';">
<div id="wrapper">
  <div id="maincontent">
  <h1>Poll Administrator</h1>
  <?php if(isset($_SESSION['loggedin'])){ ?>
  <div id="globalinfo">Number of polls: <?php echo count($Questions); ?></div>
  <div id="globaldescription">On this page you can manage your polls.</div>
  <hr />
   <noscript>
  <div class="noscript">We're sorry, but you must have JavaScript
enabled in your browser to use this page.</div>
  </noscript>
  <form method="post" action="" id="adminform" style="display:none;" name="frmpoll">
    <table width="100%" border="0" cellpadding="0" cellspacing="2">
    
    <tbody>
  <?php foreach($Questions as $Question){ ?>
  <tr class="head">
    <td width="47%"><span id="titlespan<?php echo $Question->id; ?>" <?php if($openQuestion == $Question->id) echo 'style="display:none"'; ?>><?php echo stripslashes($Question->title) ?></span>
      <input name="title_<?php echo $Question->id; ?>" <?php if($openQuestion != $Question->id) echo 'style="display:none"'; ?> type="text" value="<?php echo stripslashes($Question->title) ?>" id="titleinput<?php echo $Question->id; ?>" size="35" />
      <a name="pollanchor<?php echo $Question->id; ?>" id="pollanchor<?php echo $Question->id; ?>"></a></td>
    <td width="36%" align="right" class="codetip"><strong>PHP Code:</strong>&nbsp;<code>&lt;?php echo Poll(<?php echo $Question->id; ?>); ?&gt;</code></td>
    <td width="17%" align="right" valign="top"><a href="javascript:editPoll('<?php echo $Question->id; ?>')" class="button orange">Edit</a><a href="index.php?delete_poll=<?php echo $Question->id; ?>" class="button red">Delete</a></td>
    </tr>
  <tr>
    <td colspan="3"><table class="main" width="80%" <?php if($openQuestion != $Question->id) echo 'style="display:none"'; ?> border="0" cellpadding="0" cellspacing="4" id="poll<?php echo $Question->id; ?>">
      <tr>
        <td width="47%"><strong>Answer</strong></td>
        <td width="38%"><strong>Votes</strong></td>
        <td width="15%">&nbsp;</td>
      </tr>
      <?php foreach($Question->answers as $answer_id => $answer_value){ ?>
      <tr>
        <td><input name="answer_<?php echo $Question->id; ?>_<?php echo $answer_id; ?>" type="text" value="<?php echo htmlspecialchars(stripslashes($answer_value)); ?>" id="answer_<?php echo $Question->id; ?>_<?php echo $answer_id; ?>" size="35" /></td>
        <td><input name="vote_<?php echo $Question->id; ?>_<?php echo $answer_id; ?>" type="text" id="vote_<?php echo $Question->id; ?>_<?php echo $answer_id; ?>" value="<?php echo htmlspecialchars(stripslashes($Question->votes[$answer_id])); ?>" size="4" /></td>
        <td align="right"><a href="index.php?delete_answer=<?php echo $Question->id; ?>_<?php echo $answer_id; ?>" class="button red">Delete</a></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="3"><a href="javascript:addAnswer('<?php echo $Question->id; ?>');" class="button green">Add Answer</a></td>
      </tr>
    </table></td>
    </tr>
    <?php } ?>
  <tr>
    <td colspan="3"><a href="javascript:document.forms[0].submit();" class="button green">Save settings</a><a href="index.php?add_poll=true" class="button green">Add Poll
      <input name="txtsave" type="hidden" id="txtsave" value="true" />
      <input type="hidden" name="txtaddanswer" id="txtaddanswer" />
    </a></td>
  </tr>
  </tbody>
</table>
</form>

<?php
if(is_numeric($openQuestion)){
	echo '<script>document.location.href="#pollanchor' . $openQuestion . '";</script>';
}
?>
<?php }else{ ?>
<p>
<form id="frmlogin" name="frmlogin" method="post" action="">
  <label for="txtlogin">Administrator Password</label>
  <input type="password" <?php if($login_error) echo 'class="error"'; ?> name="txtlogin" id="txtlogin" />
  <input type="submit" name="button" id="button" value="Login" />
</form>
</p>
<?php } ?>
</div>
</div>
</body>
</html>