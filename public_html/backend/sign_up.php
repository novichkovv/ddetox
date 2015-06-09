<?php include_once('classes/signup.class.php'); ?>
<?php include_once('header.php'); ?>

<div class="row">
	<div class="span6">
    <h1><?php _e('21 Day Detox Registration'); ?></h1>
    <!-- <p>Registration for the 21 Day Detox is currently closed. Please check back in the future to sign-up for the next 21 Day Detox.</p> -->
    <h4>If you have registered for a previous 21 Day Detox, you do not need to register again. <a href="http://www.divinehealthdetox.com/backend/login.php">Login now!</a></h4>
		<form class="form-horizontal" method="post" action="sign_up.php" id="sign-up-form">
			<fieldset>
				<div class="control-group">
					<label class="control-label" for="name"><?php _e('Full name'); ?></label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $signUp->getPost('name'); ?>" placeholder="<?php _e('Full name'); ?>">
					</div>
				</div>

				<?php if (empty($signUp->use_emails)) : ?>

				<div class="control-group" id="usrCheck">
					<label class="control-label" for="username"><?php _e('Username'); ?></label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="username" name="username" maxlength="15" value="<?php echo $signUp->getPost('username'); ?>" placeholder="<?php _e('Choose your username'); ?>">
					</div>
				</div>
				<?php endif; ?>

				<div class="control-group">
					<label class="control-label" for="email"><?php _e('Email'); ?></label>
					<div class="controls">
						<input type="email" class="input-xlarge" id="email" name="email" value="<?php echo $signUp->getPost('email'); ?>" placeholder="<?php _e('Email'); ?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="password"><?php _e('Password'); ?></label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="password" name="password" placeholder="<?php _e('Create a password'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password_confirm"><?php _e('Password again'); ?></label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="password_confirm" name="password_confirm" placeholder="<?php _e('Confirm your password'); ?>">
					</div>
				</div>

				<div class="control-group">
					<?php $signUp->profileSignUpFields(); ?>
				</div>

				<div class="control-group">
					<?php $signUp->doCaptcha(true); ?>
				</div>

			</fieldset>
			<input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
			<button type="submit" class="btn btn-primary"><?php _e('Create my account'); ?></button>
		</form>
	</div>
    
    <div class="span6">
    <h1>Starts October 1st, 2014</h1>
    <h3>REGISTER & GET FULL ACCESS TO:</h3>
    <ul>
      <li>Accountability Group</li>
      <li>Over 21 Detoxifying Soup, Smoothie and Salad Recipes        </li>
      <li>Exclusive Videos of Dr. Colbert walking you through the 21 Day Detox Program</li>
        <li>Discounts on Nutritional Supplements designed to aid you in the 21 Day Detox Program</li>
    </ul>
    <h3>JOIN THE 21 DAY DETOX PROGRAM TO:</h3>
    <ul>
      <li>RESTORE your health to a youthful state</li>
<li>REBUILD your immune system</li>
<li>RENEW your mind by riding yourself of harmful toxins</li>
    </ul>
    </div>
</div>

<?php include_once('footer.php'); ?>