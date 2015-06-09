<?php
$DBH = new PDO("mysql:host=localhost;dbname=ddetox_backend", 'ddetox_admin', 'Starcraft12');

if( isset($_POST['startDate']) ) {
	$statement = $DBH->prepare("UPDATE detox_settings SET setting_value=:startDate WHERE setting_name='startDate'");
	$statement->bindValue(':startDate', $_POST['startDate'], PDO::PARAM_STR);
	$statement->execute();
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
}

//GET START DATE
$statement = $DBH->query("select setting_value from detox_settings where setting_name='startDate'");
$row = $statement->fetch(PDO::FETCH_ASSOC);	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Detox Start Date</title>
</head>

<body>
<h1>Detox Start Date</h1>
<h2>The Current Detox Start Date is: <?php echo $row['setting_value']; ?></h2>
<form method="post">
	<label for="startDate">Start Date:</label> <input name="startDate" type="date" />
    <input type="submit" value="Submit" />
</form>

</body>
</html>