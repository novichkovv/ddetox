<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

require_once(PATH_ROOT . '/admin/models/usersmodel.php');
$userModel = new UsersModel();
?>

<div id="main-menu" class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo getRoute('/'); ?>"><?php echo SITE_NAME; ?></a>
			<nav class="nav-collapse collapse">
				<?php echo Menu::render(); ?>

				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="<?php echo getRoute('/') ?>">Manage Polls</a>
					</li>
					<?php

					if($userModel->checkRoleUser()) : ?>
					<li class="dropdown">
						<a href="<?php echo getRoute('users') ?>">Manage Users</a>
					</li>
					<?php endif; ?>
					<li class="dropdown">
						<a href="<?php echo getRoute('/', false); ?>" target="_blank"><i class="icon-external-link"></i> View Site</a>
					</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i><?php echo $_SESSION['username'] . "'s" ?> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo getRoute('users/logout'); ?>"><i class="icon-signout"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
			</nav>
		</div>
	</div>
</div>