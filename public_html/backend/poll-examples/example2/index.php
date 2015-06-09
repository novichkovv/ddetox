<?php include("../../poll/Poll.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Example 2 | Poll</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="poll">
<?php echo Poll(1, "template.tpl", "../../poll/data.xml"); ?>
</div>
</body>
</html>
