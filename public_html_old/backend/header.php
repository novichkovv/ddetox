<?php ob_start(); ?>
<?php include_once('classes/translate.class.php'); ?><?php include_once('classes/check.class.php'); ?>
<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>21 Day Detox - Dashboard</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
        
        
        
		<link rel="shortcut icon" href="assets/img/favicon.ico">
        
   
	</head>

	<body>

<!-- Navigation
================================================== -->

	
	<div class="navbar navbar-fixed-top">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Navigation Menu
				</a>

				
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="http://www.divinehealthdetox.com"><?php _e('DHD (Home)'); ?></a></li>
                        
                        <?php if( protectThis("1,2,3,4") ) : ?>
                        <li><a href="home.php">Dashboard</a></li>
                        <li><a href="http://www.divinehealthdetox.com/backend/ebook.php">E-Booklet</a></li>
                        <li><a href="soups.php">Soup Recipes</a></li>
                        <li><a href="salads.php">Salad Recipes</a></li> 
                        <li><a href="smoothies.php">Smoothie Recipes</a></li>
                        
                        <!--<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<a href="#"><?php echo _e('Recipes');?></a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
					<li><a href="soups.php"><?php _e('Soups'); ?></a></li>
                    <li class="divider"></li>
					<li><a href="salads.php"><?php _e('Salads'); ?></a></li> 
                    <li class="divider"></li>
					<li><a href="smoothies.php"> <?php _e('Smoothies'); ?></a></li>
				</ul>
			</li>-->
                        
						<li><a href="videos.php"><?php _e('Videos'); ?></a></li>
                        <li><a href="tips.php"><?php _e('Tips'); ?></a></li>
                        <?php endif; ?>
					</ul>
		<?php if(isset($_SESSION['jigowatt']['username'])) { ?>
		<ul class="nav pull-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<a href="#">My Account</a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['jigowatt']['user_level'])) { ?>
					<li><a href="admin/index.php"><i class="icon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="admin/settings.php"><i class="icon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="profile.php"><i class="icon-user"></i> <?php _e('My Account'); ?></a></li>
					<li class="divider"></li>
					<li><a href="logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav pull-right">
			<li><a href="login.php" class="signup-link"><em><?php _e('Have an account?'); ?></em> <strong><?php _e('Login!'); ?></strong></a></li>
            <li><a href="https://www.divinehealthdetox.com/backend/sign_up.php" class="signup-link"><em><?php _e('Don\'t have one?'); ?></em> <strong><?php _e('Sign Up!'); ?></strong></a></li>
		</ul>
		<?php } ?>
				</div>
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->
	</div><!-- /navbar-wrapper -->

<!-- Main content
================================================== -->
		<div class="container" >
			<div class="row">

				
