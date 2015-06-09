<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

require_once '../include.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>AdvPolls Test</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script src="https://www.google.com/jsapi"></script>
	<script>
		google.load("visualization", "1", {packages:["corechart"]});
	</script>

	<link rel="stylesheet" type="text/css" href="css/advpolls.css">
	<script type="text/javascript" src="js/advpolls.js"></script>

	<script>
		AdvPolls.liveSite		= '<?php echo dirname(getRoute('/')); ?>';
	</script>
</head>
<body style="margin-top: 20px">

<?php
getPoll(1, 'Sample Title');