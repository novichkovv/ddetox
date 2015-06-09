<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

if ($title = Toolbar::getTitle()) {
	$website_title	= strip_tags(SITE_NAME . ' | ' . $title);
} else {
	$website_title	= strip_tags(SITE_NAME);
}
?>

<!DOCTYPE html>
<html class="sf-layout no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $website_title; ?></title>

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
			'assets/vendor/css/helper.css',
			// end vendors
			'assets/css/bscms.css',
			'assets/css/login.css'
		);

		$scripts = array(
			// vendors:
			'assets/vendor/js/jquery.min.js',
			'assets/vendor/js/bootstrap.min.js',
			// end vendors
			'assets/js/plugins.js',
		);
		?>

		<?php foreach ($stylesheets as $uri): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo LIVE_SITE . '/' . $uri ?>">
		<?php endforeach; ?>

		<?php foreach ($scripts as $uri): ?>
			<script type="text/javascript" src="<?php echo LIVE_SITE . '/' . $uri ?>"></script>
		<?php endforeach; ?>

	</head>
	<body class="sf-body view-login">
		<div class="sf-wrap">
			<div class="sf-subwrap">
				<div id="main" role="main">
					<div class="view">
						<div class="container">
							<div class="login-container">
								<a href="#" class="thumbnail company-logo"></a>
								<div class="login-box">
									<form method="post" action="<?php echo getRoute('users/login'); ?>" autocomplete="off">
										<div class="control-group">
											<!-- Username -->
											<label class="control-label">Username</label>
											<div class="controls">
												<input type="text" name="username" placeholder="" class="input-block-level">
											</div>
										</div>

										<div class="control-group">
											<!-- Password-->
											<label class="control-label">Password</label>
											<div class="controls">
												<input type="password" name="password" placeholder="" class="input-block-level">

											</div>
										</div>
								
										<button class="btn btn-primary btn-block" type="submit">Sign in</button>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div> <!-- #main role=main -->
			</div> <!-- .sf-subwrap -->
		</div> <!-- .sf-wrap -->
	</body>
</html>