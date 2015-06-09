<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

if ($__title = Toolbar::getTitle()) {
	$__website_title	= strip_tags(SITE_NAME . ' | ' . $__title);
} else {
	$__website_title	= strip_tags(SITE_NAME);
}
?>

<!DOCTYPE html>
<html class="sf-layout no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $__website_title; ?></title>

	<meta name="robots" content="NOINDEX, NOFOLLOW">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo LIVE_SITE . '/favicon.ico'; ?>">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" type="text/css">

<?php
$stylesheets = array(
	'assets/css/init.css',
	// vendors:
	'assets/vendor/css/bootstrap.min.css',
	'assets/vendor/css/bootstrap-responsive.min.css',
	'assets/vendor/css/font-awesome.min.css',
	'assets/vendor/css/font-awesome-ext.css',
	'assets/vendor/css/font-awesome-corp.css',
//	'assets/vendor/css/bootstrap-colorpicker.css', '
//	assets/vendor/css/bootstrap-datepicker.css',
//	'assets/vendor/css/bootstrap-datatables.css',
//	'assets/vendor/css/bootstrap-wysihtml5.css',
//	'assets/vendor/css/select2.css',
	'assets/vendor/css/helper.css',
	// end vendors
	'assets/css/bscms.css',
	'assets/css/site.css'
);

$scripts = array(
	// vendors:
	'assets/vendor/js/jquery.min.js',
	'assets/vendor/js/bootstrap.min.js',
//	'assets/vendor/js/bootstrap-datepicker.js',
//	'assets/vendor/js/bootstrap-colorpicker.js',
//	'assets/vendor/js/wysihtml5.js',
//	'assets/vendor/js/select2.min.js',
//	'assets/vendor/js/bootstrap-wysihtml5.js',
//	'assets/vendor/js/jquery.dataTables.js',
	// end vendors
	'assets/js/plugins.js',
	'assets/js/site.js'
);
?>

<?php foreach ($stylesheets as $uri): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo LIVE_SITE . '/' . $uri ?>">
<?php endforeach; ?>

<?php foreach ($scripts as $uri): ?>
	<script type="text/javascript" src="<?php echo LIVE_SITE . '/' . $uri ?>"></script>
<?php endforeach; ?>

<script src="https://www.google.com/jsapi"></script>
<script>
	google.load("visualization", "1", {packages:["corechart"]});
</script>

<script>
	AdvPolls.liveSite	= '<?php echo getRoute('/'); ?>';
</script>

</head>
<body class="sf-body">
<!--[if lt IE 10]>
<div class="browsehappy">
	You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a>
	or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.
</div>
<![endif]-->

<div class="sf-wrap">
	<div class="sf-subwrap">
		<header id="header" role="banner">
			<?php include 'menu.php'; ?>
			<?php include 'toolbar.php'; ?>
		</header>

		<main role="main">
			<div id="message" class="container">
				<?php echo Message::render(); ?>
			</div>
			<section class="view tab-content">
				<div id="t0" class="container tab-pane active">